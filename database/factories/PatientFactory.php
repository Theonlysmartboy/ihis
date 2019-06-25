<?php

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    return [
        "huduma_no" => $faker->name,
        "name" => $faker->name,
        "conatct" => $faker->name,
        "zone_id" => factory('App\ContactCompany')->create(),
        "hospital_id" => factory('App\Contact')->create(),
    ];
});
