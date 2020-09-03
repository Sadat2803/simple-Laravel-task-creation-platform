<?php

use Faker\Generator as Faker;
use App\Request;
$factory->define(Request::class, function (Faker $faker) {
    return [
        'description' => "Ceci est la description de la demande de travail",
    ];
});
