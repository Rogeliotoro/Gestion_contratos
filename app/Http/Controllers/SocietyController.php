<?php

namespace App\Http\Controllers;

use App\Models\Ceco;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:society-list', ['only' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Society::paginate(20);

        return view('societies.index',compact('data'));
        
    }


    public function show($id)
    {
        $society = Society::find($id);

        return view('societies.show', compact('society'));
    }

}


