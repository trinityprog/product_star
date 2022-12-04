<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lesson;
use App\Models\Role;
use App\Models\User;
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
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);

        $students = User::factory(2000)->create([
            'role_id' => $studentRole->id,
        ]);
        User::factory(4)->create([
            'role_id' => $adminRole->id,
        ]);

        $lessons = Lesson::factory(27)->create();

        $students->each(function ($s) use ($lessons) {
            $completedLessons = rand(1, 20);
            $lessons->random()->each(function ($l, $index) use ($s, $completedLessons) {
                $s->lessons()->attach($l->id,
                    ['status' => $index + 1 <= $completedLessons
                        ? Lesson::COMPLETED_STATUS
                        : fake()->randomElement([Lesson::QUEUE_STATUS, Lesson::STARTED_STATUS, Lesson::VIEWED_STATUS])]
                );
            });
        });
    }
}
