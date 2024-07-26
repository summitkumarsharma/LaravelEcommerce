<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type='text/css'>
        input[type="text"] {
            width: 420px;
            height: 45px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-content: center;
        }

        .table_deg{
          text-align: center;
          margin: auto;
          border: 2px solid yellowgreen;
          margin-top: 50px;
          width:600px;
        }

        th{
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }
        td{
          color: white;
          padding: 10px;
          border: 1px solid skyblue;
        }

    </style>

</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color:white;">Add Category</h1>
                <div class="div_deg">
                    <form action="{{ url('add_category')}}" method="POST">
                        @csrf
                        <input type="text" value="" name="category"/>
                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>
                <div>
                  <table class="table_deg">
                    <tr>
                      <th>Category Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                      @foreach($data as $data)
                        <tr>
                          <td>{{$data->category_name}}</td>
                          <td>
                            <a href="{{url('edit_category',$data->id)}}" class="btn btn-success">Edit</a>
                          </td>
                          <td>
                            <a href="{{url('delete_category',$data->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
    
     @include('admin.footer')
    
     <!-- JavaScript files-->

    <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedrect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedrect);
        swal(
          {
            title: "Are You sure to Delete This",
            Text : "This Delete wil be permanent",
            icon:"warning",
            buttons:true,
            dangerMode:true,

          })

          .then((willCancel)=>{
            if(willCancel){
              window.location.href=urlToRedrect;
            }
          });
      }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.js')
</body>
</html>
