<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\User;  //agregado
use Storage;
use Auth;
use Alert;

class UsersController extends Controller
{
    
      use RegistersUsers;

   /*  public function __construct()
    {
        $this->middleware('auth');
    }  //constructor para no dejar entrar sin autenticar al metodo usuarios   guest
*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $res = User::All()->Where('rol', '<>', 'Administrador'); //equivalente a selec * from materials // agregado
        return view('users.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     protected function validar(request $request)
    {
        $this->validate($request, ['email' => 'required',
                                   'password' => 'required',
                                   'nombre' => 'required',
                                   'apellido' => 'required',
            ]);
    }

    public function store(Request $request)
    {
         $this->validar($request); //llamando clase para validar

        //cargando archivo al servidor
        $img = $request->file('foto');
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('fotosLibro')->put($nombreImg, file_get_contents($img->getRealPath()));


        $datos = $request->all();
        // to do pendiente cargar archivos
       $datos += ["foto" => $nombreImg];
        //dd($datos);

        if (User::create($datos)) {
            return back()->with('msj','Datos Guardados');
        }else{
            return back()->with('errormsj','Los Datos no se Guardaron');
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
        //$res = User::findOrFail($id); // para buscar por id, el de abajo es para email
        $res = User::Where('email', '=', $id)->first();  //first para devolver un solo valor
        return view('users.show', compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$res = User::findOrFail($id); // para buscar por id, el de abajo es para email
        $res = User::Where('email', '=', $id)->first();  //first para devolver un solo valor
        return view('users.edit', compact('res'));
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
       $passwordSinEncriptar = $request->input('password');        
        $contraEncriptado=bcrypt($passwordSinEncriptar);

        $datos = $request->all();
        $datos['password']=$contraEncriptado;
        $res = User::findOrFail($id);

        $res->update($datos);
        alert()->success('Los Datos Fueron Modificados Exitosamente', 'OK');
        return redirect('users/');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        alert()->success('Los Datos Fueron Eliminados Exitosamente', 'OK');
        return redirect('users/');
    }

}
