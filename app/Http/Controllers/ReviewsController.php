<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class ReviewsController extends Controller
{
    //
    public function index()
    {
        //
        $client = new Client();
        $apiurl = "http://127.0.0.1:8000/api/reviews";
        try {
            $response = $client->get($apiurl);
            $reviews = json_decode($response->getBody());
            //dd($reviews);
            return view("reviews", compact("reviews"));
        } catch (\Exception $e) {
            return view("api_error", ['error'=>$e->getMessage()]);
        }
    }
}
