<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //we can use this incase we dont have a pagination by default ----->$students = Student::pagination();
        $students = Student::all();
        return view('backend.students.index',compact('students'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_level' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);
        
        try {
            // Create a new student instance
            $student = new Student();
            
            // Get the last student to generate the next registration number
            $lastStudent = Student::latest()->first();
            
            // Set the registration number based on the last student, starting from 1000
            if ($lastStudent) {
                // Extract the number from the last registration number and increment it by 1
                $lastRegistrationNumber = (int) substr($lastStudent->registration_number, -4); // Get the last 4 digits
                $newRegistrationNumber = 'STD/U/' . ($lastRegistrationNumber + 1);
            } else {
                // If there are no students, start from 1000
                $newRegistrationNumber = 'STD/U/1000';
            }
            
            // Assign values to the student
            $student->student_name = $request->input('student_name');
            $student->student_level = $request->input('student_level');
            $student->age = $request->input('age');
            $student->registration_number = $newRegistrationNumber; // Assign the generated registration number
            
            // Save the student
            $student->save();
            
            return response()->json(['success' => 'Student ' . $student->student_name . ' has been successfully registered with Registration Number: ' . $student->registration_number]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add student: ' . $e->getMessage()], 400);
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::findOrFail($id);
        return view('backend.students.show',compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::findOrFail($id);
        return view('backend.students.edit',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);
    
            // Update the student details
            $student->student_name = $request->input('student_name');
            $student->student_level = $request->input('student_level');
            $student->age = $request->input('age');
            $student->save();
    
            // Return success response
            return response()->json(['success' => 'Student ' . $student->student_name . ' updated successfully!']);
        } catch (\Exception $e) {
            // Return error response if something goes wrong
            return response()->json(['error' => 'Failed to update student: ' . $e->getMessage()], 400);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
