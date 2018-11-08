<?php

namespace App\Http\Controllers;

use App\User;
use App\Curso;
use App\Proyecto;
use App\Socio;
use App\Facultad;
use App\Universidad;
use App\Carreras;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProyectosRequest;


class ProyectosController extends Controller
{
    
    public function index(Request $request)
    {
        //$proyectos = Proyecto::All();
        

        //Buscador
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $nombresProyectos = DB::table('proyectos')
            // ->join('cursos','cursos.id','=','proyectos.ramo')
            ->join('users','users.id','=','proyectos.id_profesor')
            ->join('universidades','universidades.id','=','proyectos.id_universidad')
            ->select('proyectos.id as id','users.nombre as profesor' ,'proyectos.nombre_proyecto as nombre_proyecto','universidades.nombre_universidad as nombre_universidad'/*,'cursos.nombre_curso as nombre_curso'*/)
            ->where('nombre_proyecto', 'LIKE', "%$keyword%")
            ->orWhere('universidades.nombre_universidad', 'LIKE', "%$keyword%")
            ->orWhere('users.nombre', 'LIKE', "%$keyword%")
            ->orderBy('nombre_proyecto')
            ->paginate($perPage);

        } else {
            $nombresProyectos = DB::table('proyectos')
            // ->join('cursos','cursos.id','=','proyectos.ramo')
            ->join('users','users.id','=','proyectos.id_profesor')
            ->join('universidades','universidades.id','=','proyectos.id_universidad')
            ->select('proyectos.id as id','users.nombre as profesor' ,'proyectos.nombre_proyecto as nombre_proyecto','universidades.nombre_universidad as nombre_universidad'/*,'cursos.nombre_curso as nombre_curso'*/)
            ->orderBy('nombre_proyecto')
            ->paginate(5);
        }

        return view('proyecto.index', compact('nombresProyectos'));
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Profesor']);
        $user = Auth::user();
        $userUniversidad=$user->universidad;
        //echo  $userUniversidad;
        $universidad=DB::table('universidades')
        ->where('id', '=' ,$userUniversidad)
        ->select('id', 'nombre_universidad')
        ->first();

        //echo $universidad->id;
        //$u=$universidad->nombre_universidad;
        $cursos = Curso::all(); //Pasar los campos de curso --- Aqui falta una consulta para separar los cursos por universidad lo haré cuando hayan más cursos
        $facultades = Facultad::all(); //Pasar los campos de las facultades
        $universidades = Universidad::all(); //Pasar los campos de la clave foranea id_universidad
        $socios = Socio::all();
        //$users = User::all();

