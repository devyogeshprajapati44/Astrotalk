<?php
namespace App\Http\Controllers;


class ApiController extends Controller

{

    protected function successResponse(
       $data , $message='Success' , $status = 200

    ){
        
            return response()->json([
            'message'=>$message,
            'data'=>$data
            ],$status);
            }


}

?>