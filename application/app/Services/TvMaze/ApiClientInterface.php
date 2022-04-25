<?php

namespace App\Services\TvMaze;

interface ApiClientInterface
{
    /**
     * @param string $url
     * @param string $param
     * @return array
     */
    public function get(string $url, string $param): array;
}
