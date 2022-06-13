<?php

namespace Tests\Feature;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssignmentTest extends TestCase
{
    public function test_can_create_new_assignment(): void
    {
        $response = $this->post('/assignment', Assignment::factory()->count(1)->make()->toArray());

        $response->assertStatus(302);
    }


}
