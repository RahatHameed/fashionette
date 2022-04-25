<?php
 namespace App\Services\TvMaze;

 use Illuminate\Support\Facades\Http;

 class ApiClient implements ApiClientInterface
 {
     const PARAMS_QUERY = 'q';
    /**
     * @param string $url
     * @param string $param
     * @return array
     *
     */

    public function get(string $url, string $param): array {

        $queryParams = [];
        if (!empty($param)) {
            $queryParams[self::PARAMS_QUERY] = $param;
        }

        $response = Http::get($url,$queryParams);
        return  $response->json();
    }

 }
