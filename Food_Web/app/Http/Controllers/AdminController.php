<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Metadata\Uses;

class AdminController extends Controller
{




    public function Add_Categories(Request $req){
        $req->validate(['Category_Name' => 'required']);
       

        $categories = DB::table('categories')->insert(['Category_Name'  => $req->Category_Name]);
        if($categories){
            return Redirect('View_Categories');
        }  
    }

    public function View_Categories(){
        $user = DB::table('categories')->get();
        return view('View_Categories',['data' => $user]);
    }


    public function delete_Category(string $id){
        $products = DB::table('categories')->where('Category_ID', $id)->delete();
        if($products){
        return Redirect('View_Categories');
        } 
    }



    public function update_Page(string $id){
        $Update_Category = DB::table('categories')->where('Category_ID', $id)->first();
        return view('Update_Category',['data' => $Update_Category]);
    }


    public function Update_Category(Request $req,$id){
        $categories = DB::table('categories')->where('Category_ID',$id)->update([
            'Category_Name'  => $req->Category_Name,
        ]);
        if($categories){
            return Redirect('View_Categories');
        }
        else{
            return Redirect('View_Categories');
        }
       
    }





    public function Product(){
        // $product = new Product();
        $categories = DB::table('categories')->get();
        $product = DB::table('products'); //  isko get nahi sirf define karna hai
        $title = "Add Product";
        $url = url('Add_Product');
        $data = compact('url','title','product','categories');
        return view('Add_Product')->with($data);   
    }


    public function Add_Product(Request $req, $productId = null)
    {
    
    // Check if a new image is provided
        if ($req->hasFile('image')) {
            $filename = time() . "-Grocery." . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('public/images', $filename);
            $user = [
                'Product_Image' => $filename,
            ];
        } elseif ($productId) {
            // If no new image is provided, but it's an update, keep the existing image
            $user = [
                'Product_Image' => $req['image-old'] ?? null,
            ];
        }
        else{
            $user = [
                'Product_Image' => $req->Product_Image ?? null,
            ];
        }

        // Other fields
        $user += [
            'Product_Name' => $req->Product_Name,
            'Product_Price' => $req->Product_Price,
            'Product_Qty' => $req->Product_Qty,
            'Product_Des' => $req->Product_Des,
            'Discount_Price' => $req->Discount_Price,
            'Discount_Date' => $req->Discount_Date,
            'Product_code' => $req->Product_code,
            'Category_Id' => $req->Category_Id,
        ];

        // Check if it's an update
        if ($productId) {
            // Update existing product
            DB::table('products')->where('Product_Id', $productId)->update($user);
            return redirect('View_Product');
        } else {
        
            $req->validate([
                'Product_Name' => 'required',
                'Product_Price' => 'required',
                'Product_Qty' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048', 
                'Product_Des' => 'required',
                'Product_code' => 'required',
                'Category_Id' => 'required',
            ]);
            
            $userInserted = DB::table('products')->insert($user);
            if ($userInserted) {
                return redirect('View_Product');
            }
        }
    }


    public function edit_product($id)
    {
    $categories = DB::table('categories')->get();
    $product = DB::table('products')->where('Product_Id', $id)->first();  

    $title = "Update Product";
    $url = url('Add_Product')."/". $id;
    $data = compact('categories','url','title','product');
    return view('Add_Product')->with($data);
    }






    public function Admin_SignIn(Request $req){
        $req->validate([
            'Admin_Email' => 'required',
            'Admin_Password' => 'required',       
        ]);

        $Admin_Email = $req['Admin_Email'];
        $Admin_Password = $req['Admin_Password'];
        $admin = DB::table('admins')->where('Admin_Email','=',$Admin_Email)->Where('Admin_Password',"=",$Admin_Password)->first();
        if ($admin) {
            Session::put('Admin_Id', $admin->Admin_Id);
            Session::put('Admin_Name', $admin->Admin_Name);
            Session::put('Admin_Email', $admin->Admin_Email);
            return redirect('Dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
       
    }

    public function Admin_Sign_out(){
        Session::forget('Admin_Id');
        Session::forget('Admin_Name');
        Session::forget('Admin_Email');
        return redirect('Admin_SignIn');
    }


    public function View_Product(){
        $View_Product = DB::table('products')
        ->join('categories','products.Category_Id','=','categories.Category_ID')
        ->select('products.*','categories.Category_Name')->paginate(10);
        return view('View_Product',['data' => $View_Product]);
    }


    public function delete_Product(string $id){
        $products = DB::table('products')->where('Product_Id', $id)->delete();
        if($products){
        return Redirect('View_Product');
        } 
    }


   
    public function Orders()
    {
        $orders = Order::join('users', 'orders.User_Id', '=', 'users.User_Id')->paginate(10);
        return view('View_Order', ['orders' => $orders]);
    }





    public function Users()
    { 

        $users = User::paginate(10);
        
        return view('View_Users')->with('users', $users);

    }






    




    



   


   



}
