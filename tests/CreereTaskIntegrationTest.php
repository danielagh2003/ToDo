<?php
use App\Entity\Task; 
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\TaskService;

class CreereTaskIntegrationTest extends KernelTestCase
{
    public function testCreateTask(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $taskService = $container->get(TaskService::class);

        // Datele pentru crearea unei sarcini
        $taskData = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'dueDate' => '2023-12-31',
        ];

        $createdTask = $taskService->create($taskData);

        $this->assertInstanceOf(Task::class, $createdTask);
        $this->assertEquals('Test Task', $createdTask->getTitle());
        $this->assertEquals('Test Description', $createdTask->getDescription());
        $this->assertEquals(new \DateTime('2023-12-31'), $createdTask->getDueDate());
    }
}

?>