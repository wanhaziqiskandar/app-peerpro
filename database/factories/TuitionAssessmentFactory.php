<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TuitionAssessment>
 */
class TuitionAssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // How to create 3d array 
        $questions = [];

        // Create 1-5 questions
        $questions = [];

        // Generate 10 questions
        for ($i = 1; $i <= 10; $i++) {
            $options = [];

            // Generate 4 options for each question
            for ($j = 1; $j <= 4; $j++) {
                $options[] = fake()->sentence();
            }

            $questions[] = [
                'question' => fake()->sentence(),
                'options' => $options,
            ];
        }


        // How to parse array to json - backend
        // json_encode($question);

        // How to parse json to array - frontend
        // foreach(json_decode($assessment->questions) as $question){
        //     <div>question->question</div>
        //     foreach(json_decode($question->options as $option)){
        //         <div>option->option</div>
        //     }
        // }


        $expertise = ['HTML', 'JS', 'CSS', 'PHP', 'React'];
        return [
            'tutor_id' => fake()->numberBetween(1, 10),
            'request_id' => fake()->numberBetween(1, 10), // Generate related TuitionRequest
            'expertise' => fake()->randomElement($expertise), // Random expertise field
            'questions' => json_encode($questions),
        ];
    }
}
