<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get("JavaScript_CSS",function(){
    return view("JavaScript_CSS");
});





// Route::get("View_Product",function(){
//     return view("View_Product");
// });




Route::get('index',[HomeController::class,'index']);
Route::get('shop',[HomeController::class,'shop']);
Route::get('blog',[HomeController::class,'blog']);
Route::get('contact',[HomeController::class,'contact']);


Route::get('Cart', [HomeController::class, 'Cart'])->name('Cart');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [HomeController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [HomeController::class, 'remove'])->name('remove.from.cart');


Route::middleware(['guards'])->group(function(){
   //ye group middleware hai user login ho or cart bhi 3 ya isse zada ho tub checkout karsake
    Route::get('checkout',[HomeController::class,'checkout']);
});












Route::view("Users_Register",'/Users_Register')->middleware('Pehle_logout_Karo');
Route::view("Users_Login",'/Users_Login')->middleware('Pehle_logout_Karo');




Route::get("Order_History",[HomeController::class,'Order_History']);


Route::post('checkout',[HomeController::class,'Click_checkout']);
Route::post('/Users_Register', [HomeController::class, 'Users_Register']);
Route::get('/Users_Logout', [HomeController::class, 'Users_Logout']);
Route::post("Users_Login",[HomeController::class,'Users_Login']);






Route::post("Admin_SignIn",[AdminController::class,'Admin_SignIn']);
Route::post("Add_Categories",[AdminController::class,'Add_Categories']);
Route::get('/Admin_Sign_out', [AdminController::class, 'Admin_Sign_out']);
Route::get("update_Page/{id}",[AdminController::class,'update_Page']);
Route::put('/Update_Category/{id}',[AdminController::class,'Update_Category']);
Route::view("Admin_SignIn",'/Admin_SignIn')->middleware('you_must_logout_first');

Route::middleware(['you_must_login_first'])->group(function(){
    Route::view('Add_Categories','/Add_Categories');
    Route::get('Add_Product',[AdminController::class,'Product']);
    Route::get("View_Product",[AdminController::class,'View_Product']);
    Route::view('Dashboard','/Dashboard');
    Route::get("Orders",[AdminController::class,'Orders']);
    Route::get("Users",[AdminController::class,'Users']);
    
});





Route::post("Add_Product/{id?}",[AdminController::class,'Add_Product']);

Route::get('edit_product/{id}',[AdminController::class,'edit_product'])->name('edit_product');
Route::get("View_Categories",[AdminController::class,'View_Categories']);

Route::get("delete_Product/{id}",[AdminController::class,'delete_Product']);
Route::get("delete_Category/{id}",[AdminController::class,'delete_Category']);


// Route::get("layout/Web_layout",[HomeController::class,'Web_layout']);




Route::get('get-all-session',function(){
    $session = session()->all();
    echo "<pre>";
    print_r($session);
    echo "<pre>";
});






Route::get('destory-session',function(){
    session()->forget('cart');
    session()->forget('User_Name');
    session()->forget('User_Email');
    session()->forget('User_Id');
    session()->forget('Order_Id');
    
    return redirect('shop');

});


