<?php


namespace App\Http\Controllers;

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
    
            // Now create a user account for the student
            $password = str_replace('@elite.ac.ug', '', $studentEmail); // Remove the domain part from the email to create a password
    
            // Create the user account
            $user = new User();
            $user->name = $student->student_name; // Use the student's name
            $user->email = $student->email; // Use the student's generated email
            $user->password = Hash::make($password); // Hash the password
            $user->role = 'student'; 
            $user->save();
    
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
    public function destroy(Student $student)
    {
        //
    }
   
}
