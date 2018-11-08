<?php  

namespace App\Repositories;
use GuzzleHttp\Client;

//Clase encargada de obtener los posts para los distintos metodos del controlador
Class Posts
{
	//Envia los posts dela API al controlador
	public function all()
	{
		$client = new Client([
        // Base URI is used with relative requests
        	'base_uri' => 'https://jsonplaceholder.typicode.com',
    	]);
	    //Petición a la API mediante el metodo Request
	    //Se define en "test" la url a la que nos conectaremos
	    //Cambiar por alguna que se encuentre en la API
	    //$response = $client->request('GET', 'test'); 
	    $response = $client->request('GET', 'posts'); 
	    //El "stream" es el cuerpo de la respuesta /body que contiene los posts
	    //Acceder a stream ->getBody() 
	    //->getContents() entrega el contenido del stream, en este caso todos los post
	    
	    //json_decode laravel lo transforma en un array para trabajarlo como json
	    //return json_decode($response->getBody()->getContents());
	    // $posts = json_decode($response->getBody()->getContents()); //Almacenamos los posts provenientes de la API
	    //dd($response);
	    return json_decode($response->getBody()->getContents()); //Se retornan al controlador

	}

	//Busca una ID especifica de un post y la envia al Controlador
	public function find($id)
	{
		$client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
        ]);

        $response = $client->request('GET', "posts/{$id}"); 

        return json_decode($response->getBody()->getContents()); 
	}
}