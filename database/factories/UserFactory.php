<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'Emmanuel',
            'last_name' => 'Diatta' ,
            'email' => 'diattaemma80@gmail.com',
            'password' => Hash::make('passer123'),
            'phone' => '779437457',
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
