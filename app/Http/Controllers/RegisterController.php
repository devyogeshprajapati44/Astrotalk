<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\MobileNumber; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //

    public function register(Request $request){

        return view('auth.register');
      }
    
      public function processRegister(Request $request){
    
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', new MobileNumber], 
            'dob' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        if($validator->passes()){

            $users = new User();
            $users->name = $request->name;
            $users->mobile = $request->mobile;
            $users->email = $request->email;
            $users->dob = $request->dob;
            $users->role = 'user';
            $users->password = Hash::make($request->password);
            $users->save();

            return redirect()->route('account.login')->with('success','You have Register successfully');
    
        }else{
    
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
      }

    
}
