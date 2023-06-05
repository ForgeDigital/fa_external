<?php

declare(strict_types=1);

namespace Database\Factories\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->city(),
            'code' => $this->faker->countryCode,
        ];
    }
}
