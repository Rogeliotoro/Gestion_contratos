<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

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


    public function show($id)
    {
        $file = File::find($id);

        return view('files.show', compact('file'));
    }

}
