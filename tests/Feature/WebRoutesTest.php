<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    public function test_check_if_root_route_is_correct(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_check_if_login_route_is_correct(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_check_if_register_route_is_correct(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_non_authenticated_visit_assignment(): void
    {
        $response = $this->get('/assignment')
            ->assertRedirect('/login')
            ->assertStatus(302);
    }

    public function test_non_authenticated_visit_assignment_create(): void
    {
        $response = $this->get('/assignment/create')
            ->assertRedirect('/login')
            ->assertStatus(302);
    }

    public function test_non_authenticated_visit_assignment_show(): void
    {
        $response = $this->get('/assignment/show')
            ->assertRedirect('/login')
            ->assertStatus(302);
    }
}
