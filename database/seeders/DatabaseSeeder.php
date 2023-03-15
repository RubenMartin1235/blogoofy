<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserSeeder::class);

        $this->call(TagSeeder::class);
        $this->call(GoofSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(RatingSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
