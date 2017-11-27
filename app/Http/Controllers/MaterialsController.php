<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Material;  //agregado
use App\Comentario; //agregado
use Storage;
use Auth;

class MaterialsController extends Controller
{
  /*
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }  //constructor para no dejar entrar sin autenticar al metodo materials
*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Material::All(); //equivalente a selec * from materials // agregado
        return view('materials.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.create');
    }


    protected function validar(request $request)
    {
        $this->validate($request, ['titulo' => 'required|min:3|unique:materials',
                                   'autor' => 'required|min:2|max:20|alpha',
                                   'descripcion' => 'required',
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request); //llamando clase para validar

        //cargando archivo al servidor
        $img = $request->file('portadaImg');
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgPortadas')->put($nombreImg, file_get_contents($img->getRealPath()));


        $datos = $request->all();
        // to do pendiente cargar archivos y fkUsuario
        $datos += ["portada" => $nombreImg];
        $datos += ["fkUsuario" => Auth::user()->id];
        //dd($datos);
        Material::create($datos);

        return redirect('materials/create');
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
        $res = Material::findOrFail($id);
        $resCom = Comentario::Where('fkMaterial', '=', $id)->Paginate(5); //paginate muestra 5 comentarios por pagina
        return view('materials.show')->with(['res' => $res, 'resCom' => $resCom]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res  = Material::findOrFail($id);
        return view('materials.edit', compact('res'));

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

        //$this->validar($request); //llamando clase para validar

        $datos = $request->all();
        $res = Material::findOrFail($id);

        if(isset($datos['portadaImg']))
        {
        $img = $request->file('portadaImg');
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgPortadas')->put($nombreImg, file_get_contents($img->getRealPath()));

            $datos['portada'] = $nombreImg;
        }
        else
        {
            $datos['portada'] =$res->portada;
        }

        $res->update($datos);

        return redirect('materials/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::destroy($id);
        return redirect('materials/');
    }
}
