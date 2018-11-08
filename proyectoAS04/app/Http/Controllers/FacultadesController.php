<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facultad;
use App\Universidad;
use App\Http\Requests\StoreFacultadRequest;


class FacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$facultades = Facultad::paginate(10);
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $facultades = Facultad::where('nombre_facultad', 'LIKE', "%$keyword%")->orWhere('area_facultad', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $facultades = 'App\Facultad'::with('University')->paginate(5);//Llama al controlador
        }
        //$facultades = Facultad::all();
        //$facultades = Facultad::find('id');

        return view('Facultades.index', compact('facultades'));
        //return view('Facultades.index', ['facultades' => $facultades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $request->user()->authorizeRoles(['Administrador']);
        $universidades = Universidad::all(); //Pasar los campos de la clave foranea id_universidad 

        return view('Facultades.create', compact('universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacultadRequest $request)
    {
        //$this->validateInput($request);
        Facultad::create([
            'nombre_facultad' => $request['nombre_facultad'],
            'area_facultad' => $request['area_facultad'],
            'id_universidad' => $request['id_universidad'],
        ]);
        //return $request->all();
        return redirect()->intended('Facultades')-> with('status','Facultad agregada de forma correcta');
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
        $facultad = Facultad::find($id); //Buscamos en el modelo Archivo la informacion relacionada a la ID que llega. Se almacena en $archivo y se retorna.
        return view('Facultades.show', compact('facultad')); //Cada vez que Laravel genera una vista espera un parametro (compact) el cual es utilizado para compartir informacion con nuestra vista.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $requets)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $facultad = Facultad::find($id); //Buscamos en el modelo Archivo la informacion relacionada a la ID que llega. Se almacena en $archivo y se retorna.
        return view('Facultades.edit', compact('facultad')); //Cada vez que Laravel genera una vista espera un parametro (compact) el cual es utilizado para compartir informacion con nuestra vista.
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
        $facultad = Facultad::find($id);
        $facultad -> fill($request->all()); 
        $facultad -> save();
        return redirect()->route('Facultades.show', [$facultad])-> with('status','Facultad actualizada correctamente');
        //con with enviamos un mensaje en pantalla de que se actualizó. Esta conectada con la vista "show"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultad::find($id);
        $facultad -> delete(); //Eliminar los otros campos del archivo
        //return redirect('Archivo');
        return redirect()->route('Facultades.index', [$facultad])-> with('status','Pauta eliminada correctamente');
    }

    public function byuniversidad($id){
        return Facultad::where('id_universidad', $id)->get();
    }
}
