<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <center>
       <h3> Customer Name : {{$data->name}} </h3>
       <h3> Customer Address : {{$data->rec_address}} </h3>
       <h3> Customer Phone : {{$data->phone}} </h3>
       <h2> Product Title : {{$data->product->title}}</h2>
       <h2> Product Price : {{$data->product->price}}</h2>
       <img src="products/{{$data->product->image}}" width="300px" height="250px">
    </center>
    
</body>
</html>