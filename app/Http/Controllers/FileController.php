<?php

namespace App\Http\Controllers;

use App\Models\File;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
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
       
        $data = new Client();
        $headers = [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSIsImtpZCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSJ9.eyJhdWQiOiJodHRwczovL2FwaS5idXNpbmVzc2NlbnRyYWwuZHluYW1pY3MuY29tIiwiaXNzIjoiaHR0cHM6Ly9zdHMud2luZG93cy5uZXQvZDQ3M2FlNTYtYWNkZC00YmI3LTk5MTQtZjMzYTE3N2I2NzM5LyIsImlhdCI6MTY2NDQ2NzQyMCwibmJmIjoxNjY0NDY3NDIwLCJleHAiOjE2NjQ0NzEzMjAsImFpbyI6IkUyWmdZSkJaeExaZDU1Z1F6NjJ6L1hyZmx0ZnpBZ0E9IiwiYXBwaWQiOiJmNzQ4NzdlOS0wZDdmLTQxZjAtOGM5MS0zNjRmYzAyNDZjYjEiLCJhcHBpZGFjciI6IjEiLCJpZHAiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC9kNDczYWU1Ni1hY2RkLTRiYjctOTkxNC1mMzNhMTc3YjY3MzkvIiwiaWR0eXAiOiJhcHAiLCJvaWQiOiI5ZDFmODJhNC1hZDJiLTQyOGMtYmE3My1jMjdkNGIxMjJmY2QiLCJyaCI6IjAuQVI4QVZxNXoxTjJzdDB1WkZQTTZGM3RuT1QzdmJabHNzMU5CaGdlbV9Ud0J1SjhmQUFBLiIsInJvbGVzIjpbIkF1dG9tYXRpb24uUmVhZFdyaXRlLkFsbCIsImFwcF9hY2Nlc3MiLCJBUEkuUmVhZFdyaXRlLkFsbCJdLCJzdWIiOiI5ZDFmODJhNC1hZDJiLTQyOGMtYmE3My1jMjdkNGIxMjJmY2QiLCJ0aWQiOiJkNDczYWU1Ni1hY2RkLTRiYjctOTkxNC1mMzNhMTc3YjY3MzkiLCJ1dGkiOiJ1ZEpWWGhHdWxrdXFSelRXczZZVkFBIiwidmVyIjoiMS4wIn0.gF-43rIIFbbJIyJe9CZiHNoghCT0DriRdfqzB_DWCbQr6XyAi9Z3Ky64vsLxDA7VObkYlZLIthBLkfcGErcdyzvoSmaF2PMWrDlhEZF3cuDJnLYaxou_pUZP2-yzmSo_5ITJSSRArS7BiZ3pp0dKeepTKtHG-r1hHMTlJbY_lThRLD0BQJgU-KRRnNLI3OSstCF5_o2pGMWVnninATeLpRhorqmv_DRTw4HissIcJIWSl1edAHLJrGOb_enGiFTT7o57kJMNySJ1_6fOt7PW_baIVOFgb2cIx4B0SrhBHBc6O0QogoQ-JMdmiT5YVpzmIrOGxCuMuxcbThZITF_psw'
        ];
        $request = new Psr7Request('GET', 'https://api.businesscentral.dynamics.com/v2.0/d473ae56-acdd-4bb7-9914-f33a177b6739/Production/api/v2.0/companies(6191241e-256e-ec11-bf26-6045bd88d598)/dimensions(4d8c3b1a-5802-eb11-aa63-000d3a26d99c)/dimensionValues?$select=id,code,displayName', $headers);
        $res = $data->sendAsync($request)->wait();
    
        $res->getBody();
      
        
        return view('files.index',compact('res'));
    }

    public function show($id)
    {
        $file = File::find($id);

        return view('files.show', compact('file'));
    }

}
