<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $loanDate = now();
        $dueDate = (clone $loanDate)->modify('+2 weeks');
        $returnDate = $this->faker->boolean(70) ? $this->faker->dateTimeBetween($loanDate, $dueDate) : null;

        return [
            'user_id' => \App\Models\User::factory(),
            'book_id' => \App\Models\Book::factory(),
            'loan_date' => $loanDate,
            'due_date' => $dueDate,
            'return_date' => $returnDate,
        ];
    }
}
