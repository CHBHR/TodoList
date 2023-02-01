<?php

namespace AppBundle\DataFixtures\Test\ORM;

use AppBundle\Entity\Task;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixturesTest extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $task1 = new Task();
        $task1->setCreatedAt(New DateTime());
        $task1->setTitle('Task 1 - title');
        $task1->setContent('task 1 - content');
        // $task1->setIsDone(true);
        $task1->setUser($this->getReference('user1'));
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setCreatedAt(New DateTime());
        $task2->setTitle('Task 2 - title');
        $task2->setContent('task 2 - content');
        // $task2->setIsDone(true);
        $task2->setUser($this->getReference('user1'));
        $manager->persist($task2);

        $task3 = new Task();
        $task3->setCreatedAt(New DateTime());
        $task3->setTitle('Task 3 - title');
        $task3->setContent('task 3 - content');
        // $task3->setIsDone(true);
        $task3->setUser($this->getReference('user2'));
        $manager->persist($task1);

        $task4 = new Task();
        $task4->setCreatedAt(New DateTime());
        $task4->setTitle('Task 4 - title');
        $task4->setContent('task 4 - content');
        $task4->setIsDone(true);
        $task4->setUser($this->getReference('user2'));
        $manager->persist($task4);

        $task5 = new Task();
        $task5->setCreatedAt(New DateTime());
        $task5->setTitle('Task 5 - title');
        $task5->setContent('task 5 - content');
        //$task5->setIsDone(true);
        $task5->setUser($this->getReference('user3'));
        $manager->persist($task5);

        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            UserFixturesTest::class,
        ];
    }
}