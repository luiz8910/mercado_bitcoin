<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->state(new Sequence(
                ['jobTitle' => 'Software Engineer'],
                ['jobTitle' => 'Project Manager'],
                ['jobTitle' => 'Salesman'],
                ['jobTitle' => 'Marketing Director'],
                ['jobTitle' => 'Tech Recruiter'],
            ))
            ->create();
    }
}
