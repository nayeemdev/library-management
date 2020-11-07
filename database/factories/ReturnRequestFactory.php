<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ReturnRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReturnRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReturnRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  User::factory(),
            'status_changed_by' => 1,
        ];
    }
}
