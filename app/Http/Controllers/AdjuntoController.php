<?php

namespace App\Http\Controllers;

use App\Models\Adjunto;
use App\Models\Note;
use App\Models\Post;
use Illuminate\Http\Request;

class AdjuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Adjunto::latest()->paginate(10);

        return view('adjuntos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::pluck('objeto', 'id')->all();

        return view('adjuntos.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Adjunto::create(array_merge(
            $request->only(
                'archivo',
                'posts_id'
            ),
            [
                'user_id' => auth()->id()
            ]
        ));


        return redirect()->route('adjuntos.index')
            ->withSuccess(__('Archivo subido correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adjunto = Adjunto::find($id);
    
        return view('adjuntos.show', compact('adjunto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adjunto = Adjunto::find($id);
    
        return view('adjuntos.edit', compact('adjunto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adjunto::find($id)->delete();
        
        return redirect()->route('adjuntos.index')
            ->with('success', 'Note deleted successfully');
    }
}