        return view('proyecto.create', compact('facultades','universidades', 'user', 'cursos', 'socios', 'universidad'));
    }

    public function complete($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Profesor']);
        $cursos = Curso::all(); //Pasar los campos de curso
        $facultades = Facultad::all(); //Pasar los campos de las facultades
        $universidades = Universidad::all(); //Pasar los campos de la clave foranea id_universidad
        $users = User::all();

        $proyectoCarrera = Proyecto::find($id);

        $ramo=$proyectoCarrera->ramo;
        
        $carrera=DB::table('cursos')
        ->where('cursos.id', $ramo)
        ->join('carreras','carreras.id','=','cursos.id_carrera')
        ->select('carreras.id as id_carrera', 'carreras.nombre_carrera as carrera')
        ->get()
        ->first();

        $proyecto = DB::table('proyectos')
        ->where('proyectos.id', $id)
        //->join('facultads','facultads.id','=','proyectos.facultad')
        ->join('cursos','cursos.id','=','proyectos.ramo')
        ->select('proyectos.id as id','proyectos.anio as anio','proyectos.ramo as ramo','proyectos.nombre_proyecto as nombre_proyecto', 'cursos.nombre_curso as ramo')
        ->get()
        ->first();
        // $proyecto = Proyecto::find($id);
        return view('proyecto.complete', compact('proyecto', 'facultades','universidades', 'users', 'cursos', 'carrera'));
    }
    
    public function store(StoreProyectosRequest $request){

        $idUniversidad=DB::table('universidades')
        ->where('nombre_universidad', $request['universidad'])
        ->select('id', 'nombre_universidad')
        ->first();

         $idd=$idUniversidad->id;
        //$id=$idUniversidad->id;
        Proyecto::create([
            'nombre_proyecto' => $request['nombre_proyecto'],
            'id_profesor' => $request['id_profesor'],
            'id_universidad' => $idd,
            'anio' => $request['anio'],
            'ramo' => $request['ramo'],
            'complejidad' => $request['complejidad'],
            'duracion' => $request['duracion'],
            'sectorsocio' => $request['sectorsocio'],
            // 'facultad' => $request['facultad'],
            // 'cantidad_alumnos' => $request['cantidad_alumnos'],
            // 'visible' => $request['visible'],
            // 'evaluaciones' => $request['evaluaciones'],
            // 'otras_evaluaciones' => $request['otras_evaluaciones'],
            // 'porcentaje' => $request['porcentaje'],
            // 'objalcanzados' => $request['objalcanzado'],
            // 'resumen' => $request['resumen'],
            // 'objetivos' => $request['objetivo'],
            // 'resultados' => $request['resultado'],
            // 'conclusion' => $request['conclusion'],
            // 'estado' => $request['estado'],
            // 'nombre_archivo' => $request['nombre_archivo'],
            // 'nombre_extension' => $request['nombre_extension'],
            // 'encuesta_archivo' => $request['encuesta_archivo'],
            // 'encuesta_extension' => $request['encuesta_extension'],
            // 'id_course' => $request['id_course'],
            // 'alumnos_table' => $request['alumnos_table'],
        ]);

        return redirect()->route('proyecto.index')-> with('status','Proyecto agregado de forma correcta');
    }



    public function completar(Request $request, $id){

        //$nuevoDuracion => $request['duracion'];
        //'facultad' => $request['facultad'],
        $nuevoCantidad_alumnos = $request['cantidad_alumnos'];
        $nuevoVisible = $request['visible'];
        //'evaluaciones' => $request['evaluaciones'],
        //'otras_evaluaciones' => $request['otras_evaluaciones'],
        $nuevoPorcentaje = $request['porcentaje'];
        $nuevoObjalcanzados = $request['objalcanzados'];
        $nuevoResumen = $request['resumen'];
        $nuevoObjetivos = $request['objetivos'];
        $nuevoResultados = $request['resultados'];
        $nuevoConclusion = $request['conclusion'];
        $nuevoEstado = $request['estado'];
        $nombre_archivo = $request['nombre_archivo'];
        //'nombre_extension' => $request['nombre_extension'],
        $nuevoEncuesta_archivo = $request['encuesta_archivo'];
        //'encuesta_extension' => $request['encuesta_extension'], 

        $proyecto = Proyecto::find($id);

        $proyecto->cantidad_alumnos = $nuevoCantidad_alumnos;
        $proyecto->visible = $nuevoVisible;
        $proyecto->porcentaje =  $nuevoPorcentaje;
        $proyecto->objalcanzados = $nuevoObjalcanzados;
        $proyecto->resumen = $nuevoResumen;
        $proyecto->objetivos = $nuevoObjetivos;
        $proyecto->resultados = $nuevoResultados;
        $proyecto->conclusion = $nuevoConclusion;
        $proyecto->estado = $nuevoEstado;
        $proyecto->nombre_archivo = $nombre_archivo;
        $proyecto->encuesta_archivo = $nuevoEncuesta_archivo;

        $proyecto -> save();

        return redirect()->route('proyecto.index', [$proyecto])-> with('status','Proyecto completado correctamente');
    }

    public function edit($id, Request $request) {
        $request->user()->authorizeRoles(['Administrador','Profesor']);
        $socios = Socio::all();
        $cursos = Curso::all();
        $carreras = Carreras::all();
        $proyectoCarrera = Proyecto::find($id);
        $ramo=$proyectoCarrera->ramo;
        $carrera=DB::table('cursos')
        ->where('cursos.id', $ramo)
        ->join('carreras','carreras.id','=','cursos.id_carrera')
        ->select('carreras.id as id_carrera', 'carreras.nombre_carrera as carrera')
        ->get()
        ->first();

        $proyecto = DB::table('proyectos')
        ->where('proyectos.id', $id)
        //->join('facultads','facultads.id','=','proyectos.facultad')
        ->join('cursos','cursos.id','=','proyectos.ramo')
        ->join('users','users.id','=','proyectos.id_profesor')
        ->join('universidades','universidades.id','=','proyectos.id_universidad')
        ->join('sociocomunitario','sociocomunitario.id','=','proyectos.sectorsocio')
        ->select('proyectos.id as id','proyectos.anio as anio','proyectos.ramo as ramo','proyectos.nombre_proyecto as nombre_proyecto', 'proyectos.complejidad as complejidad','proyectos.duracion as duracion','cursos.nombre_curso as ramo', 'users.nombre as profesor','users.id as profesorID', 'universidades.nombre_universidad as universidad', 'universidades.id as universidadID', 'sociocomunitario.nombre_socio as socio')
        ->get()
        ->first();

        return view('proyecto.edit', compact('proyecto', 'socios', 'cursos', 'carreras'));
    }

    public function update(Request $request, $id){
        $proyecto = Proyecto::find($id);
        $proyecto -> fill($request->all());
        $proyecto -> save();
        echo $id;
        return redirect()->route('proyecto.show', [$proyecto])-> with('status','Proyecto actualizado correctamente');
    } 
    

    public function show($id){

        $proyectoCarrera = Proyecto::find($id);

        $ramo=$proyectoCarrera->ramo;

        $carrera=DB::table('cursos')
        ->where('cursos.id', $ramo)
        ->join('carreras','carreras.id','=','cursos.id_carrera')
        ->select('carreras.id as id_carrera', 'carreras.nombre_carrera as carrera')
        ->get()
        ->first();

        $proyecto = DB::table('proyectos')
        ->where('proyectos.id', $id)
        //->join('facultads','facultads.id','=','proyectos.facultad')
        ->join('cursos','cursos.id','=','proyectos.ramo')
        ->join('users','users.id','=','proyectos.id_profesor')
        ->join('universidades','universidades.id','=','proyectos.id_universidad')
        ->join('sociocomunitario','sociocomunitario.id','=','proyectos.sectorsocio')
        ->select('proyectos.id as id','proyectos.anio as anio','proyectos.ramo as ramo','proyectos.nombre_proyecto as nombre_proyecto', 'proyectos.complejidad as complejidad','proyectos.duracion as duracion','cursos.nombre_curso as ramo', 'users.nombre as profesor', 'universidades.nombre_universidad as universidad', 'sociocomunitario.nombre_socio as socio')
        ->get()
        ->first();

        return view('proyecto.show', compact('proyecto', 'carrera'));
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        return redirect()->route('proyecto.index', [$proyecto])-> with('status','Proyecto eliminado correctamente');
    }

}
