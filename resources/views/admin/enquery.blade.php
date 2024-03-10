@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Enquery</h1>

        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12">
            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Messages</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($enquerys as $key => $enquery)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $enquery->name }}</td>
                                        <td>{{ $enquery->email }}</td>
                                        <td>{{ $enquery->phone}}</td>
                                        <td>{{ $enquery->message }}</td>
                                        <td id="status_id{{ $enquery->id }}">
                                            @if ($enquery->status == 1)
                                                <button data-id="{{ $enquery->id }}"
                                                    class="btn btn-danger status_unred">Unread</button>
                                            @else
                                                <button class="btn btn-success">Read</button>
                                            @endif


                                        </td>
                                        <td>
                                            <form action="{{route('enquery-destroy', $enquery->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                               <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End  Kitchen Sink -->
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".status_unred").click(function(){
                enqId = $(this).attr('data-id'); 
                
                $.ajax({
                    url: '{{route("enquery-status")}}',
                    type: 'POST',
                    data: {enqueryId: enqId,  "_token": "{{ csrf_token() }}"},
                    
                    success: function(resutl){
                        // console.log(resutl);
                        // alert(resutl);
                        $("#status_id"+enqId).html(resutl);
                        // window.location.reload();     // Autometic refresh n ho to
                        
                    },
                    error: function(er) {
                        alert(er);
                    }
                });
            });
        });
    </script>
@endsection
