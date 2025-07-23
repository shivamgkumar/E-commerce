<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,DB,Session,Http};
use App\Http\Requests\{userValidaterequest,validateRegistrationInAdmin};


class user_controller extends Controller
{
        public function get_users()
            {
                try {
                    $users = User::orderBy('id','desc')->get();
                    return view( 'admin_users',data: ["data"=>$users]);
                    } catch (\Exception $e) {
                        return response()->json([
                            'error' => true,
                            'message' => $e->getMessage()
                        ]);
                    }
            }
            
        public function signup(validateRegistrationInAdmin $req){

        try {
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


        
        public function add_users(Request $req){

        try {
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


        public function authentication(Request $req){

        try {
            DB::beginTransaction();
            $data=[
                'email'=>$req['email'],
                'password'=>$req['password']
            ];

           $user = User::where('email', $data['email'])->first();
            if($user && Auth::attempt($data)){
                $user->status='active';
                $user->save();
                DB::commit();
                return response()->json(['success'=>true,'message'=>'Login success welcome '. $user->role.'!'],200);
            }
            DB::rollBack();
            return response()->json(['error'=>true,'message'=>'Credentials does not match try with correct credentials'],422);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>true,'message'=>$e->getMessage()],203);
        }

    }
        public function logout($name)
        {

            if($name=="admin"){
                $user=Auth::user()->id;
                User::where('id',$user)->update(['status'=>null]);
                Auth::logout();
                Session::flash('flash_message','you have successfully logged out');
                return redirect()->route('admin.login');

            }
                $user=Auth::user()->id;
                User::where('id',$user)->update(['status'=>null]);
                Auth::logout();
                Session::flash('flash_message', 'You have successfully logged out.');
                return redirect()->route('login.page');   
        }



        public function delete_user($id){
                
            try {
                $delete=User::where('id',$id)->delete();
                return response()->json(['success'=>true,'message'=>'user successfully deleted'],200);
                } catch (\Exception $e) {
                  return response()->json(['error'=>true,'message'=>$e->getMessage()],203);
                }
              
            }

    
}
