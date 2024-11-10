<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable =[
        'course_id',
        'course_name',
        'credit_hours',        
        'description'

    ];



  // Define the inverse relationship with the Student model
  public function students()
  {
      return $this->hasMany(Student::class);
  }

}
