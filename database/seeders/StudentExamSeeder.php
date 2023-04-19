<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentExam;

class StudentExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number=0;
        for ($i=0; $i < 1000; $i++) { 
            try {
                StudentExam::factory()->create();
                $number=$number+1;
               
                if($number==50){
                    break;
                }
            } catch (\Throwable $th) {
                
            }
        }
        
    }
}
