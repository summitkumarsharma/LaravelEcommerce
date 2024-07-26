<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart :: where('user_id',$userid)->count();
        }
        else{

            $count='';
        }
       
        return view('home.index',compact('product','count'));
    }
    public function login_home(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart :: where('user_id',$userid)->count();
        }
        else{

            $count='';
        }
        return view('home.index',compact('product','count'));
    }

    public function product_details($id){
        $data = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart :: where('user_id',$userid)->count();
        }
        else{

            $count='';
        }
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){
        
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id= $product_id;
        $data->save();
        toastr()->timeOut(10000)->closeButton(true)->success('Product Added to the Cart Successfully.');
        return redirect()->back();

    }
}