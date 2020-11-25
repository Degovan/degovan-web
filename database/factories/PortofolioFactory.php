<?php

namespace Database\Factories;

use App\Models\Portofolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PortofolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portofolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            'category_id' => rand(1,10),
            'service_id' => rand(1,10),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
        ];
    }
}
