<?php


namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
        ]);
    
        try {
            // Create a new student instance
            $student = new Student();
    
            // Get the last student to generate the next registration number
            $lastStudent = Student::latest()->first();
    
            // Set the registration number based on the last student, starting from 1000
            if ($lastStudent) {
                $lastRegistrationNumber = (int) substr($lastStudent->registration_number, -4); // Get the last 4 digits
                $newRegistrationNumber = '22/U/' . ($lastRegistrationNumber + 1); // Replace '22' with current year if needed
            } else {
                $newRegistrationNumber = '22/U/1000';
            }
    
            // Generate the student email based on the registration number
            $lastFourDigits = substr($newRegistrationNumber, -4);
            $studentEmail = '240070' . $lastFourDigits . '@elite.ac.ug';
    
            // Assign values to the student
            $student->student_name = $request->input('student_name');
            $student->student_level = $request->input('student_level');
            $student->phone = $request->input('phone');
            $student->dob = $request->input('dob');
            $student->registration_number = $newRegistrationNumber;
            $student->email = $studentEmail;
            
            // Save the student
            $student->save();
    
         
    
            return response()->json([
                'success' => 'Student ' . $student->student_name . ' has been successfully registered with Registration Number: ' . $student->registration_number . ' and Email: ' . $student->email
            ]);
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


    public function show($id, $courseId = null)
    {
        // Retrieve the student by ID or fail
        $student = Student::findOrFail($id);

        // Retrieve all courses in the system
        $courses = Course::all();

        // Retrieve the specific course if a course ID is provided
        $course = null;
        if ($courseId) {
            $course = Course::findOrFail($courseId);
        }

        // Pass the student, courses, and optionally the selected course to the view
        return view('backend.students.show', compact('student', 'courses', 'course'));
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
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_level' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
        ]);
    
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);
    
            // Update the student details
            $student->student_name = $request->input('student_name');
            $student->student_level = $request->input('student_level');
            $student->phone = $request->input('phone');
            $student->dob = $request->input('dob');
            
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
    public function destroy($id)
    {
        // Find the student by id, using findOrFail to throw a 404 error if not found
        $student = Student::findOrFail($id);
    
        // Delete the student
        $student->delete();
    
        // Redirect back to the students index page with a success message
        return redirect()->route('student.index');
    }

  // EnrollmentController.php
public function enroll($studentId, $courseId)
{
    $student = Student::find($studentId);
    $course = Course::find($courseId);

    if (!$student || !$course) {
        return response()->json(['success' => false, 'message' => 'Student or course not found.']);
    }

    // Check if the student is already enrolled in the course
    if ($student->courses()->where('course_id', $courseId)->exists()) {
        return response()->json(['success' => false, 'message' => 'Already enrolled in this course.']);
    }

    // Enroll the student in the course
    $student->courses()->attach($courseId);
    Log::info('Student ID: ' . $studentId . ' - Course ID: ' . $courseId);


    return response()->json(['success' => true, 'message' => 'Enrollment successful!']);
}

    
    
   
}
