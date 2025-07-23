<?php

use App\Http\Middleware\{formValidate,VerifyAuthenticate};
use App\Models\category;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{user_controller,productController,categoryController,admin_product_controller,subscribedUsersController};
use Carbon\Carbon;


Route::get('/login', function () {
    return view('login');
})->name('login.page');


Route::get('/register', function () {
    return view('registar');
})->name('registar.page');

    // index view page 
    Route::get('/',[productController::class,'get_product'])->name('index.page');

    // products view page 
    Route::get('/products',[productController::class,'get_products'])->name('product.page');

    // cart view page
      Route::get('/cart', function () {
        return view('cart');
    })->name('cart.page');
    
    // category view page
    Route::get('/category',function(){
        return view('category');
    })->name('category.page');
    
    // product-detail view page 
    Route::get('/product-detail',function(){
        return view('product_detail');
    })->name('product.detail.page');


route::prefix('api')->group(function(){
Route::post('/registration',[user_controller::class,'signup'])->name('user.register');
Route::post('/authenticate',[user_controller::class,'authentication'])->name('user.authenticate')->Middleware(formValidate::class);
Route::get('/unsubscribed/{email}', [SubscribedUsersController::class, 'unsubscribe_user'])->name('unsubscribed.user');
});

Route::middleware(VerifyAuthenticate::class)->group(function () {

    // route to get logout
     Route::get('/logout/{name}',[user_controller::class,'logout'])->name('user.logout');

    Route::prefix('admin')->group(function(){

    //admin dashboard view page
     Route::get('/dashboard',function(){
       return view('dashboard');
    })->name('admin.dashboard');

    //admin category view page
     Route::get('/category',[categoryController::class,'get_categories'])->name('admin.category');
    

    // admin product view page
     Route::get('/product',[admin_product_controller::class,'get_products'])->name('admin.product.page');

    //  admin product add page
     Route::post('/addProduct',[admin_product_controller::class,'add_product'])->name('admin.add.product');

    //  admin product edit or update page
     Route::post('/updateProduct',[admin_product_controller::class,'update_product'])->name('admin.update.product');


    // admin product delete products route
     Route::get('/product/delete/{id}',[admin_product_controller::class,'delete_product'])->name('admin.delete.product');


    //route to add category in admin
    Route::post('/addCategory',[categoryController::class,'add_category'])->name('admin.add.category');

    //route to update category in admin
    Route::post('/updateCategory',[categoryController::class,'update_category'])->name('admin.update.category')->middleware(formValidate::class);

    // route to delete category in admin 
    Route::get('/delete/{id}',[categoryController::class,'delete_category'])->name('admin.delete.category');

     //admin users view page
     Route::get('/users',[user_controller::class,'get_users'])->name('admin.users');
     

     Route::post('/add_user',[user_controller::class,'add_users'])->name('admin.add.users');

     //  admin users delete route
    Route::get( '/delete_user/{id}',[user_controller::class,'delete_user'])->name('admin.user.delete');

    // add subsribed user route
    Route::post( '/add_sub_user',[subscribedUsersController::class,'add_subsribed_user'])->name('add.subsribed.user');
    
  });

});

// these are admin routes but not required authentication
Route::prefix('admin')->group(function(){

     // route to register view in admin
    Route::get('/register',function(){
        return view('admin-register');
    })->name('admin.register');

    // route to login view in admin
    Route::get('/login',function(){
        return view('admin_login');
    })->name('admin.login');
    
    // route for recover the forgot password
    Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

        // route for unauthenticate page for the user
    Route::get('/unauthenticate', function () {
    return view('unAthenticate');
})->name('unAthenticate.page');

});

  





