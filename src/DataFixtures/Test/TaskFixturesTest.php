<?php

namespace App\DataFixtures\Test;

use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TaskFixturesTest extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();

        $task1 = new Task();
        $task1->setCreatedAt($date);
        $task1->setTitle('Task 1 - title');
        $task1->setContent('task 1 - content');
        $task1->setIsDone(false);
        $task1->setUser($this->getReference('user2'));
        $task1->setHasDeadLine(false);
        $task1->setDeadLine(null);
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setCreatedAt($date);
        $task2->setTitle('Task 2 - title');
        $task2->setContent('task 2 - content');
        $task2->setIsDone(false);
        $task2->setUser($this->getReference('user2'));
        $task2->setHasDeadLine(true);
        $task2->setDeadLine($date);
        $manager->persist($task2);

        $task3 = new Task();
        $task3->setCreatedAt($date);
        $task3->setTitle('Task 3 - title');
        $task3->setContent('task 3 - content');
        $task3->setIsDone(true);
        $task3->setUser($this->getReference('user2'));
        $task3->setHasDeadLine(false);
        $task3->setDeadLine(null);
        $manager->persist($task3);

        $task4 = new Task();
        $task4->setCreatedAt($date);
        $task4->setTitle('Task 4 - title');
        $task4->setContent('task 4 - content');
        $task4->setIsDone(false);
        $task4->setUser(null);
        $task4->setHasDeadLine(false);
        $task4->setDeadLine(null);
        $manager->persist($task4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixturesTest::class,
        ];
    }
}