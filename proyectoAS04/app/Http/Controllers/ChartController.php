<?php

namespace App\Http\Controllers;

use App\Universidad;
use App\User;
use App\Curso;
use App\Proyecto;
use App\Socio;
use App\Facultad;
use App\Carreras;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Proyectos = DB::table('proyectos')
        //             ->select('id_universidad')
        //             // ->groupBy('id_universidad')
        //             ->where('id_universidad','=','1')
        //             ->count();

        $proy = DB::table('proyectos')
                     ->join('universidades','universidades.id','=','proyectos.id_universidad')
                     ->select(DB::raw('count(*) as proy_count, id_universidad'),'universidades.nombre_universidad as nombre_universidad')
                     //->where('anio', '>', 2016)
                     ->groupBy('id_universidad','nombre_universidad')
                     ->get();

        // $anio = DB::table('proyectos')
        //              ->join('universidades','universidades.id','=','proyectos.id_universidad')
        //              ->select(DB::raw('count(*) as anio_count, anio'),'id_universidad')
        //              ->where('anio', '>', 2016)
        //              ->groupBy('id_universidad','anio')
        //              ->get();
        $anio = DB::table('proyectos')
                     ->join('universidades','universidades.id','=','proyectos.id_universidad')
                     ->select(DB::raw('count(*) as anio_count, anio'),'nombre_universidad')
                     ->where('anio', '=', 2018)
                     ->groupBy('anio','nombre_universidad')
                     ->get();
        //dd($anio);
        //$pro = DB::table('proyectos')->get();

        //$Universidad = Universidad::all();

        //dd($proy);
        //dd($pro);
        //dd($Universidad);
        return view('Chart.index', compact('proy','anio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
