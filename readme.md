# Laravel Database API

This project allows you to run a JSON API for an album database

To access it in heroku, go [there](http://laravel-album-db.herokuapp.com/)


### Setting up
After cloning the repo, you need to use `composer install` to download and install the dependencies.

You need a PostgreSQL database, if you already have one, you can put your credentials in the .env file in the DB_... section. If you do not have one, you can use `docker-compose up` in the root directory to run a docker container with the `docker-compose.yml` file included.

Serve `public/index.php` with whichever HTTP server you prefer (it must support php obviously). If you do not have any server set up, you can use `php artisan serve` from the root of the repository and the project will be served locally.

## Usage
Register via the webpage (`yourdomain/register`), you can now interact with the api at  `yourdomain/api/albums`

### Album object
A dictionary containing the following keys:

  * `id`: The identifier of the album as an integer.
  * `album_cover`: An url pointing to the album's cover.
  * `artist_name`: The name of the artist.
  * `album_name`: The name of the album.
  * `music_style`: The album's muscical genre.
  * `production_year`: The album's year of production.
  * `label`: The album's label.
  * `songs_list`: A list of comma-separated songs as a string.
  * `album_average_score`: The album's rating as an integer, out of 10.

## Router

#### GET `/albums`
Returns all the albums

#### GET `/album/?id=10`
Returns an album by id.

#### GET `/search/?param=name`
Returns all the albums whose artis name or album name contain the word `name`.

#### POST `/album`
Only takes JSON as input.
Creates a new album.
Returns the newly created album object, including its id.

#### PUT `/album/?id=10`
Only takes JSON as input.

Updates the specified album.

#### DELETE `/album/?id=10`
Deletes the specified album.

------------------------------------------------------------------------
