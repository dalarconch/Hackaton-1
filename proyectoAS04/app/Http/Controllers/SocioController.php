<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSocioRequest;
use App\Socio;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $socios = Socio::where('nombre_socio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $socios = Socio::paginate(5);
        }
        return view('Socio.index', compact('socios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        return view('Socio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocioRequest $request)
    {
        Socio::create([
            'nombre_socio' => $request['nombre_socio'],
        ]);
        return redirect()->route('Socio.index')-> with('status','Socio añadido de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        $socios = Socio::find($id);
        return view('Socio.show', compact('socios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        $socios = Socio::find($id); 
        return view('Socio.edit', compact('socios')); 
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
        $socios = Socio::find($id);
        $socios -> fill($request->all()); 
        $socios -> save();
        return redirect()->route('Socio.show', [$socios])-> with('status','Socio actualizado correctamente');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socios = Socio::find($id);
        $socios -> delete(); 
        return redirect()->route('Socio.index', [$socios])-> with('status','Socio eliminado correctamente');
    }
}
