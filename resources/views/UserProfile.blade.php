@extends('template')

@section('content')

<div class="content">

    
      
        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control border-input" name="name" id="input1" value="{{$data->name }}" disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control border-input" name="email" id="input2" value="{{$data->email }}"  disabled>
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <a href="/UserProfile/{{ $data->id }}" class="btn btn-primary">Edit</a> 
            </div>
          </div>

      
   


    
    
</div>
    
@endsection

@section('js')
<script>
    function myFunction(el1,el2) {
    document.getElementById(el1).disabled = false;
    document.getElementById(el2).disabled = false;
  }
</script>
@endsection