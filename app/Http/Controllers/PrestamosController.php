<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Libro;
use Alert;
class PrestamosController extends Controller
{
    /*public function __construct()
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
        return view('prestamos.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     protected function validar(request $request)
    {
        $this->validate($request, ['fkUsuario' => 'required',
                                   'fkLibro' => 'required',
            ]);
    }
    public function store(Request $request)
    {
       
        $datos = $request->all();  
       if (Prestamo::create($datos)) {
         alert()->success('Por favor Pase a Recoger su libro', 'Prestamo de Libro Realizado Exitosamente')->persistent('Ok');
         return back();
          //  return back()->with('msj','Datos Guardados');
        }else{
            alert()->error('Error', 'OK');
            //return back()->with('errormsj','Los Datos no se Guardaron');
        } 
    
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
      //  $res = Libro::findOrFail($id);
       //return view('prestamos.show', compact('res'));    
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
        return view('prestamos.edit', compact('res'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        /*
        $datos = $request->all();   
        if (Prestamo::create($datos)) {
            return back()->with('msj','Datos Guardados');
        }else{
            return back()->with('errormsj','Los Datos no se Guardaron');
        }   */
       
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
