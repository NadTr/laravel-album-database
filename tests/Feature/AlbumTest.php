<?php

namespace Tests\Feature;

use App\Album;
use Illuminate\Foundation\Testing\DatabaseMigrations;


use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_will_show_all_albums()
    {
        $albums = factory(Album::class, 10)->create();

        $response = $this->get(route('albums.index'));

        $response->assertStatus(200);

        $response->assertJson($albums->toArray());
    }

    /** @test */
    public function it_will_create_albums()
    {
        $response = $this->post(route('albums.store'), [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('albums', [
            'title' => 'This is a title'
        ]);

        $response->assertJsonStructure([
            'message',
            'album' => [
                'title',
                'description',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }

    /** @test */
    public function it_will_show_a_album()
    {
        $this->post(route('albums.store'), [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ]);

        $album = Album::all()->first();

        $response = $this->get(route('albums.show', $album->id));

        $response->assertStatus(200);

        $response->assertJson($album->toArray());
    }

    /** @test */
    public function it_will_update_a_album()
    {
        $this->post(route('albums.store'), [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ]);

        $album = Album::all()->first();

        $response = $this->put(route('albums.update', $album->id), [
            'title' => 'This is the updated title'
        ]);

        $response->assertStatus(200);

        $album = $album->fresh();

        $this->assertEquals($album->title, 'This is the updated title');

        $response->assertJsonStructure([
           'message',
           'album' => [
               'title',
               'description',
               'updated_at',
               'created_at',
               'id'
           ]
       ]);
    }

    /** @test */
    public function it_will_delete_a_album()
    {
        $this->post(route('albums.store'), [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ]);

        $album = Album::all()->first();

        $response = $this->delete(route('albums.destroy', $album->id));

        $album = $album->fresh();

        $this->assertNull($album);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
