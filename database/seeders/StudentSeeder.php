<?php

namespace Database\Seeders;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Student:: create([
            'student_name'=> 'Ronnie',
            'student_level'=> 'Level Four',
            'phone'=>'0703283529',
            'dob'=>'2001-4-16',
            'registration_number'=>'22/U/1000',
            'email'=>'2200701000@elite.ac.ug'
           
        ]);
        
     
      
    }
}
