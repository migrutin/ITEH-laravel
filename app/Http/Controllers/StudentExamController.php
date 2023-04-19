<?php

namespace App\Http\Controllers;

use App\Models\StudentExam;
use App\Models\Exam;

use Illuminate\Http\Request;
use App\Controllers\ExamController; 
use App\Controllers\StudentController; 

use App\Http\Resources\StudentResource;

class StudentExamController extends Controller
{
    public function index()
    {
        return response()->json(StudentExam::all());
    }
    public function showExams($student_id)
    {
        $exam = StudentExam::where('student_id', $student_id)->get();
        return $exam;
    }
    
}
