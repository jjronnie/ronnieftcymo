<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseIdToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the course_id column to the students table
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
    
            // Foreign key constraint (assuming 'id' is the primary key of the courses table)
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the course_id column if the migration is rolled back
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
    
}
