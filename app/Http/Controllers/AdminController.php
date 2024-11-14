<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // This function will show all Category in the View Category Page
    public function view_category()
    {
        $data =  Category::all();
        return view('admin.category',compact('data'));
    }
  
    // This fucntion will add Category in the DB
    public function add_category(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'category_name' => 'required',

        // ]);

        // if ($validator->passes()) {
            $category = new Category();
            $category->category_name = $request->category;
            $category->save();
            toastr()->timeOut(10000)->closeButton(true)->success('Category Added Successfully.');
            return redirect()->back();
        // }

        // else{
        //     return redirect()->back();
        // }
    }
    
    // This function will delete the Category from the DB
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton(true)->success('Category Deleted Successfully.');
        return redirect()->back();
    }

    // This function will show the Edit Category UI Page
    public function edit_category($id)
    {
       $data = Category::find($id);
       return view('admin.edit_category',compact('data'));
        //return view('admin.edit_category');
    }

    // This function will update the Category in the DB
    public function update_category(Request $request, $id)
    {
       $data = Category::find($id);
       $data->category_name = $request->category;
       $data->save();
       toastr()->timeOut(10000)->closeButton(true)->success('Category Updated Successfully.');
       return redirect('/view_category');
    }

    // This function will show add product UI Page
    public function add_product(){
        $category= Category::all();
        return view('admin.add_product',compact('category'));
    }

    // This function wiil add products and Upload Images in the DB
    public function upload_product(Request $request){

        $data = new Product();
        $data->title=$request->title;
        $data->description = $request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        $image = $request->image;

        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }


        $data->save();
        toastr()->timeOut(10000)->closeButton(true)->success('Product Added Successfully.');
        return redirect()->back();
    }

    // This function wiil show all Product in the View Product page
    public function view_product(){
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }

    // This function will Delete the Product from the DB
    public function delete_product($id){
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton(true)->success('Product Deleted Successfully.');
        return redirect()->back();
    }

    // This function will show update product page 
    public function update_product($slug){

        $data = Product::where('slug',$slug)->get()->first();
        $category = Category::all();
        return view('admin.update_page',compact('data','category'));
    }

    //This function will update the product in the database
    public function edit_product(Request $request, $id){
        $data = new Product();
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){     
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton(true)->success('Product Updated Successfully.');
        return redirect('/view_product');
        

    }

    // Thisfunction is used to search the product in the view product page
    public function product_search(Request $request){

        $search = $request->search;

        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('product'));
    
    }

    public function view_order(){
        $data = Order::all();
        return view("admin.order",compact('data'));
    }

    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        toastr()->timeOut(10000)->closeButton(true)->success('Order Status Updated Successfully.');
        return redirect('/view_order');
    }

    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        toastr()->timeOut(10000)->closeButton(true)->success('Order Status Updated Successfully.');
        return redirect('/view_order');
    }

    public function print_pdf($id){
        $data = Order :: find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
