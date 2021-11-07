<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EquipmentForm;
use Faker\Generator as Faker;

$factory->define(EquipmentForm::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'borrowed'=> $faker->numberBetween($min=1,$max=9),
        'checkout'=> $faker->datetimeBetween($startDate = 'now', $endDate = '+2 week'),
        'returned'=> $faker->datetimeBetween($startDate = 'now', $endDate = '+2 week'),
        'description'=> $faker->realText(100),
        'confirmed'=> $faker->randomElement(['0','1']),
    ];
});
