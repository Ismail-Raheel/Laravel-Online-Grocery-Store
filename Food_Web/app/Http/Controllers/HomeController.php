<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {   
      
        $products = Product::get();
        $data = compact('products');
        return view('index')->with($data);
    }




    public function shop()
    { 

        $products = Product::paginate(10);
        
        return view('shop')->with('products', $products);

    }


    public function cart()
    {
        $products = Product::get();
      
        return view('cart')->with('products', $products);
    }



    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['Product_Qty']++;
        } else {
            $cart[$id] = [
                "Product_Id" => $product->Product_Id,
                "Product_Name" => $product->Product_Name,
                "Product_Qty" => 1,
                "Product_Price" => $product->Product_Price,
                "Product_Image" => $product->Product_Image,
                "Product_Des" => $product->Product_Des,
                "Discount_Price" => $product->Discount_Price,
                "Discount_Date" => $product->Discount_Date,
                "Product_code" => $product->Product_code
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["Product_Qty"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('update', 'Cart updated successfully');
        }
    }
  


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('remove', 'Product removed successfully');
        }
    }




    public function checkout()
    {
       
        $userId = session('User_Id');
        $user = User::find($userId);

        return view('checkout')->with('user', $user);
    }



    public function Click_checkout(Request $req)
    {

    $userId = session('User_Id');
    $cartItems = session('cart');
    date_default_timezone_set('Asia/Karachi');
    $formattedDate = now()->format('Y-m-d H:i:s');
    $totals = 0;
    $name_qty = $req->input('name_qty');
    $total_price = $req->input('total_price');
    if (!empty($cartItems)) {
    
       

        foreach($cartItems as $details)
        {  
            
            if ($details['Discount_Date'] < $formattedDate) {
                
                $totals = $details['Product_Price'];
            } else {
               
                $totals = $details['Discount_Price'];
            }


            // $Cart = new Cart;
            
            $cart = DB::table('carts')->insert([
            'Product_Id' => $details['Product_Id'],
            'Product_Name' => $details['Product_Name'],
            'Product_Price' => $totals,
            'Product_Qty' => $details['Product_Qty'],
            'Product_code' => $details['Product_code'],
            'User_Id' => $userId
           
            ]);
           
            if (!$cart) { 
                return redirect()->back()->with('error', 'Error occurred while processing your request.');
            }
        }

      
            $Users = session('User_Id');
            $Order = new Order;
            $Order->User_Name = $req['name'];
            $Order->User_Number = $req['number'];
            $Order->User_Email = $req['email'];
            $Order->Payment_Mothod = $req['method'];
            $Order->Flat = $req['flat'];
            $Order->Street = $req['street'];
            $Order->City = $req['city'];
            $Order->State = $req['state'];
            $Order->Country = $req['country'];
            $Order->Pin_code = $req['pin_code'];
            $Order->Total_products = $name_qty;
            $Order->Total_price = $total_price;
            $Order->User_Id = $Users;
            $Order->save();

            $orderId = $Order->User_Id;
            Session::put('Order_Id', $orderId);
            $req->session()->forget('cart');
            return redirect('Order_History')->with('orders', 'Your order has been placed');
     

        }
        else {
            return redirect()->back()->with('error', 'Cart is empty. Please add items to the cart first.');
        }


    }

    public function Users_Login(Request $req){
        $req->validate([
            'email' => 'required',
            'pass' => 'required',       
        ]);

        $User_Email = $req['email'];
        $User_Password = $req['pass'];
        $user = DB::table('users')->where('User_Email','=',$User_Email)->Where('User_Password',"=",$User_Password)->first();
        if ($user) {
            Session::put('User_Id', $user->User_Id);
            Session::put('User_Name', $user->User_Name);
            Session::put('User_Email', $user->User_Password);
            return redirect('index');
        } else {
            return redirect()->back()->with('invalid', 'Invalid email or password');
        }
       
    }

    public function Users_Logout(){
        Session::forget('User_Id');
        Session::forget('User_Name');
        Session::forget('User_Email');
        Session::forget('cart');
        Session::forget('Order_Id');
        return redirect('Users_Login');
    }

   
    public function blog()
    {
        return view('blog');
    }



    public function Order_History()
    {
        

    $userId = session('User_Id');
 
    $orders = Order::join('users', 'orders.User_Id', '=', 'users.User_Id')
    ->where('orders.User_Id', $userId)
    ->get(['orders.*', 'users.User_Name', 'users.User_Email']);

    return view('Order_History', ['orders' => $orders]);
    }
    

    public function contact()
    {
        return view('contact');
    }



    public function Users_Register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required', 
            'dob' => 'required',
            'password_confirmed' => 'required|same:password',
        ]);

        $existingUser = User::where('User_Email', $request['email'])->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['email' => 'User with this email already exists']);
        }

        $User = new User;
        $User->User_Name = $request['name'];
        $User->User_Email = $request['email'];
        $User->User_Password = $request['password'];
        $User->User_Gender = $request['gender'];
        $User->User_DOB = $request['dob'];
        $User->save();


        return view('Users_Login');
    }


}
