<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Role::factory()->create([
            'role' => 'Главный администратор',
        ]);

        \App\Models\Role::factory()->create([
            'role' => 'Администратор',
        ]);

        \App\Models\Role::factory()->create([
            'role' => 'Пользователь',
        ]);

        \App\Models\User::factory()->create([
            'email' => 'GameShop@gmail.com',
            'password' => bcrypt(123),
            'role_id' => '1'
        ]);

        \App\Models\User::factory(100)->create();
    }
}
