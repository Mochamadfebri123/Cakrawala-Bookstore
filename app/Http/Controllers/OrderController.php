<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Bookmark;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c = Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
            $checkout = Cart::where('user_id',$user_id)->get();
            $harga = Cart::where('user_id',$user_id)->sum('amount');
            $qty = Cart::where('user_id',$user_id)->sum('quantity');
           
        }
        return view('home.checkout',compact('checkout','count_c','count_b','harga'));
    }

    public function order(Request $request){
        if(empty(Cart::where('user_id',auth()->user()->id)->first())){
            request()->session()->flash('error','Cart is Empty !');
            return back();
        }

        $userid = Auth::user()->id;
        $address = $request->address;
        $phone = $request->phone;
        $last = $request->last_name;
        $first = $request->first_name;
        $email = $request->email;
        $post_code = $request->post_code;
        $order_number = $request->order_number;
        $cart = Cart::where('user_id',$userid)->get(); 
       
        foreach($cart as $carts){
            $order = new Order;
            $order->user_id = $userid; 
            $order->first_name = $first;
            $order->last_name = $last;
            $order->email = $email;
            $order->phone = $phone;
            $order->address = $address;
            $order->post_code = $post_code;
            $order->product_id = $carts->product_id;
            $order->quantity = $carts->quantity;
            $order->total_amount = $carts->amount;
            $order->order_number = $order_number;
            
            if (request('payment_method') == 'cardpay') {
                $order['payment_method'] = 'cardpay';
                $order['payment_status'] = 'paid';
            } else {
                $order['payment_method'] = 'cod';
                $order['payment_status'] = 'Unpaid';
            }

            $cart_remove = Cart::where('user_id',$userid)->get();

            foreach($cart_remove as $remove){
                $data = Cart::find($remove->id);
                $data->delete();
            }
            $status=$order->save();
            }

            $count_c= Cart::where('user_id',$userid)->count();
            $count_b = Bookmark::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        return view('home.keranjang',compact('cart','count_c','count_b'));
    }

    public function orderuser()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $order = Order::where('user_id',$user_id)->distinct()->select('order_number','first_name','last_name','payment_method','payment_status','created_at','status')->orderBy('id', 'desc')->get();
            $count_c = Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
           
        }
        return view('home.order',compact('order','count_c','count_b'));
    }

    public function detail($id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $order = Order::where('order_number',$id)->where('user_id',$user_id)->distinct()->select('order_number','first_name','email','phone','address','post_code','last_name','payment_method','payment_status','created_at','status')->get();
            $data = Order::where('order_number',$id)->get();
            $product = Product::all();
            $count_c = Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
           
        }
        if($order){
            return view('home.orderdetail', compact('order','data','count_c','count_b'));
        }else{
            return redirect()->back()->with('message','Pesanan Tidak Ditemukan');
        }

        
    }
}

