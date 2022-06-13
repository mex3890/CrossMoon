<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stats')->insert([
             'name' => 'Finished',
             'created_at' => '2022-06-09 22:24:06',
             'updated_at' => null
         ]);

        DB::table('stats')->insert([
            'name' => 'In progress',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('stats')->insert([
            'name' => 'Created',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('categories')->insert([
            'name' => 'Php',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('categories')->insert([
            'name' => 'Java',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('categories')->insert([
            'name' => 'Node',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('categories')->insert([
            'name' => 'Js',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('roles')->insert([
            'name' => 'Super admin',
            'created_at' => '2022-06-09 22:24:06',
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'name' => 'CrossMoon Super Admin',
            'role_id' => 3,
            'email' => 'superAdmin@crossmoon.com.br',
            'email_verified_at' => '2018-12-21 22:00:00',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => 'AhYYL0w6iu',
            'created_at' => '2018-12-21 22:00:00',
            'updated_at' => '2018-12-21 22:00:00'
        ]);

         User::factory(50)->create();
         Assignment::factory(1000)->create();
    }
}
