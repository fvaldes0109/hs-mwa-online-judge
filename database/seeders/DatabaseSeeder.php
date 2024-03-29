<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Problem;
use App\Models\Submission;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::where('email', 'fvaldes0109@gmail.com')->count() == 0) {
            User::create([
                'name' => 'Fernando',
                'email' => 'fvaldes0109@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]);
        }
        User::factory(30)->create();

        $problems = Problem::factory(80)->create();
        Submission::factory(1000)->create();
        $tags = Tag::factory(10)->create();

        foreach ($problems as $problem) {
            $problem->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }

        Contact::factory(50)->create();
    }
}
