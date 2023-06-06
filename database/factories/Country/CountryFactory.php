<?php

declare(strict_types=1);

namespace Database\Factories\Country;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country\Country>
 */
class CountryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'iso3' => $this->faker->countryISOAlpha3,
            'iso2' => $this->faker->countryISOAlpha3,
            'phone_code' => $this->faker->randomNumber(1, 3),
            'capital' => $this->faker->city,
            'currency' => $this->faker->currencyCode,
            'currency_symbol' => $this->faker->currencyCode(),
            'tld' => $this->faker->tld(),
            'region' => $this->faker->city(),
            'subregion' => $this->faker->city(),
            'timezones' => $this->faker->timezone(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'emoji' => $this->faker->imageUrl(),
            'emojiU' => $this->faker->imageUrl(),
        ];
    }
}
