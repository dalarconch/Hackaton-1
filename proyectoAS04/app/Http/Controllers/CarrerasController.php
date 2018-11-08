<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Carreras;
use App\Facultad;
use App\Universidad;
use App\Http\Requests\StoreCarreraRequest;


/**
 * 
 */ 
class CarrerasController extends Controller
{

	public function index(){
		$carreras = 'App\Carreras'::with('University', 'Faculty')->paginate(5);
		return view('Carreras.index', compact('carreras'));
	}

	public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $facultades = Facultad::all();
        $universidades = Universidad::all(); //Pasar los campos de la clave foranea id_universidad 

        return view('Carreras.create', compact('facultades','universidades'));
    }

    public function store(StoreCarreraRequest $request)
    {
        Carreras::create([
            'nombre_carrera' => $request['nombre_carrera'],
            'id_universidad' => $request['id_universidad'],
            'id_facultad' => $request['id_facultad'],
        ]);
        //return $request->all();
        return redirect()->intended('Carreras')-> with('status','Carrera agregado de forma correcta');
    }

    public function show($id)
    {
        $carreras = Carreras::find($id); 
        return view('Carreras.show', compact('carreras')); 
    }

    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $carreras = Carreras::find($id); 
        return view('Carreras.edit', compact('carreras')); 
    }

    public function update(Request $request, $id)
    {
        $carreras = Carreras::find($id);
        $carreras -> fill($request->all()); 
        $carreras -> save();
        return redirect()->route('Carreras.show', [$carreras])-> with('status','Carrera actualizado correctamente');
    }

    public function destroy($id)
    {
        $carreras = Carreras::find($id);
        $carreras -> delete(); //Eliminar los otros campos del archivo
        //return redirect('Archivo');
        return redirect()->route('Carreras.index', [$carreras])-> with('status','Carrera eliminado correctamente');
    }

    public function byfacultad($id){
        return Carreras::where('id_facultad', $id)->get();
    }
}