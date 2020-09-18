<?php

namespace App\Http\Controllers;

use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
    
        return view('home', compact('students'));
    }
}
