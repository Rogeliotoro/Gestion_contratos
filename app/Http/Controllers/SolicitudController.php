<?php

namespace App\Http\Controllers;

use App\Models\Ceco;
use App\Models\File;
use App\Models\Society;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class SolicitudController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:solicitud-list|solicitud-create|solicitud-edit|solicitud-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:solicitud-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:solicitud-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:solicitud-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Solicitud::latest()->paginate(5);

        return view('solicitudes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $society = Society::pluck('name','id')->all();
        $file = File::pluck('code','id')->all();
        $ceco = Ceco::pluck('code','id')->all();
      

        return view('solicitudes.create', compact('society','file','ceco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comentarios' => 'required',
            'estado' => 'required',
            'objeto' => 'required',
            'condiciones' => 'required',
            'observaciones' => 'required',
            'importe' => 'required',
            'forma_de_pago' => 'required',
            'observaciones_adicionales' => 'required',
            'tipo' => 'required',
            'firmante' => 'required',
            'documentacion' => 'required',
            'representacion' => 'required',
            'societies_id' => 'required',
            'files_id' => 'required',
            'cecos_id' => 'required',
        ]);
        
        $input = $request->except(['_token']);
        $id = Auth::id();
    
        Solicitud::create([$input,$id]);
    
        return redirect()->route('solicitudes.index')
            ->with('success','Solicitud ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        return view('solicitudes.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitud = Solicitud::find($id);

        return view('solicitudes.edit',compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'comentarios' => 'required',
            'estado' => 'required',
        ]);

        $solicitud = Solicitud::find($id);
    
        $solicitud->update($request->all());
    
        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Solicitud::find($id)->delete();
    
        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud deleted successfully.');
    }
}