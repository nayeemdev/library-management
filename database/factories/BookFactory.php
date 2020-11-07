<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => 'https://via.placeholder.com/150',
            'publication_id' => Publication::factory(),
            'isbn_number' => $this->faker->swiftBicNumber,
        ];
    }
}
