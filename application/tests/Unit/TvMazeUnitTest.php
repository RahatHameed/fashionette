<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\TvMaze\ApiClient;

class TvMazeUnitTest extends TestCase
{
    const TVMAZE_SEARCH_URL = 'search/shows';
    const TVMAZE_QUERY = 'Deadwood';

    /**
     * @var ApiClient
     */
    private $tvMazeApiClient;

    /**
     * @var Service
     */
    private $tvMazeApiService;

    function setUp(): void
    {
        parent::setUp();
        $this->tvMazeApiClient = $this->createMock(ApiClient::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_api_client_get_call()
    {
        $response = $this->tvMazeApiClient->get(env('TVMAZE_URL').self::TVMAZE_SEARCH_URL,self::TVMAZE_QUERY);
        static::assertIsArray($response);
    }
}
