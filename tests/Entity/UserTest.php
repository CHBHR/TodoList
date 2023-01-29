<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testId()
    {
        $this->assertNull($this->user->getId());
    }

    public function testUsername()
    {
        $this->user->setUsername('Username');
        $this->assertSame($this->user->getUsername(), 'Username');
    }

    public function testPassword()
    {
        $this->user->setPassword('Password');
        $this->assertSame($this->user->getPassword(), 'Password');
    }

    public function testEmail()
    {
        $this->user->setEmail('Email');
        $this->assertSame($this->user->getEmail(), 'Email');
    }

    public function testRoles()
    {
        $this->user->setRoles(['ROLE_USER']);
        $this->assertSame($this->user->getRoles(), ['ROLE_USER']);
    }
}