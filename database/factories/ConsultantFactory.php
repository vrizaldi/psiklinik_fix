<?php

namespace Database\Factories;

use App\Models\Consultant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'type' => $this->faker->randomElement(['Psikolog Anak', 'Psikolog Pendidikan', 'Psikolog Organisasi', 'Psikolog Klinis', 'Psikolog Hubungan']),
            'profile_pic_href' => 'https://www.btklsby.go.id/images/placeholder/basic.png',
            'profile' => $this->faker->text($maxNbChars=300),
            'education' => $this->faker->randomElement(['Universitas Gadjah Mada', 'Universitas Indonesia', 'Universitas Lampung', 'Polinela']),
            'phone' => $this->faker->phoneNumber
        ];
    }
}
