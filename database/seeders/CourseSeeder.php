<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name'=>'test1',
            'description'=>'test1',
            'url'=>'test1',
            'duration'=>'1.1',
            'views'=>'1',
            'likes'=>'1',
        ]);
    }
}
