<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConnectController extends Controller
{
    
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
    

    public function postRegister(Request $request){

        $rules = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ]);
        
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


}
