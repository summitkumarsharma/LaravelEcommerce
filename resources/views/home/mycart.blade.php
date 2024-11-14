<?php 
global $value;
$value=0;
?>
<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: blue;
        }

        td {
            border: 2px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 20px;
        }

        .order_deg {
            padding-right: 100px;
            margin-top: -50px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        .div_gap {
            padding: 20px;
        }

    </style>
</head>
<body>

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    {{-- @foreach ($cart as $cart)
    {{ $cart->user_id}}
    <h1> {{ $cart->product_id}} </h1>
    <h1> {{ $cart->product->title}}</h1>
    <h1> {{ $cart->user->name}}</h1>
    @endforeach --}}
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Order Details
                </h2>
            </div>

            <div class="div_deg">
                <table>
                    <tr>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Remove</th>
                    </tr>

                    @foreach ($cart as $cart)
                    <tr>
                        <td>{{$cart->product->title}}</td>
                        <td>{{$cart->product->price}}</td>
                        <td><img src="/products/{{$cart->product->image}}" width="150"></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
                        </td>
                    </tr>
                    <?php
                        $value=$value + $cart->product->price ;
                    ?>
                    @endforeach

                </table>
            </div>
            <div class="cart_value">
                <h3>The Total Value of Cart is = ${{$value}}</h3>
            </div>
            <div class="div_deg container-fluid">
                <div class="order_deg">
                    <form action="{{url('confirm_order')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">Receiver Name : </div>
                            <div class="col-lg-7"><input type="text" name="name" value="{{Auth::user()->name}}" class="form-control"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-5"><label>Receiver Address : </label></div>
                            <div class="col-lg-7"><textarea name="address" value="" class="form-control">{{Auth::user()->address}}</textarea></div>
                        </div>
                        {{--  <div class="div_gap">
                            
                            
                        </div>  --}}
                        <div class="row my-4">
                            <div class="col-lg-5"><label>Receiver Phone : </label></div>
                            <div class="col-lg-7"><input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control"></div>
                        </div>
                        
                        <div class="div_gap text-center">
                            <input type="submit" value="Cash On Delivery" class="btn btn-sm btn-primary">
                            <a class="btn btn-sm btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
                        </div>
                    </form>
                </div>

            </div>


            {{-- <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>  --}}

    </section>

    <!-- info section -->
    @include('home.footer')
    <!-- end info section -->


    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
