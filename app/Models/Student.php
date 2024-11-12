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
        
        
    ];

    public function courses()
    {
        
    }

    public function level()
    {
        
    }

    



}
