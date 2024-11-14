<!DOCTYPE html>
<html>
<head>
   @include('home.css')
   <style type="text/css">
       .div_center{
          display: flex;
          justify-content: center;
          align-items: center;
          padding : 30px;
       }
          .detail-box{
            padding:15px;
        }
       
   </style>
</head>
<body>
  
  <div class="hero_area">
    
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
   


  </div>
  <!-- end hero area -->

  


{{--  Product details Start  --}}


<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
           Product Details
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
              <div class="div_center">
                <img src="/products/{{$data->image}}" alt="" width="400">
              </div>
              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>Price : <span>${{$data->price}}</span></h6>
              </div>
              <div class="detail-box">
                <h6>Category : {{$data->category}}</h6>
                <h6>Avaiable Quantity : <span>{{$data->quantity}}</span></h6>
              </div>
              <div class="detail-box">
                 <p>{{$data->description}}</p>
              </div>
              <div class="detail-box">
                <a class="btn btn-primary" href="{{url('add_cart',$data->id)}}">Add to cart</a>
             </div>
          </div>
        </div>
      </div>
     
      {{--  <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>  --}}
    </div>
  </section>

{{--  Product Details End    --}}


 
   

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>