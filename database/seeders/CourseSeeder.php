<?php

namespace Database\Seeders;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course:: create([
            'course_id'=> 'BUC500',
            'course_name'=> 'AWAD',
            'description'=>'Advanced Web Application Development',
            'credit_hours'=>'65'
           
        ]);

        Course:: create([
            'course_id'=> 'BUC501',
            'course_name'=> 'MAD',
            'description'=>'Mobile Application Development',
            'credit_hours'=>'60'
           
        ]);
        
        Course:: create([
            'course_id'=> 'BUC503',
            'course_name'=> 'OOP',
            'description'=>'Object Oriented Programming',
            'credit_hours'=>'60'
           
        ]);
      
    }
}
