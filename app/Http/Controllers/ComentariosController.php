<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;  //agregado
class ComentariosController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }  //constructor para no dejar entrar sin autenticar al metodo comentarios


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Comentario::All(); //equivalente a selec * from materials // agregado
        return view('comentarios.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comentarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos += ['fecha' => date('Y-m-d H:i:s')];
        //to do pendiente de sacar el fkMaterial
        //$datos += ['fkMaterial' => 1]; 


        Comentario::create($datos);

        return redirect('/materials/'.$datos['fkMaterial']); //tomamos el fkMaterial del imput
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
        $res = Comentario::findOrFail($id);
        return view('comentarios.show', compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comentarios.edit');
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
        $datos = $request->all();
        $res = Comentario::findOrFail($id);
        $res->update($datos);

        return redirect('comentarios/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $fkMaterial = $request->input('fkMaterial');

        Comentario::destroy($id);
        return redirect('/materials/'.$fkMaterial);
    }
}
