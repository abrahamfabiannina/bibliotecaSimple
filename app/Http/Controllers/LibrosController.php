<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;  //agregado
use App\Comentario; //agregado
use Storage;
use Auth;
use Alert;
class LibrosController extends Controller
{

/*
    public function __construct()
    {
        $this->middleware('auth');
    }  //constructor para no dejar entrar sin autenticar al metodo usuarios   //guest
*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {

        $res = Libro::All(); //equivalente a selec * from materials // agregado
       
        return view('libros.index', compact('res'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     protected function validar(request $request)
    {
        $this->validate($request, ['descripcion' => 'required',
                                   'cantidad' => 'required|numeric',
                                   'existencia' => 'required|numeric',
                                   'fotoImg' => 'required',
            ]);
    }
    public function store(Request $request)
    {
        $this->validar($request); //llamando clase para validar

        //cargando archivo al servidor
        $img = $request->file('fotoImg');
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('fotosLibro')->put($nombreImg, file_get_contents($img->getRealPath()));


        $datos = $request->all();
        // to do pendiente cargar archivos
       $datos += ["foto" => $nombreImg];

        //dd($datos);

        if (Libro::create($datos)) {
            
          alert()->success('Datos Guardados Exitosamente', 'OK');
           return back();
            //return back()->with('errors','Datos Guardados');
            //return back()->with('msj','Datos Guardados');

            
        }else{
            alert()->error('Los Datos no se Guardaron', 'Error');
        }
        //return redirect('libros/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //buscando un solo registro
        $res = Libro::findOrFail($id);
       return view('libros.show', compact('res'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $res  = Libro::findOrFail($id);
        return view('libros.edit', compact('res'));
        /* $res=Libro::find($id);
       return view('libros.edit')->with(['edit'=>true, 'res'=>$res]);*/
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
        $this->validar($request);

         $datos = $request->all();
        $res = Libro::findOrFail($id);

        if(isset($datos['fotoImg']))
        {
        $img = $request->file('fotoImg');
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('fotosLibro')->put($nombreImg, file_get_contents($img->getRealPath()));

            $datos['foto'] = $nombreImg;
        }
        else
        {
            $datos['foto'] =$res->portada;
        }



        //return redirect('libros/');
       if ( $res->update($datos)) {
         alert()->success('Los Datos Fueron Modificados Exitosamente', 'OK');
         return back();
        }else{
            alert()->success('Error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::destroy($id);
        alert()->success('Dato Eliminado Exitosamente', 'OK');
        //alert('<a href="#">Click me</a>')->html()->persistent("No, thanks");
        return redirect('libros/');
    }
}
