<?php

namespace Database\Factories;

use App\Models\Disc;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disc::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->name,
            'album' => $this->faker->name,
            'artist' => $this->faker->name,
            'year' => $this->faker->year,
            'photo' => 'default.png',
        ];
    }
}
