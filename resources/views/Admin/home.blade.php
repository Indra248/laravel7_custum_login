@extends('home')

@section('content')

    <div class="row">
        <div class="col-12">
            <script>
                $(function(){
                    $.ajax({
                        type: "POST",
                        url: "{{url('/Admin/satu')}}",
                        data: "data",
                        dataType: "html",
                        success: function (response) {
                            alert('bisa');
                        }
                    });
                });
            </script>
        </div>
    </div>

@endsection