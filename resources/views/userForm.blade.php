@extends('template')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5" >
              
              @php
                  if (isset($user->id) && $user->id != 0)
                  {
                    $link = url('/UserManagement/update').'/'.$user->id;
                    $title = 'Edit User';
                    $button = 'Edit';
                  }else{
                    $link = url('/UserManagement/add');
                    $title = 'Add New User';
                    $button = 'Add';
                  }
              @endphp
              <div class="header">
                <h4 class="title">{{ $title
                 }}</h4>
              </div>
              <div class="content">
                <form action="{{$link}}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control border-input" name="name" value="{{$user->name ?? ''}}" placeholder="Full Name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control border-input" name="email" value="{{$user->email ?? ''}}" placeholder="Email address" required>
                      </div>
                    </div>
                  </div>
                  @if(!isset($user) && empty($user->password))
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control border-input" placeholder="Choose new password" name="password">
                      </div>
                    </div>
                  </div>
                  @endif

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-select border-input" name="role">
                            <option value="user" <?php
                                if(isset($user) && $user->role == 'user')
                                {
                                    echo 'selected';
                                } ?>
                                >User</option>
                            <option value="admin" <?php if(isset($user) && $user->role == 'admin'){ echo 'selected'; } ?>>Admin</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd" style="float: right;">{{ $button }}</button>
                  </div>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

