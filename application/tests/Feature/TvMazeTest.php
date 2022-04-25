<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\TvMaze\Service;
use App\Services\TvMaze\ApiClient;
use Illuminate\Testing\TestResponse;

class TvMazeTest extends TestCase
{

    const TVMAZE_QUERY = 'Deadwood';


    /**
     * A basic invalid route test
     *
     * @return void
     */
    public function test_a_invalid_route()
    {
        $response = $this->get('/');
        $response->assertStatus(404);
    }

    /**
     * A basic valid route test
     *
     * @return void
     */
    public function test_a_valid_route()
    {
        $response = $this->get('/?q='.self::TVMAZE_QUERY);
        $response->assertSuccessful();
    }

    /**
     * This method will check route by POST
     *
     * @return void
     */
    public function test_a_route_by_post()
    {
        $response = $this->post('/?q='.self::TVMAZE_QUERY);
        $response->assertStatus(404);
    }

    /**
     * This method check our route along data returned
     * and its status as well
     * @return void
     */
    public function test_search_movie_by_title()
    {
        //case:1 Test check status code
        $response = $this->get('/?q='.self::TVMAZE_QUERY);
        $response->assertStatus(200);

        //case:2 check if returned array data count
        $response->assertSee('data');

        //case:3 check if response is returned
        $response->assertJsonFragment(['message' => 'The searched tv show Deadwood.']);

        //case:4 should check response is 200
        $response->assertOk();

    }
}
