<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        *
       $this->call(
        class: DefaultUserSeeder::class,
       );
       */

        Post::factory(20)->for(
            User::factory()->create([
                'name' => 'Lahiru Madusanka',
                'email' => 'hhlahirumadusanka@gmail.com',
            ])
        )->create();
    }
}
