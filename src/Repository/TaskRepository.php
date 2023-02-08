<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
    public function findAllOrderedByDate()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM App:Task p ORDER BY p.created_at ASC'
            )
            ->getResult();
    }

    public function findTasksByUser(User $user)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM App:Task t '.
                'WHERE t.user > :user'
        )->setParameter('user', $user->getUsername());

        return $query->getResult();
    }

    public function findTasksByUserId($userId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM App:Task t '.
                'WHERE t.user = :user '
        )->setParameter('user', $userId);

        return $query->getResult();
    }

    public function findOpenTasksByUserId($userId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM App:Task t '.
                'WHERE t.user = :user '.
                'AND t.isDone = 0'
        )->setParameter('user', $userId);

        return $query->getResult();
    }

    public function findAnonymousTasks()
    {
        $query = $this->getEntityManager()
        ->createQuery(
            'SELECT t FROM App:Task t '.
            'WHERE t.user is NULL'
            );

        return $query->getResult();
    }

    public function findDoneTasksByUserId($userId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT t FROM App:Task t '.
                'WHERE t.user = :user '.
                'AND t.isDone = 1'
        )->setParameter('user', $userId);

        return $query->getResult();
    }

    public function deleteUserIdFromTasks($id)
    {

    }
}