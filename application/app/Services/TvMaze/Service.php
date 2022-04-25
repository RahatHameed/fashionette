<?php

namespace App\Services\TvMaze;
use Illuminate\Support\Facades\Cache;

class Service implements ServiceInterface
{
    const TVMAZE_SEARCH_URL = 'search/shows';
    const TVMAZE_SHOW_NAME = 'show';
    const TVMAZE_COL_NAME = 'name';
    /**
     * @var ApiClient
     */
    private $tvMazeApiClient;

    /**
     * Service constructor.
     * @param ApiClient $tvMazeApiClient
     */
    public function __construct(ApiClient $tvMazeApiClient)
    {
        $this->tvMazeApiClient = $tvMazeApiClient;
    }

    /**
     * @param string $query
     * @return array
     */
    public function searchMovieTitles(string $query): array
    {

        $response = [];
        $query = urldecode($query);

        $movies = $this->tvMazeApiClient->get(env('TVMAZE_URL').self::TVMAZE_SEARCH_URL,$query);
        $filteredResponse = $this->filterMovieTitle($movies,$query);

        $response['message'] = sprintf("The searched tv show %s.",$query);
        $response['data'] = $filteredResponse;
        return $response;
    }

    /**
     * @param array $movies
     * @param string $query
     * @return string
     */
    public function filterMovieTitle(array $movies, string $query): string{

        $attribute=self::TVMAZE_COL_NAME;
        $pluckShows = array_column($movies, self::TVMAZE_SHOW_NAME);
        $moviesCollection =  collect($pluckShows);

        // prepare exact match collection
        $moviesCollection = $moviesCollection->filter(function ($item) use ($attribute, $query) {
            return strtolower($item[$attribute]) == strtolower($query);
        });

        return $moviesCollection;
    }

}
