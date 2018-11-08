<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Carreras;
use App\Facultad;
use App\Universidad;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor','Alumno']);
        //$cursos = 'App\Curso'::with('Faculty','University')->get()->sortByDesc('id');
        //$cursos = 'App\Curso'::orderBy('id','desc')->with('Faculty','University')->get();
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $cursos = Curso::where('nombre_curso', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cursos = 'App\Curso'::orderBy('id')->with('Faculty','University','Carrera')->paginate(5);
        }
        //return view('system-mgmt/sala/index', ['salas' => $salas]);
        //-> sortByDesc('id');
        return view('Curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        //$facultades = 'App\Curso'::with('Faculty','University')->get();
        $facultades = Facultad::all();
        $carreras = Carreras::all();
        $universidades = Universidad::all(); //Pasar los campos de la clave foranea id_universidad 
        //$facultades = 'App\Curso'::with('Faculty','University')->get();

        return view('Curso.create', compact('facultades','universidades', 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursoRequest $request)
    {
        Curso::create([
            'nombre_curso' => $request['nombre_curso'],
            'id_carrera' => $request['id_carrera'],
            'id_universidad' => $request['id_universidad'],
            'id_facultad' => $request['id_facultad'],
        ]);
        //return $request->all();
        return redirect()->intended('Curso')-> with('status','Curso agregado de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se hace una consulta directa a la base de datos para obtener los nombres de universidades y de las facultades
        //$cursos = Curso::find($id);
        $cursos = DB::table('cursos')
        ->where('cursos.id', $id)
        ->join('universidades','universidades.id','=','cursos.id_universidad')
        ->join('facultads','facultads.id','=','cursos.id_facultad')
        ->select('cursos.id as id','cursos.nombre_curso as nombre_curso','universidades.nombre_universidad as universidad','facultads.nombre_facultad as facultad','cursos.created_at as created_at','cursos.updated_at as updated_at')
        ->get()
        ->first();

        return view('Curso.show', compact('cursos')); 
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
        $cursos = Curso::find($id); 
        return view('Curso.edit', compact('cursos')); 
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
        $cursos = Curso::find($id);
        $cursos -> fill($request->all()); 
        $cursos -> save();
        return redirect()->route('Curso.show', [$cursos])-> with('status','Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursos = Curso::find($id);
        $cursos -> delete(); //Eliminar los otros campos del archivo
        //return redirect('Archivo');
        return redirect()->route('Curso.index', [$cursos])-> with('status','Curso eliminado correctamente');
    }
}
