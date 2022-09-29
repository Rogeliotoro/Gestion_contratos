<?php

namespace App\Http\Controllers;


use App\Models\Contract;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $data = Contract::latest()->paginate(10);
        return view('contracts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $user = User::pluck('name', 'id')->all();
        $post = Post::pluck('objeto', 'id')->all();

        return view('contracts.create', compact('user', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Contract::create(array_merge(
            $request->only(
                'vigencia',
                'user_id',
                'posts_id',
                'estado',
                'importancia',
                'urgencia',
                'tipologia',
                'observaciones',
                'comentarios',
            ),
        ));
        return redirect()->route('contracts.index')
            ->withSuccess(__('Contrato creada correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);

        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $user = User::pluck('name', 'id')->all();

        return view('contracts.edit', compact('user'), [
            'contract' => $contract
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $contract->update($request->only(
            'vigencia',
            'user_id',
            'posts_id',
            'estado',
            'importancia',
            'urgencia',
            'tipologia',
            'observaciones',
            'comentarios',
        ));

        return redirect()->route('contracts.index')
            ->withSuccess(__('Contracto editado correctamente.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')
            ->withSuccess(__('Contrato borrado correctamente.'));
    }
}
