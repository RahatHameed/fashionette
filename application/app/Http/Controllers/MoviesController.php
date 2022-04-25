<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Exception;

class MoviesController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $response = ['message'=>'Something went wrong'];
        $responseCode = ResponseAlias::HTTP_NOT_FOUND;
        try {
            $query = $request->get('q');
            if(!empty($query)){
                $responseCode = ResponseAlias::HTTP_OK;
                $response['message'] ='Searched query'.$query;
            }
        } catch(Exception $exception) {
            $response['message'] = $exception->getMessage();
            $responseCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($response, $responseCode);
    }
}
