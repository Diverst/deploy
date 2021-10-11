@extends('template')
@section('content')
    <div class="content">
        <form action="/edit/{{ $data->id }}" method="POST">
            @csrf
           Nama: <input type="text" name="name" value="{{ $data->name }}">
           Email: <input type="text" name="email" value="{{ $data->email }}">
           Password: <input type="text" name="password" >
           
           <button type="submit">Submit</button>
        </form>
    </div>
@endsection