<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class formValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $data = $request->all();
        $validations = [];

        $inputValues = [
            'name', 'email', 'password', 'product', 'category', 'category_image',
            'registratinNumber', 'post', 'type', 'links', 'remarks', 'productName',
            'productPrice','productCategory','productDescription','productFeatures'
        ];

        foreach ($data as $key => $value) {
            if (in_array($key, $inputValues)) {
                switch ($key) {
                    case 'name':
                        $validations[$key] = 'required|string|min:3|max:50';
                        break;
                    case 'category':
                        $validations[$key]  ='required|string|min:3|max:255';
                        break;  
                    case 'category_image': 
                        $validations[$key]='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
                        break;

                    case 'product_image': 
                        $validations[$key]='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
                        break;


                    case 'productFeatures': 
                    $validations[$key]='required|string|min:10|max:500';
                    break;

                    case 'productName': 
                    $validations[$key]='required|string|min:3|max:50';
                    break;  
                    
                    case 'productPrice': 
                    $validations[$key]='required|numeric';
                    break; 
                    
                    case 'productCategory': 
                    $validations[$key]='required|string|min:3|max:100';
                    break;  


                    case 'productDescription': 
                    $validations[$key]='required|string|min:10|max:500';
                    break;  

                    case 'email':
                        $validations[$key] = 'required|email|max:50|min:13';
                        break;
                    case 'password':
                        $validations[$key] = 'required|min:6';
                        break;
                    default:
                        $validations[$key] = 'nullable|string|max:255';
                }
            }
        }

                $validate = Validator::make($data,$validations); 
                if($validate->fails()){
                return response()->json(['validation_error'=>true,'message'=> $validate->errors()->first()],422);
                }

                return $next($request);

    }
}
