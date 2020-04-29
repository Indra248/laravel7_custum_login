@extends('home')

@section('content')

    <div class="row">

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Cust Name</th>
                <th scope="col">Cust City</th>
                <th scope="col">Work Area</th>
                <th scope="col" style="">Option</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=($test== 3 ? 1 : $test);?>
             @foreach ($data as $item)
                 <tr>
                 <th>{{$no++}}</th>
                 <td>{{$item->CUST_NAME}}</td>
                 <td>{{$item->CUST_NAME}}</td>
                 <td>{{$item->WORKING_AREA}}</td>
                 <td><button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button> 
                </td>
                </tr>
             @endforeach
            </tbody>
          </table>
          
          {{$data->links()}}

        {{-- <div id="tampil"></div> --}}

        <div class="col-12">
            {{-- <script>
                $(function(){
                    $.ajax({
                        type: "GET",
                        url: "{{url('/Admin/satu')}}",
                        data: "data",
                        dataType: "html",
                        success: function (response) {
                            $('#tampil').html("bisa");
                        }
                    });
                });
            </script> --}}
        </div>
    </div>
@endsection