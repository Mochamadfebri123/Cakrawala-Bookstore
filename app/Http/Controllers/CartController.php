<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function keranjang()
    {
        $category = Category::all();
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c= Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
            $cart = Cart::where('user_id',$user_id)->get();
        }
        else
        {
            $count_c = " ";
        }
        return view('home.keranjang',compact('cart','count_c','count_b'));
    }

    public function tambah_keranjang($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->id_produk = $product_id;
        $data->save();
        return redirect()->back();
    }

    public function singleAddToCart(Request $request){
        $request->validate([
            'id_produk'  =>  'required',
            'quant'      =>  'required',
        ]);
        // dd($request->quant[1]);


        $product = Product::where('id', $request->id_produk)->first();
        

        if($product->jumlah < $request->quant[1]){
            return back()->with('error','Out of stock, You can add other products.');
        }
        if ( ($request->quant[1] < 1) || empty($product) ) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }    
        
        $user = Auth::user();
        $user_id = $user->id;
        $already_cart = Cart::where('user_id', $user_id)->where('product_id', $product->id)->first();

        // return $already_cart;

        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->harga = ($product->harga * $request->quant[1]) + $already_cart->harga ;
            $already_cart->amount = ($product->harga * $request->quant[1])+ $already_cart->amount;

            if ($already_cart->product->jumlah < $already_cart->quantity || $already_cart->product->jumlah <= 0) return back()->with('error','Stock not sufficient!.');

            $already_cart->save();
            
        }else{
            
            $cart = new Cart;
            $user = Auth::user();
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->harga-($product->harga*$product->diskon)/100);
            $cart->quantity = $request->quant[1];
            $cart->amount=($cart->price * $request->quant[1]);
            if ($cart->product->jumlah < $cart->quantity || $cart->product->jumlah <= 0) return back()->with('error','Stock not sufficient!.');
            // return $cart;
            $cart->save();
        }
        request()->session()->flash('success','Product has been added to cart.');
        return back();       
    } 
    public function update_cart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        $value = $request->input('value');

        if(Auth::check())
        {
            if(Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->exists());
            {
                $cart = Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $prod_qty;
                $cart->amount = $cart->price*$prod_qty;
                $totalharga = number_format($value,0,',','.');
                $cart->update();
                return response()->json([
                    'status' => " Quantity Updated ",
                    'gtprice' =>''.$totalharga.''
                ]);
            }
        }

    }
    public function hapus_keranjang(Request $request){
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success','Cart removed successfully');
            return back();  
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }     
}
