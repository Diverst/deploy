@extends('template')

@section('content')

<div class="content">

    
      <form action="/UserProfile/{{ $data->id }}" method="POST">
          @csrf
        <div class="col-md-6">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control border-input" name="name" id="input1" value="{{$data->name }}" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control border-input" name="email" id="input2" value="{{$data->email }}"  >
            </div>
          </div>
          
          <div class="col-md-6">
              <div class="form-group">
                 <button class="btn btn-primary">Save Changes</button>
              </div>
            </div>
      </form>

      
   


    
    
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