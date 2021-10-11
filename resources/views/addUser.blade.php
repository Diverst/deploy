@extends('template')
@section('content')
    <div class="content">

        <form action="/UserManagement/add" method="POST">
            @csrf
           Nama: <input type="text" name="name">
           Email: <input type="text" name="email">
           Password: <input type="password" name="password">
           <button type="submit">Submit</button>
        </form>
    </div>
@endsection