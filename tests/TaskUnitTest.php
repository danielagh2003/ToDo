<?php

namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testSetTitle(): void
    {
        $task = new Task();
        $task->setTitle('Test Title');

        $this->assertEquals('Test Title', $task->getTitle());
    }

    public function testSetDescription(): void
    {
        $task = new Task();
        $task->setDescription('Test Description');

        $this->assertEquals('Test Description', $task->getDescription());
    }

    public function testSetDueDate(): void
    {
        $dueDate = new \DateTime();
        $task = new Task();
        $task->setDueDate($dueDate);

        $this->assertEquals($dueDate, $task->getDueDate());
    }

    public function testSetCreatedAt(): void
    {
        $createdAt = new \DateTime();
        $task = new Task();
        $task->setCreatedAt($createdAt);

        $this->assertEquals($createdAt, $task->getCreatedAt());
    }

    public function testSetCategory(): void
    {
        $category = new Category(); 
        $task = new Task();
        $task->setCategory($category);

        $this->assertEquals($category, $task->getCategory());
    }
}
