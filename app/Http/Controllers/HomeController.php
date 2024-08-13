<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Bookmark;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product = Product::orderBy('id','desc')->paginate(8);
        $category = Category::all();
        return view('index',compact('product','category'));
    }

    public function cari_produk(Request $request)
    {
        $category = Category::all();
        $Product = Product::all();
        $search = $request->search;
        $product = Product::where('judul','LIKE','%'.$search.'%')->
        orWhere('penulis','LIKE','%'.$search.'%')->
        orWhere('kategori','LIKE','%'.$search.'%');
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c= Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
        }
        else
        {
            $count_c = " ";
            $count_b = " ";
        }
        return view('index', compact('count_c','count_b','product','category'));

    }

    public function dashboard()
    {
        $product = Product::all();
        $category = Category::all();
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c= Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
        }
        else
        {
            $count_c = " ";
        }
        return view('home.dashboard',compact('product','category','count_c','count_b'));
    }

    
    public function deskripsi($id)
    {
        $data = Product::find($id);
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c = Cart::where('user_id',$user_id)->count();
            $count_b = Bookmark::where('user_id',$user_id)->count();
        }
        else
        {
            $count_c = " ";
            $count_b = " ";
        }
        return view('home.deskripsi',compact('data','count_c','count_b'));
    }

    public function checkout()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $count_c = Cart::where('user_id',$user_id)->count();
            $checkout = Cart::where('user_id',$user_id)->get();
            $harga = Cart::where('user_id',$user_id)->sum('amount');
            $count_b = Bookmark::where('user_id',$user_id)->count();
        }
        return view('home.checkout',compact('checkout','count_c','count_b','harga'));
    }

}
