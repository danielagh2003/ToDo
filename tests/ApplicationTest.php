<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationTest extends WebTestCase
{
    public function testUpdateTask(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $taskService = $container->get(TaskService::class);
        $existingTask = $taskService->getOne(1);

        // Datele pentru actualizarea task-ului
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ];
        $updatedTask = $taskService->update($existingTask->getId(), $updatedData);

        $this->assertEquals('Updated Title', $updatedTask->getTitle());
        $this->assertEquals('Updated Description', $updatedTask->getDescription());
    }
}

