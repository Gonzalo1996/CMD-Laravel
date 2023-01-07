<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }
    
        /**
         * @param Request 
         * @return \Illuminate\Http\RedirectResponse
         */
        //public function connect(Request )
    
    public function __invoke()
    {
        return "Hola mi controlador";
    }
    
    public function getLogin(){
        return view('connect.login');
    }

    public function getRegister(){
        return view('connect.register');
    }
    
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $message = [
            'email.required' => 'El correo es requerido',
            'email.email' => 'El formato de correo es invalido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $message); 

        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');

        }
        else{

            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)){
                return redirect('/');
            }
            else{
                return back()->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
            }
        }
    }

    public function postRegister(Request $request){

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];

        $message = [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El formato de correo es invalido',
            'email.unique' => 'Ya existe un usuario registrado con este correo',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'cpassword.required' => 'Es necesario confirmar la contraseña',
            'cpassword.min' => 'La confirmación de la contraseña debe tener al menos 8 caracteres',
            'cpassword.same' => 'La contraseña no coincide'
        ];

        $validator = Validator::make($request->all(), $rules, $message); 

        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        }
        else{
            $user = new User();
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if($user->save()){
                return redirect('/login')->with('message', 'Su usuario se creó correctamente. Inicie sesión')->with('typealert', 'success');
            }
        }
        
        /*
        try{
            $request->validate($rules);

        }
        catch(Exception $e){


        }
        */
        /*
        echo "Las reglas ------>"; 
        $validator = Validator::make($request->all(), $rules); //No anda metodo all()

        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        }
        else{}
        */
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/login');
    }


}
