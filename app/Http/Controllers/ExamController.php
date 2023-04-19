<?php

namespace App\Http\Controllers;


use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Resources\ExamResource;

use Illuminate\Validation\Rule;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Exam::all());
    }


    
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('exams')->where(function ($query) use ($request) {
                    return $query->where('name', $request->input('name'));
                }),
            ],
            'semester' => 'required',
        ]);
    
        $exam = Exam::create([
            'name' => $validatedData['name'],
            'semester' => $validatedData['semester'],
        ]);
    
        return response()->json([
            'message' => 'Exam created successfully',
            'exam' => $exam,
        ]);
    }
    

public function editName(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => [
            'required',
            Rule::unique('exams')->ignore($id),
        ],
    ]);

    $exam = Exam::findOrFail($id);
    $exam->name = $validatedData['name'];
    $exam->save();

    return response()->json([
        'message' => 'Exam name updated successfully',
        'exam' => $exam,
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_id)
    {
        $examIds = array_values((array) Exam::pluck('id'))[0];

        $Exam = Exam::find($exam_id); 

        if (!$Exam->delete()) {
            return response()->json([
                'error' => 'Unable to delete the Exam'
            ]);
     
         }
        
    } 
   
} 
  
