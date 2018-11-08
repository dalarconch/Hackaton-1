<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universidad;
use App\Http\Requests\StoreUniversidadRequest;

class UniversidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*Determinar que tipo de usuario es*/
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);

        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $universidades = Universidad::where('nombre_universidad', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $universidades = Universidad::paginate(4);
        }
        
        return view('Universidad.index', compact('universidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* Solo los Administradores pueden agregar nuevas universidades*/
        $request->user()->authorizeRoles(['Administrador']);
        return view('Universidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniversidadRequest $request)
    {
        Universidad::create([
            'nombre_universidad' => $request['nombre_universidad'],
            'informacion' => $request['informacion'],
        ]);
        return redirect()->route('Universidad.index')-> with('status','Universidad subida de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $universidades = Universidad::find($id);
        return view('Universidad.show', compact('universidades')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $universidades = Universidad::find($id); //Buscamos en el modelo Archivo la informacion relacionada a la ID que llega. Se almacena en $archivo y se retorna.
        return view('Universidad.edit', compact('universidades')); //Cada vez que Laravel genera una vista espera un parametro (compact) el cual es utilizado para compartir informacion con nuestra vista.
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
        $universidades = Universidad::find($id);
        $universidades -> fill($request->all()); 
        $universidades -> save();
        return redirect()->route('Universidad.show', [$universidades])-> with('status','Universidad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universidades = Universidad::find($id);
        $universidades -> delete(); 
        return redirect()->route('Universidad.index', [$universidades])-> with('status','Universidad eliminada correctamente');
    }
}
