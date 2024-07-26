<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
     .div_deg{
        display: flex;
        justify-content: center;
        align-self: center;
     }

     label{
        display: inline-block;
        width:200px;
        padding: 20px;
     }

     input[type="text"]{
        width:300px;
        height:60px;
     }
     textarea{
        width:450px;
        height:100px;
     }
    </style>
  </head>
  <body>
      @include('admin.header')
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <h2>Update Product</h2>
           <div class="div_deg">
            <form action="{{url('edit_product',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Product Title</label>
                    <input type="text" name="title" value={{$data->title}}>
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="text" name="price" value={{$data->price}}>
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" name="quantity" value={{$data->quantity}}>
                </div>
                <div>
                    <label>Category</label>
                    <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        @foreach($category as $category)
                        <option>{{ $category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Current Image</label>
                    <img src="/products/{{$data->image}}" width="150px">
                </div>
                <div>
                    <label>New Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" value="Update Product" class="btn btn-sm btn-success">
                </div>
            </form>
           </div>
          </div>
      </div>
    </div>
    @include('admin.js')
    @include('admin.footer')
  </body>
</html>