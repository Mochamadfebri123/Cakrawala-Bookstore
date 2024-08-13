<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark($id){

        $data = new Bookmark;
        $user = Auth::user();
        $data->user_id = $user->id;
        $data->product_id = $id;
        $data->save();
        return redirect()->back();
        
    }

    public function lihat_bookmark()
    {
        $data = Bookmark::all();
        $user = Auth::user();
        $user_id = $user->id;
        $count_c = Cart::where('user_id',$user_id)->count();
        $count_b = Bookmark::where('user_id',$user_id)->count();
        return view ('home.bookmark' , compact('data','count_c','count_b'));
    }

    public function hapus_bookmark(Request $request){
        $bookmark = Bookmark::find($request->id);
        if ($bookmark) {
            $bookmark->delete();
            request()->session()->flash('success','Cart removed successfully');
            return back();  
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }   
}
