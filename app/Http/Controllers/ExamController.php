<?php

namespace App\Http\Controllers;


use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Resources\ExamResource;

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

        /*if(!in_array($exam_id, $examIds)){
            return response()->json([
                'message' => 'Exam ID does not exist',
            ]);
        } */

        $Exam = Exam::find($exam_id); 

        if (!$Exam->delete()) {
            return response()->json([
                'error' => 'Unable to delete the Exam'
            ]);
     
         }
        
    } 
   
} 
  
