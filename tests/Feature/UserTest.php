<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_check_if_user_columns_is_correct(): void
    {
        $user = new User;

        $expected = ['name', 'email', 'role_id', 'password'];

        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertCount(0, $arrayCompared);
    }

    public function test_check_delete_user(): void
    {
        $user = User::first() ?? User::factory()->count(1)->create();
        $response = false;
        $user = User::first();

        if($user){
            $response = $user->delete();
        }

        $this->assertTrue($response);

    }

//    public function test_check_duplicated_user_register(): void
//    {
//        $user = User::factory()->count(1)->make();
//
//    }

    public function test_can_create_new_user(): void
    {
        $response = $this->post('/register', User::factory()->count(1)->make()->toArray());

        $response->assertStatus(302);
    }
}
