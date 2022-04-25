<?php

namespace App\Services\TvMaze;

interface ServiceInterface
{
    /**
     * @param string $query
     * @return array
     */
    public function searchMovieTitles(string $query): array;

    /**
     * @param array $movies
     * @param string $query
     * @return string
     */
    public function filterMovieTitle(array $movies,string $query): string;
}
