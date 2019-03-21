<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {

    return [
      'album_cover'           => $faker->imageUrl($width = 500, $height = 500), // 'http://lorempixel.com/640/480/'
      'artist_name'           => $faker->name(),
      'album_name'            => $faker->realText(30),
      'music_style'           => $faker->realText(10),
      'production_year'       => $faker->year($max = 'now'),
      'label'                 => $faker->company()),
      'songs_list'            => $faker->realText(120),
      'album_average_score'   => $faker->randomDigitNotNull()
    ];
});
