<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    public function index(){
        $data_a = Order::all()->count();
        $data_b = Product::all()->count();
        $data_c = Category::all()->count();
        $data_n = Order::where('status', 'new')->count();
        $data_p = Order::where('status', 'process')->count();
        $data_d = Order::where('status', 'delivered')->count();
        return view('admin.index',compact('data_n','data_a','data_b','data_c','data_p','data_d'));  
    }
    public function kategori()
    {
        $category = Category::orderBy('id','desc')->paginate(5);
         toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Dihapus');
        return view('admin.kategori',compact('category'));
    }

    public function edit_kategori($id)
    {
        $data = Category::find($id);
        return view('admin.edit_kategori',compact('data'));
        
    }

    public function update_kategori(Request $request,$id)
    {
        $data = Category::find($id);
        
        $data->nama_kategori= $request->nama_kategori;

        $gambar_baru = $request->image;

        if($gambar_baru)
        {
            $imagename = time().'.'.$gambar_baru->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->gambar = $imagename;

        }

        $data->save();

        return redirect('/kategori');
        
    }

    public function tambah_kategori()
    {
        $category = Category::all();
        toastr()->addSuccess('Kategori Berhasil Ditambah');
        return view('admin.tambah_kategori',compact('category'));
    }
    public function prosestambah_kategori(Request $request)
    {
        $category= new Category;

        $category->nama_kategori = $request->nama_kategori;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $category->gambar = $imagename;
        }
       
        $category->save();
        return redirect()->back();
        
    }

    public function tambah_produk()
    {
        $category = Category::all();
        return view('admin.tambah_produk',compact('category'));
    }

    public function hapus_kategori($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Dihapus');
        return redirect()->back();
    }
    public function prosestambah_produk(Request $request)
    {
        $data = new Product;

        $data->judul = $request->judul;
        $data->penulis = $request->penulis;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->kategori = $request->kategori;
        $data->diskon = $request->diskon;
        $data->jumlah = $request->jumlah;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->gambar = $imagename;
        }
        $data->save();
        return redirect()->back();
    }
    public function produk()
    {
        $product = Product::orderBy('id','desc')->paginate(4);
        return view('admin.produk',compact('product'));
    }
    public function edit_produk($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_produk',compact('data'),compact('category'));
        
    }
    public function update_produk(Request $request,$id)
    {
        $data = Product::find($id);
        $category = Category::all();

        $data->judul= $request->judul;
        $data->penulis= $request->penulis;
        $data->deskripsi= $request->deskripsi;
        $data->kategori= $request->kategori;
        $data->harga= $request->harga;
        $data->diskon= $request->diskon;
        $data->jumlah= $request->jumlah;

        $gambar_baru = $request->image;

        if($gambar_baru)
        {
            $imagename = time().'.'.$gambar_baru->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->gambar = $imagename;

        }

        $data->save();

        return redirect('/produk');
        
    }

    public function hapus_produk($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->gambar);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Dihapus');
        return redirect()->back();
    }

    public function cari_produk(Request $request)
    {
        $search = $request->search;
        $product = Product::where('judul','LIKE','%'.$search.'%')->
        orWhere('penulis','LIKE','%'.$search.'%')->
        orWhere('kategori','LIKE','%'.$search.'%')->
        paginate(3);
        return view('admin.produk',compact('product'));

    }
    
    public function order()
    {
        $order = Order::orderBy('id','desc')->distinct()->select('order_number','first_name','last_name','payment_method', 'payment_status','status','created_at')->paginate(3);
        return view('admin.order',compact('order'));
    }
    public function order_new()
    {
       
        $order = Order::where('status','new')->orderBy('id','desc')->distinct()->select('order_number','first_name','last_name','payment_method', 'payment_status','status','created_at')->paginate(3);
        return view('admin.order',compact('order'));
    }

    public function order_process()
    {
       
        $order = Order::where('status','process')->orderBy('id','desc')->distinct()->select('order_number','first_name','last_name','payment_method', 'payment_status','status','created_at')->paginate(3);
        return view('admin.order',compact('order'));
    }

    public function order_delivered()
    {

        $new = 'new';
        $order = Order::where('status','delivered')->orderBy('id','desc')->distinct()->select('order_number','first_name','last_name','payment_method', 'payment_status','status','created_at')->paginate(3);
        return view('admin.order',compact('order'));
    }

    public function lihat($id)
            {
                $order = Order::where('order_number',$id)->distinct()->select('order_number','first_name','email','phone','address','post_code','last_name','payment_method','payment_status','created_at','status')->get();
                $data = Order::where('order_number',$id)->get();
                return view('admin.detail',compact('order','data'));
            }

    public function edit_order($id)
            {
                $order = Order::where('order_number',$id)->first();
                return view('admin.edit_order',compact('order'));
            }

            public function update_order(Request $request, $id)
            {

                $order=Order::where('order_number',$id)->get();
                foreach ($order as $order){
                    $order->status = $request->status;
                    $order->save();
                }

              
                return redirect('order');
                // return $request->status;
            }
            
            public function hapus_order($id)
            {
                $order=Order::where('order_number',$id)->get();
                foreach ($order as $order){
                    $order->delete();
                }
                toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Dihapus');
                return redirect('order');
            }
    }


