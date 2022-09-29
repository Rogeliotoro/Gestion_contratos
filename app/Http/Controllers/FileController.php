<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FileController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:file-list', ['only' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = File::latest()->paginate(20);
    
        return view('files.index',compact('data'));
    }

    public function api()
    {
        // URL
        $apiURL = '';

        // POST Data
        $postInput = [
            'title' => 'Sample Post',
            'body' => "This is my sample curl post request with data",
            'userId' => 22
        ];
  
        // Headers
        $headers = [
            //...
        ];
  
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
      
        echo $statusCode;  // status code

        dd($responseBody); // body response
    }


    public function show($id)
    {
        $file = File::find($id);

        return view('files.show', compact('file'));
    }

}
