<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => 'user']);
    }

    public function test_user_can_create_task()
    {
        $response = $this->actingAs($this->user)
            ->post(route('tasks.store'), [
                'title' => 'Test Task',
                'description' => 'Test Description',
                'status' => 'pending',
            ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'user_id' => $this->user->id,
        ]);
    }

    public function test_user_can_update_own_task()
    {
        $task = Task::factory()->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)
            ->put(route('tasks.update', $task), [
                'title' => 'Updated Task',
                'description' => 'Updated Description',
                'status' => 'completed',
            ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task',
        ]);
    }

    public function test_user_cannot_update_others_task()
    {
        $otherUser = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($this->user)
            ->put(route('tasks.update', $task), [
                'title' => 'Updated Task',
                'description' => 'Updated Description',
                'status' => 'completed',
            ]);

        $response->assertStatus(403);
    }
}
