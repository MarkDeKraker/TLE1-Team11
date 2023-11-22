<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Age;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin1234'
        ]);
        User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'password' => 'moderator1234'
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => 'user1234'
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name'=>'moderator']);
        Role::create(['name'=>'user']);

        Age::create(['age' => '12']);
        Age::create(['age' => '13']);
        Age::create(['age' => '14']);
        Age::create(['age' => '15']);
        Age::create(['age' => '16']);
        Age::create(['age' => '17']);
        Age::create(['age' => '18']);
        Age::create(['age' => '19']);

        Subject::create(['subject' => 'werk']);
        Subject::create(['subject' => 'school']);
        Subject::create(['subject' => 'vervolg studie']);
        Subject::create(['subject' => 'gezondheid']);
        Subject::create(['subject' => 'financiën']);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
