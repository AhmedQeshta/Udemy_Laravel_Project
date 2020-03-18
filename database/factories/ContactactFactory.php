<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Company;
use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
            'first_name'  => $faker->firstName,
            'last_name'  => $faker->lastName,
            'phone'      => $faker->phoneNumber,
            'email'      => $faker->email,
            'address'    => $faker->address,
        ];
});
