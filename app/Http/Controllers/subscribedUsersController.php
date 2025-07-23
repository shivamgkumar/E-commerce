<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator,DB,Mail};
use App\Models\subscribedUser;
// use Mail;
class subscribedUsersController extends Controller
{
    // to add the subscribers
            public function add_subsribed_user(Request $req)
            {
                try {
                    // Step 1: Validate input
                    
                    $validator = Validator::make($req->all(), [
                        'email' => 'required|string|email|max:100|min:13|email',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Enter a valid email for subscription',
                            'errors' => $validator->errors(),
                        ], 422);
                    }

                    $email = $req->input('email');

                    // Step 2: Check if already subscribed
                    $check_email = subscribedUser::where('email', $email)->first();
                    if ($check_email) {
                        return response()->json([
                            'error' => true,
                            'message' => 'You have already subscribed',
                        ], 409); // 409 Conflict is more appropriate
                    }

                    // Step 3: Save to DB inside transaction
                    DB::beginTransaction();
                    subscribedUser::create(['email' => $email]);
                    Mail::send('mail', ['email'=>$email], function($message) use ( $email) {
                            $message->to($email);
                            $message->subject('Welcome to Shopease');
                            });
                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Successfully subscribed',
                    ], 200);
                } catch (\Exception $e) {
                    DB::rollBack(); // Important: rollback if there's an error
                    return response()->json([
                        'error' => true,
                        'message' => $e->getMessage(),
                    ], 500); // 500 = Server Error
                }
            }

                // To remove the subscribers
                public function unsubscribe_user(Request $req)
            {
                try {
                    $email=$_GET['email'];
                    $delete=subscribedUser::where('email',$email)->delete();
                    
                } catch (\Exception $e) {
                    return response()->json([
                        'error' => true,
                        'message' => $e->getMessage(),
                    ], 500); // 500 = Server Error
                }
            }

}