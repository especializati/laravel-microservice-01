<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory()->create(),
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'whatsapp' => $this->faker->unique()->numberBetween(1000000000, 99999999999),
        ];
    }
}
