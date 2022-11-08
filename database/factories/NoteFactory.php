<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random = rand(1,1000);
        return [
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
//            'company' => 'ООО ' . '"' . Str::ucfirst($this->faker->word()) . '"',
            'company' => $this->faker->company,
            'phone' => '+' . $this->faker->numerify('7##########'),
            'email' => $this->faker->word() . '@email.com',
//            'birthday' => $this->faker->date('Y-m-d'),
            'birthday' => $this->faker->dateTimeBetween('-30 years', '-20 years'),
            'photo' => 'https//picsum.photos/id/'. $random . '/200/100',
            'created_at' => $this->faker->dateTimeBetween('-1 years')
        ];
    }
}
