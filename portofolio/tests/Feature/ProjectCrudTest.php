<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_projects(): void
    {
        Project::factory()->count(3)->create();

        $response = $this->getJson('/projects');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_create_project(): void
    {
        $response = $this->postJson('/projects', [
            'title' => 'Bracelet of Words',
            'engine' => 'Unreal Engine 5',
            'description' => 'Words are weapons.',
            'status' => 'In Development',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('projects', ['title' => 'Bracelet of Words']);
    }

    public function test_can_show_project(): void
    {
        $project = Project::factory()->create();

        $response = $this->getJson("/projects/{$project->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => $project->title]);
    }

    public function test_can_update_project(): void
    {
        $project = Project::factory()->create();

        $response = $this->putJson("/projects/{$project->id}", [
            'title' => 'Updated Title',
            'engine' => 'Unity',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('projects', ['title' => 'Updated Title']);
    }

    public function test_can_delete_project(): void
    {
        $project = Project::factory()->create();

        $response = $this->deleteJson("/projects/{$project->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_create_project_requires_title(): void
    {
        $response = $this->postJson('/projects', [
            'engine' => 'Unreal Engine 5',
        ]);

        $response->assertStatus(422);
    }
}
