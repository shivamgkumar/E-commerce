<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\{product,category,subscribedUser};
use Illuminate\Support\Facades\{File,DB,Mail};

class admin_product_controller extends Controller
{

    // api for show  product on product page
     public function get_products(){

        $data= product::with('category')->orderBy('id','desc')->get();
        $all_data_category = category::all()->unique('category')->values();
        $shivam='csd';
        return  view('admin-product',compact('data',  'all_data_category','shivam'));
    }

     
    // api for add product
     public function add_product(StoreUserRequest $request){

    try {
        $data=$request->all();
        $file = $request->file('product_img');
        if($request->hasFile('product_img')){
            
            $fileName=time(). $file->getClientOriginalName().rand(100000,99999);
            $file->move(public_path('images'), $fileName);
        }
        $product_data=[
        'name'=>$data['name'],
        'price'=>$data['price'],
        'category_id'=>$data['category_id'],
        'description'=>$data['description'],
        'features'=>$data['features'],
        'product_img'=>$fileName
        ];

        $save=product::create($product_data);
        $subscribers = subscribedUser::all();
        foreach ($subscribers as $subscriber) {
        Mail::send('mail', ['subscriber' => $subscriber], function ($message) use ($subscriber) {
            $message->to($subscriber->email);
            $message->subject('🎉 New Product Added on Shopease!');
        });
    }
        return response()->json(['success'=>true,'message'=>'product successfully add'],200);   

        } catch (\Exception $e) {
          return response()->json(['error'=>true,'message'=>$e->getMessage()]);
        }
     
     }

        //   api for the product update
        // work done 23 june 5:00 pm nest start is 24 june 11 am
        public function update_product(StoreUserRequest $request) {
            
            try {
                DB::beginTransaction();
                $data=$request->all();
                $product_data=[
                'name'=>$data['name'],
                'price'=>$data['price'],
                'category_id'=>$data['category_id'],
                'description'=>$data['description'],
                'features'=>$data['features']
                ];
                
                // Add image
                $product_image=$request->file( 'product_img');
                $id=$data['product_id_for_update'];
                // fetch details from db to check image already exist or not
                $fetch_details=product::where('id', $id)->first();
                $fetch_image=$fetch_details->product_img;
                if($request->hasFile(('product_img'))){
                    $imageName=$product_image->getClientOriginalName(); 
                    if(str_contains($fetch_image,$imageName)){
                    product::where('id',$id)->update($product_data);
                    DB::commit();
                    return response()->json(['success'=>true,'message'=>'product successfully updated'],200);
                }   
                    // delete previous image and add new image           
                    $filePath = public_path('images/' . basename( $fetch_image));   
                    File::delete($filePath);
                    $newFileName=time(). $imageName.rand(100000,99999);
                    $product_data['product_img'] = $newFileName;
                    $product_image->move(public_path('images'), $newFileName);
                    product::where('id',$id)->update( $product_data);
                    DB::commit();
                    return response()->json(['success'=>true,'message'=>'product successfully updated'],200);
                 
                }
                   
                    product::where('id',$id)->update($product_data);
                    DB::commit();
                    return response()->json(['success'=>true,'message'=>'product successfully updated'],200);

                    } catch (\Exception $e) {
                    return response()->json(['error'=>true,'message'=>$e->getMessage()]);
                }
        }


                // api for delete product
                public function delete_product($id){

                    try {
                        DB::beginTransaction();
                        $product = Product::findOrFail($id);

                    // check and delete image if have
                        if (!empty($product->product_img)) {
                            $filePath = public_path('images/' . basename($product->product_img));

                            if (File::exists($filePath)) {
                                File::delete($filePath);
                            }
                        }
                        
                        // Delete the DB record
                        $product->delete();
                        DB::commit();

                        return response()->json([
                            'success' => true,
                            'message' => 'Product successfully deleted.'
                        ], 200);

                    } catch (\Exception $e) {
                        DB::rollBack();

                        return response()->json([
                            'error' => true,
                            'message' => 'Failed to delete product.',
                            'details' => $e->getMessage()
                        ], 500);
                    }
                }

}
