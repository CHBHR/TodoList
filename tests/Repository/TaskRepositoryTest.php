<?php

namespace App\Tests\Repository;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TaskRepositoryTest extends KernelTestCase
{

    public function findTasksByUserTest()
    {
        self::bootKernel();
        $taskList = self::$container->get(TaskRepository::class)->findTasksByUser($user1);
        $this->assertEquals(3, $taskList);
    }

}