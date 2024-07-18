<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ResearchDocumentController extends Controller
{
    //
    public function index()
    {
        //
        $client = new Client();
        $apiurl = "http://127.0.0.1:8000/api/research-documents";
        try {
            $response = $client->get($apiurl);
            $researchDocuments = json_decode($response->getBody());
            //dd($research);
            return view("research_documents", compact("researchDocuments"));
        } catch (\Exception $e) {
            return view("api_error", ['error'=>$e->getMessage()]);
        }
    }
}
