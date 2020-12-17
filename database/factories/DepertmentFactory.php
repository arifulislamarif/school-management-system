<?php

namespace Database\Factories;

use App\Models\Depertment;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepertmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Depertment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
