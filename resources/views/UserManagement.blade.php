@extends('template')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>   
@endsection
@section('content')
    
<div class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12">
                <a class="btn btn-success" style="float: right;" href="{{url('/UserManagement/add')}}"> Add New</a>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Verification Status</th>
                          <th>Registration Date</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @isset($users)
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td><span class="badge badge-pill badge-info text-capitalize">{{$user->role}}</span></td>
                      @if($user->email_verified_at != null)
                      <td><span class="badge badge-pill badge-success">Verified</span></td>
                      @else
                      <td><span class="badge badge-pill badge-danger">Unverified</span></td>
                      @endif
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td><a href="{{url('/UserManagement').'/'.$user->id}}"><span class="badge badge-pill badge-warning mr-3"><i class="fa fa-pencil"></i></span></a><a href="{{route('user.delete', ['id' => $user->id])}}"><span class="badge badge-pill badge-danger mr-3"> <i class="fa fa-trash"></i></span></a></td>
                  </tr>
                    @endforeach
                     
                      @endisset
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>  
$(document).ready(function() {
      $('#example').DataTable();
    });
  </script>   
@endsection