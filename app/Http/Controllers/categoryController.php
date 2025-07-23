<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{User,category,subscribedUser};
use Illuminate\Support\Facades\{Validator,File,DB,Mail};



class categoryController extends Controller
{
    public function add_category(Request $req){

    try {
        
        $all_category=$req->all();
        $category=$all_category['category'];
        $validator = Validator::make($all_category, [
        'category' => 'required|string|max:255|min:3',
        'category_image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

      if ($validator->fails()) {
        return response()->json([
            'validation_error' => true,
            'message' => $validator->errors()->first(),
        ]);
    }

    if ($req->hasFile('category_image')) {
        $originalName = $req->file('category_image')->getClientOriginalName();
        $file = $req->file('category_image');
        $newFileName = time() . '_' . $originalName.rand(10000,99999);
        $file->move(public_path('images'), $newFileName);
    }
        $data=[
        'category'=> $category,
        'category_image'=>  $newFileName
        ];
        $save=category::create($data);
        $subscribers = subscribedUser::all();
        foreach ($subscribers as $subscriber) {
        Mail::send('mail', ['subscriber' => $subscriber], function ($message) use ($subscriber) {
            $message->to($subscriber->email);
            $message->subject('🎉 New Category Added on Shopease!');
        });
    }
        return response()->json(['success'=>true,'message'=>'Category successfully added'],200);
        } catch (\Exception $e) {
            return response()->json(['error'=>true,'message'=>$e->getMessage()],203);
        }
    }

            public function get_categories()
            {
                try {
                    $categories = category::orderBy('id','desc')->get();
                    return view('admin_category',["data"=>$categories]);
                    } catch (\Exception $e) {
                        return response()->json([
                            'error' => true,    
                            'message' => $e->getMessage()
                        ]);
                    }
            }
  

           public function update_category(Request $req){

            try {
                $data=$req->all(); 
                $image=$req->file('category_image');

            DB::beginTransaction();
            if($req->hasFile( 'category_image')){
                $imageName=$image->getClientOriginalName(); 
                $fetch_data=category::where('id',$data['category_id'])->first();
                $fetch_image=$fetch_data->category_image;
                
                //extract image name and match the upcoming image
                preg_match('/\d{4}-\d{2}-\d{2}\.png/',  $fetch_image, $matches);
                if($imageName == $matches[0]){
                   $update_data=category::where('id',$data['category_id'])->update(['category'=> $data['category']]);
                   DB::commit();
                   return response()->json(['success'=>true,'message'=>'category update sucessfully'],200); 
                }
                $newFileName = time() . '_' . $imageName.rand(10000,99999);
                $image->move(public_path('images'), $newFileName);
                $update_data=category::where('id',$data['category_id'])->update(['category'=>$data['category'],'category_image'=>$newFileName]);
                DB::commit();
                return response()->json(['success'=>true,'message'=>'category successfully updated'],200);
            }
            
            $update_data=category::where('id',$data['category_id'])->update(['category'=> $data['category']]);
            DB::commit();
            return response()->json(['success'=>true,'message'=>'category update sucessfully'],200); 
        }    
            catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>true,'message'=>$e->getMessage()]);
        }
    }    
            


            public function delete_category($id){
                
            try {
                DB::beginTransaction();
                $delete=category::findOrFail($id)->toArray();
                $category_image=$delete['category_image'];
                $path = public_path(path: 'images/' . $category_image);
                if(File::exists($path)){
                     File::delete($path);
                     category::where('id',$id)->delete();
                     DB::commit();
                     return response()->json(['success'=>true,'message'=>'category successfully deleted'],200);
                }
                    category::where('id',$id)->delete();
                     DB::commit();
                    return response()->json(['success'=>true,'message'=>'category successfully deleted'],200);
                } catch (\Exception $e) {
                  return response()->json(['error'=>true,'message'=>$e->getMessage()],203);
                }
              
            }
            
}


