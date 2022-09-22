<?php

namespace App\Http\Controllers;

use App\Models\Ceco;
use App\Models\File;
use App\Models\Post;
use App\Models\Society;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->paginate(10);

        return view('posts.index', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $society = Society::pluck('name', 'id')->all();

        return view('posts.create', compact('society'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(array_merge(
            $request->only(
                'estado',
                'objeto',
                'condiciones',
                'observaciones',
                'societies_id',
                'cod_cliente',
                'cod_cecos',
                'cod_files',
                'tipo',
                'firmante',
                'documentacion',
                'representacion',
                'importe',
                'forma_de_pago',
                'observaciones_adicionales',
                'fecha_inicio',
                'fecha_fin',
            ),
            [
                'user_id' => auth()->id()
            ]
        ));


        return redirect()->route('posts.index')
            ->withSuccess(__('Solicitud creada correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $society = Society::pluck('name', 'id')->all();

        return view('posts.show', compact('post', 'society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $society = Society::pluck('name', 'id')->all();
      
        return view('posts.edit', compact('society'), [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only(
            'user_id',
            'estado',
            'objeto',
            'condiciones',
            'observaciones',
            'societies_id',
            'cod_cliente',
            'cod_files',
            'cod_cecos',
            'tipo',
            'firmante',
            'documentacion',
            'representacion',
            'importe',
            'forma_de_pago',
            'observaciones_adicionales',
            'fecha_inicio',
            'fecha_fin',
        ));

        return redirect()->route('posts.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
