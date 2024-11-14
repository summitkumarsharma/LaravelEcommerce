<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        table {
            border: 2px solid skyblue;
            text-align: center;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18x;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }

        .table-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="text-align: left;" class="my-4"> All Orders </h1>
                <div class="table-center">
                    <table>
                        <tr>
                            <th>Custormer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Update Status</th>
                            <th>Print PDF</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->rec_address}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>{{$data->product->price}}</td>
                            <td><img src="products/{{$data->product->image}}" width="150px" height="150px"></td>
                            <td>{{$data->payment_status}}</td>
                            <td>
                                @if($data->status =='In Progress')
                                <span style="color:red">{{$data->status}}</span>
                                @elseif($data->status =='On the way')
                                <span style="color:skyblue;">{{$data->status}}</span>
                                @else
                                <span style="color: yellow;">{{$data->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the Way</a>
                                <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delievred</a>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
    @include('admin.footer')
</body>
</html>
