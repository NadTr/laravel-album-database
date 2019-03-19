<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = [
      'album_cover',
      'artist_name',
      'album_name',
      'music_style',
      'production_year',
      'label',
      'songs_list',
      'album_average_score'
  ];
}
