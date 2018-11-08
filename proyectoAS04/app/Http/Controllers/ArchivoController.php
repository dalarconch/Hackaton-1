<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;
use App\Http\Requests\StoreArchivoRequest;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $archivos = Archivo::where('nombre_archivo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $archivos = Archivo::paginate(5);
        }
        return view('Archivo.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Coordinador','Profesor']);
        return view('Archivo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArchivoRequest $request) 
    //Desde el momento en que se llega a esta funcion, se realiza la validacion de los datos en el request StoreArchivoRequest. Si logran pasar los campos se procede a ejecutar la funcion store.
    {
        if($request->hasfile('pdf')){
            $file = $request->file('pdf');
            $name = time().$file->getClientOriginalName(); //Almaceno en name la fecha de cuando se guardo el archivo concatenado con su nombre original
            $file->move(public_path().'/pautas/', $name);
        }
        Archivo::create([
            'nombre_archivo' => $request['nombre_archivo'],
            'informacion_adicional' => $request['informacion_adicional'],
            'pdf' => $name,
        ]);
        //return $request->all();
        //return redirect()->intended('Archivo');
        return redirect()->route('Archivo.index')-> with('status','Pauta subida de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archivo = Archivo::find($id); //Buscamos en el modelo Archivo la informacion relacionada a la ID que llega. Se almacena en $archivo y se retorna.
        return view('Archivo.show', compact('archivo')); //Cada vez que Laravel genera una vista espera un parametro (compact) el cual es utilizado para compartir informacion con nuestra vista.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $archivo = Archivo::find($id); //Buscamos en el modelo Archivo la informacion relacionada a la ID que llega. Se almacena en $archivo y se retorna.
        return view('Archivo.edit', compact('archivo')); //Cada vez que Laravel genera una vista espera un parametro (compact) el cual es utilizado para compartir informacion con nuestra vista.
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
        $archivo = Archivo::find($id);
        $archivo -> fill($request->except('pdf')); //debido a que el archivo debe almacenarse con un nombre distinto al que trae originalmente. Por lo que se trabajará con él de manera distinta.
        if($request->hasfile('pdf')){
            $file = $request->file('pdf');
            $name = time().$file->getClientOriginalName(); //Almaceno en name la fecha de cuando se guardo el archivo concatenado con su nombre original
            $archivo -> pdf = $name; //actualizo el nuevo nombre del archivo
            $file->move(public_path().'/pautas/', $name);
        }
        $archivo -> save();
        //return view('Archivo.show', compact('archivo')) -> with('status','Pauta actualizada correctamente');
        return redirect()->route('Archivo.show', [$archivo])-> with('status','Pauta actualizada correctamente');
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
        //$archivo = Archivo::find($id);
        //$archivo::destroy($id); 
        //$archivo->delete();
        //return 'eliminado';
        //return 'file_path';
        $archivo = Archivo::find($id);
        $file_path = public_path().'/pautas/'.$archivo->pdf; //Buscar el archivo subido en la carpeta path con el nombre contenido en "pdf"
        \File::delete($file_path); //Eliminar el archivo con el metodo File y la funcion delete 
        $archivo -> delete(); //Eliminar los otros campos del archivo
        //return redirect('Archivo');
        return redirect()->route('Archivo.index', [$archivo])-> with('status','Archivo eliminado correctamente');
    }

    public function download($id){
        $archivo = Archivo::find($id);
        $file_path = public_path().'/pautas/'.$archivo->pdf;
        return response()->download($file_path);
    }

    // protected function downloadFile($src){
    //     if (is_file($src)) {
    //         $finfo = finfo_open(FILEINFO_MIME_TYPE);
    //         $content_type = finfo_file($finfo, $src);
    //         finfo_close($finfo);
    //         $file_name = basename($src).PHP_EOL;
    //         $size = filesize($src);
    //         header("Content-Type: $content_type");
    //         header("Content-Disposition: attachment; filename = $file_name");
    //         header("Content-Transfer-Encoding: binary");
    //         header("Content-Length: $size");
    //         readfile($src);
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }

    // public function download(){
    //     $archivo = Archivo::find($id);
    //     if(!$this->downloadFile("/app/hola/archivoss.pdf")){
    //         return redirect("/home")->back();
    //     }
    //     //return response()->download("/app/hola","archivoss.pdf");
    // }
    //if(!$this->downloadFile(app_path()."/hola/archivoss.pdf")){
}
