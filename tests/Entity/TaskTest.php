<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $task;

    private $date;

    public function setUp(): void
    {
        $this->task = new Task();
        $this->date = new \DateTime();
    }

    public function testCreatedAt()
    {
        $this->task->setCreatedAt($this->date);
        $this->assertSame($this->date, $this->task->getCreatedAt());
    }

    public function testId()
    {
        $this->assertNull($this->task->getId());
    }

    public function testTitle()
    {
        $this->task->setTitle('Test du titre');
        $this->assertSame($this->task->getTitle(), 'Test du titre');
    }

    public function testContent()
    {
        $this->task->setContent('Test du contenu');
        $this->assertSame($this->task->getContent(), 'Test du contenu');
    }

    public function testSetIdDone()
    {
        $this->task->setIsDone(true);
        $this->assertSame($this->task->getIsDone(), true);
    }

    public function testIsDone()
    {
        $this->task->toggleIsDone(true);
        $this->assertEquals($this->task->isDone(), true);
    }

    public function testUser()
    {
        $this->task->setUser(new User());
        $this->assertInstanceOf(User::class, $this->task->getUser());
    }

}