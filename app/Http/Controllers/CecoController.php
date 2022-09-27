<?php

namespace App\Http\Controllers;

use App\Models\Ceco;
use Illuminate\Http\Request;

class CecoController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:ceco-list', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Ceco::paginate(20);

        return view('cecos.index', compact('data'));
    }


    public function show($id)
    {
        $ceco = Ceco::find($id);

        return view('cecos.show', compact('ceco'));
    }
}
