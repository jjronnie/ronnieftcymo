<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'student_name', 
        'student_level', 
        'phone', 
        'dob', 
        'registration_number', 
        'email', 
        'password',
        'role'
    ];

    public function courses()
{
    return $this->belongsToMany(Course::class, 'enrollments');
}


    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }



}
