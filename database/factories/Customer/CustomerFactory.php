<?php

declare(strict_types=1);

namespace Database\Factories\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->lastName,

            'gender' => array_rand(['mail', 'female']),
            'dob' => $this->faker->date,

            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,

            'avatar' => $this->faker->emoji,

            'verified' => true,

            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',

        ];
    }
}
