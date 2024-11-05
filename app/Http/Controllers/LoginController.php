<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //

    public function index(){
    return view('auth.login');

    }
//this method will authenticate user

public function authenticate(Request $request){

    $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if($validator->passes()){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return  redirect()->route('account.dashboard');

        }else {
            return redirect()->route('account.login')->with('error','Either Email and passowrd is incorrect');

        }

    }else{

        return redirect()->route('account.login')->withInput()->withErrors($validator);
    }

}

public function logout(){

    Auth ::logout();
    return view('auth.login');      
        
}

//   //This method will show  new register     

//   public function register(Request $request){

//     return view('auth.register');
//   }

//   public function processRegister(Request $request){

//     $validator = Validator::make($request->all(),[
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if($validator->passes()){

//         // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

//         // }else {
//         //     return redirect()->route('account.login')->with('Either Email and passowrd is incorrect');
//         // }

//     }else{

//         return redirect()->route('account.register')->withInput()->withErrors($validator);
//     }
//   }
}
