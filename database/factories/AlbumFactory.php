<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
      'album_cover'           => $faker->imageUrl($width = 500, $height = 500), // 'http://lorempixel.com/640/480/'
      'artist_name'           => $faker->firstName(),
      'album_name'            => $faker->sentence(),
      'music_style'           => $faker->word(),
      'production_year'       => $faker->year($max = 'now'),
      'label'                 => $faker->word(),
      'songs_list'            => $faker->text(),
      'album_average_score'   => $faker->randomDigitNotNull()
    ];
});
