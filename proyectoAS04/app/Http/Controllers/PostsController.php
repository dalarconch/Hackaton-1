<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Repositories\Posts; //Clase que obtiene los datos de la API


class PostsController extends Controller
{

    //Clase almacenada en app/repositories/Posts.php
    protected $posts;

    //Se inyecta la Clase por el constructor
    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        $posts = $this->posts->all(); //Metodo All que obtiene todos los posts. Metodo declarado en Posts.php
        //dd($posts);
        return view('posts/index', compact('posts'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $post = $this->posts->find($id);

        return view('posts/show', compact('post'));
    }

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


