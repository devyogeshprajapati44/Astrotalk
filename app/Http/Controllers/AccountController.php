<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
class AccountController extends Controller
{
    public function getAllUsers(Request $request)
    {

    $users = User::all(); // Fetch all users
    // return response()->json(['users' => $users], 200);
    return view('auth.accountuser', compact('users'));

    }

    public function edit(Request $request, $user_id)
    {
        $users = User::find($user_id);
        return response()->json([
            'status'=>200,
            'users' => $users,
        ]);
        // dd($users);
      return view('auth.accountuser.edit',compact('users'));
    
    }

//     public function update(Request $request)
//     {
        
//             //  echo "<pre>"; print_r($request->all()); 
//             //         die('');
//         $user_id = $request->input('user_id');
//         $user = User::find($user_id); 
//         $user->name = $request->input('name');
//         $user->mobile = $request->input('mobile');
//         $user->email = $request->input('email');
//         $user->dob = $request->input('dob');
//         $user->update();
//         //   echo "<pre>"; print_r($request->all()); 
//         //             die('');
//         return redirect()->back()->with('status','User Has Been Update successfully');
// }

public function update(Request $request)
{
    $user_id = $request->input('user_id');
    $user = User::find($user_id);
    
    // echo "<pre>"; print_r($request->all()); 
    // die('');
    
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }
    
    $user->name = $request->input('name');
    $user->mobile = $request->input('mobile');
    $user->email = $request->input('email');
    $user->dob = $request->input('dob');
    $user->update();  // Use save() instead of update()
     
    return redirect()->back()->with('status', 'User has been updated successfully');
}
public function destroy(Request $request)
{
    $user_id = $request->input('name');
    $user = User::find($user_id);

    if ($user) {
        $user->delete();
        return redirect()->back()->with('status', 'User has been deleted successfully');
    } else {
        return redirect()->back()->with('error', 'Employee not found');
    }
}
}
