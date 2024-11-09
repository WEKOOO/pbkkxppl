<?php

// database/seeders/StudentProgressSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\StudentProgress;

class StudentProgressSeeder extends Seeder
{
    public function run()
    {
        StudentProgress::factory()->count(15)->create();
    }
}