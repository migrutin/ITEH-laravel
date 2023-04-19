<?php

namespace Database\Factories;

use App\Models\StudentExam;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentExam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'exam_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'grade'=>$this->faker->numberBetween($min = 6, $max = 10)
            
        ];
    }
}
