<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Group;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 10 groups
        $groups = [];
        for ($i = 0; $i < 10; $i++) {
            $groups[] = Group::create([
                'name' => $faker->word,
            ]);
        }

        // Create 50 tasks assigned to random groups
        for ($i = 0; $i < 50; $i++) {
            $group = $groups[rand(0, count($groups) - 1)];

            Task::create([
                'title' => $faker->sentence,
                'group_id' => $group->id,
                'completed' => $faker->boolean,
            ]);
        }
    }
}
