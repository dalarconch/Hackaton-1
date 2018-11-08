<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Clients; //Clase que obtiene los datos de la API

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Clase almacenada en app/repositories/Posts.php
    protected $clients;

    //Se inyecta la Clase por el constructor
    public function __construct(Clients $clients)
    {
        $this->clients = $clients;
    }

    public function index()
    {
        $clients = $this->clients->all(); //Metodo All que obtiene todos los posts. Metodo declarado en Posts.php

        //dd($clients);

        return view('clients/index', compact('clients'));
    }
    
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
        $client = $this->clients->find($id);

        return view('clients/show', compact('client'));
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
