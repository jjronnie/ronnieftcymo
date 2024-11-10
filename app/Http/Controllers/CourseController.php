<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all(); // Retrieves all courses from the database
        
        return view('backend.courses.index', compact('courses')); // Passes $courses to the view
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create'); // Ensure this view exists for the form
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'course_name' => 'required',
            'credit_hours' => 'required|numeric',
            'description' => 'required',
        ]);
    
        // Get the last course ID from the database (assuming your course_id follows a pattern like BUC500, BUC501, etc.)
        $lastCourse = Course::latest('course_id')->first();
    
        // Generate the next course_id
        if ($lastCourse) {
            // Extract the numeric part of the last course_id (e.g., BUC500 -> 500)
            $lastCourseId = (int) substr($lastCourse->course_id, 3);
    
            // Increment the last numeric value by 1
            $nextCourseId = 'BUC' . str_pad($lastCourseId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // If no course exists, start from BUC500
            $nextCourseId = 'BUC500';
        }
    
        // Create the new course with the generated course_id
        $course = new Course();
        $course->course_id = $nextCourseId;
        $course->course_name = $request->course_name;
        $course->credit_hours = $request->credit_hours;
        $course->description = $request->description;
        $course->save();
    
        // Return a JSON response with a success message
        return response()->json([
            'success' => 'New Course with Course Code ' . $nextCourseId . ' has been successfully created!'
        ]);
    }  
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the course by its ID
        $course = Course::findOrFail($id);
        $course->load('students'); 
    
        // Return the view with the course details
        return view('backend.courses.show', compact('course'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    // Retrieve the course by its id
    $course = Course::findOrFail($id);

    // Return the edit view with the course data
    return view('backend.courses.edit', compact('course'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer',
            'description' => 'nullable|string',
        ]);
    
        // Retrieve the course by its ID or throw a 404 error
        $course = Course::findOrFail($id);
    
        // Update the course details
        $course->course_name = $request->course_name;
        $course->credit_hours = $request->credit_hours;
        $course->description = $request->description;
    
        // Save the updated course data
        $course->save();
    
        // Return a success response
        return response()->json([
            'success' => 'Course ' . $course->course_name . ' has been updated successfully.'
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Find the course by its id, using findOrFail to throw a 404 error if not found
    $course = Course::findOrFail($id);

    // Delete the course
    $course->delete();

    // Redirect back to the courses index page with a success message
    return redirect()->route('course.index')->with('success', 'Course ' . $course->course_name . ' has been deleted successfully.');
}

}
