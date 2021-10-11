<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            background-image: url("assets/img/background_bni.png");
        }
        .logo{
            display: flex;
            flex-direction: row; 
            width: 100%; 
            justify-content: center; 
            padding-top: 5vh;    
        }
        .logo > img{
            width: 516px;
            height: 124px; 
            justify-content: center;
        }
        
        .container{
            width: 100%;
            align-items: center;
        }

        .cardview{
            margin: auto;
            margin-top: 10vh;
            /* width: 668px; */
            /* height: 412px; */
        }

        .card{
            border-radius: 30px;
            padding-top: 5vh;
            padding-bottom: 5vh;
            width: 600px;
            height: 362px;
            margin: auto
        }

        .form-group{
            margin-top: 5vh;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center
        }

        .form-control{
            width: 380px;
            height: 49px;
        }

        .btn{
            width: 159px;
            height: 53px;
            border-radius: 25px;
            background-color: #005E6A;
            margin: auto;
            margin-top: 7vh;
        }
        
        .icon{
            width: 46px;
            height: 46px;
            margin-right: 31px;
        }
    </style>

</head>
<body>
    <div class="logo">
        <img src="assets/img/logo_putih.png">
    </div>
    <div class="container">
        <div class="cardview">
            <div class="card">
                <form action="{{ route('login') }}" method="post">
                @csrf
                {{-- <div class="card-body"> --}}
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">
                            {{-- <strong>Email</strong> --}}
                            <img class="icon" src="assets/img/user_icon.png" alt="">
                        </label>
                        <input type="text" name="email" class="form-control" placeholder="Email" id="email" value="{{ old('email') }}">{{ old('email') }}
                    </div>
                    <div class="form-group">
                        <label for="password">
                            {{-- <strong>Email</strong> --}}
                            <img class="icon" src="assets/img/password_icon.png" alt="">
                        </label>
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                {{-- </div> --}}
                {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
                </div> --}}
                </form>
            </div>
        </div>
    </div>
</body>
</html>