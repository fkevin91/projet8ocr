<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    private $user;

    private $task;

    public function setUp(): void
    {
        $this->user = new User();
        $this->task = new Task();
    }

    public function testId(): void
    {
        $this->user->setId(1);
        $this->assertSame(1, $this->user->getId());
    }

    public function testUsername(): void
    {
        $this->user->setUsername('kevin');
        $this->assertSame('kevin', $this->user->getUsername());
    }

    public function testPassword(): void
    {
        $this->user->setPassword('motdepassetest');
        $this->assertSame('motdepassetest', $this->user->getPassword());
    }

    public function testEmail(): void
    {
        $this->user->setEmail('k.fardeau@gmail.com');
        $this->assertSame('k.fardeau@gmail.com', $this->user->getEmail());
    }

    public function testRoles(): void
    {
        $this->user->setRoles(['ROLE_USER']);
        $this->assertSame(['ROLE_USER'], $this->user->getRoles());
    }

    public function testTasks(): void
    {
        $tasks = $this->user->getTask($this->task->getUser());
        $this->assertSame($this->user->getTask(), $tasks);

        $this->user->addtask($this->task);
        $this->assertCount(1, $this->user->getTask());

        $this->user->removeTask($this->task);
        $this->assertCount(0, $this->user->getTask());
    }


    public function testSalt(): void
    {
        $this->assertEquals(null, $this->user->getSalt());
    }

    public function testEraseCredential(): void
    {
        $this->assertNull($this->user->eraseCredentials());
    }

}