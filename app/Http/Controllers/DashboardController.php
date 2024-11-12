<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    public function index()
    {
        // Count the total number of courses
        $totalCourses = Course::count();
    
        // Get the total number of students
        $totalStudents = Student::count();
    
        // Get the last 5 registered students
        $students = Student::latest()->take(5)->get();
    
        // Count the total students registered in each level (S1 to S6)
        $studentsCountByLevel = Student::select('student_level', DB::raw('count(*) as total'))
            ->groupBy('student_level')
            ->get();

        // Fetch student registrations grouped by month
        $monthlyRegistrations = Student::selectRaw("COUNT(*) as count, DATE_FORMAT(created_at, '%Y-%m') as month")
    ->groupBy('month')
    ->orderBy('month', 'asc')
    ->get();
    
        // Pass the values to the view
        return view('dashboard', compact('totalStudents', 'totalCourses', 'students', 'studentsCountByLevel','monthlyRegistrations'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
