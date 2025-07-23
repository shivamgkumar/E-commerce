<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class api_controller extends Controller
{
         public function store(Request $req){

        try {
            // issue in conncecting with the vuejs frontend solve this on monday
            $user_data=$req->all();
            $check_email=User::where('email',$user_data['email'])->first();
            if($check_email){
                return response()->json(['validation_error'=>true,'message'=>'user already exist try with different details'],422);
            }   
            $add_user=User::create($user_data);
            return response()->json(['success'=>true,'message'=>'user successfully registered'],200);
            } catch (\Exception $e) {
                return response()->json(['error'=>true,'message'=>$e->getMessage()],203);

            
        }
    } 
}

