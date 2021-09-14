<?php

namespace Database\Factories;

use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_date = strtotime(Carbon::create('1950','07','15')->toDateString()) ;
        $end_date = strtotime(Carbon::now()->toDateString());
        return [
            'name' => $this->faker->name(),
            'length' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 4, $max = 30),
            'created_at' => date('Y-m-d',mt_rand($start_date, $end_date)),
            'album_id' => rand(1,18),
        ];
    }
}
