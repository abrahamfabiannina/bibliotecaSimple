<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;
use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
 /*public function __construct()
    {
        $this->middleware('auth');
    }  //constructor para no dejar entrar sin autenticar al metodo usuarios   //guest
*/
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'apellido' => 'required',
            'foto' => 'required',
            'rol' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        //Generando la cuenta con las iniciales de nombre y apellido mas un numero randomico
        //sacamos las iniciales de nombre   
        $nombreCompleto=$data['nombre']." ".$data['apellido'];      
            $palabras=explode(" ",$nombreCompleto);
            $cadena="";
            foreach ($palabras as $unaPalabra) {
                $cadena=$cadena.$unaPalabra[0]; 
            }   

        $numrandom=rand(100,999);
        $iniMinusculas=strtolower($cadena);
        $cuenta=$iniMinusculas.$numrandom;



        //cargando archivo al servidor
        $img = $data['foto'];
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgFotos')->put($nombreImg, file_get_contents($img->getRealPath()));
        return User::create([

            'email' => $data['email'],
            'cuenta' => $cuenta,
            'password' => bcrypt($cuenta),
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],

            //to do: cargar la foto al servidor
            'foto' => $nombreImg,
            'rol' =>  $data['rol'],
           // 'remember_token' => Str::random(60),
        ]);
        //$token = Str::random(60);

        
    }
}
