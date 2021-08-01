{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

    <h2>Register</h2><br>
    @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
    @endif
    @if (session()->has("errorrr"))
        <ul>
            <li>Username Sudah Digunakan</li>
        </ul>
    @endif
    <form action="/register" method="post">
        @csrf
        Username : <input type="text" name="username" id=""><br>
        Password : <input type="password" name="pass" id=""><br>
        Confirmation Password : <input type="password" name="conpass" id=""><br>
        <a href="/"><button type="button" name="btntologin">To Login</button></a>
        <a href=""><button type="submit" name="btnRegister">Register</button></a> 
    </form>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
{{-- </head>
<body>
    <h2>Login</h2>
    @if(session()->has("errorrr"))
        <ul>
            <li>{{session()->get("errorrr")}}</li>
        </ul>
    @endif
    <form action="/" method="post">
        @csrf
        Username : <input type="text" name="username" id=""><br>
        Password : <input type="password" name="pass" id=""><br>
        <a href="/register"><button type="button" name="btntoRegister">To Register</button></a>
        <a href=""><button type="submit" name="btnLogin">Login</button></a> 
    </form>
    
</body>
</html> --}}
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>@yield('title')</title>
        <style>
            body,html{
                height:100%;
            }
        </style>
    </head>
    <body style="background-color:rgb(51, 51, 51)">

        <div class="container justify-content-center p-5" style="background-color:rgb(161, 161, 161);color:white;border-radius:5px;margin-top:5%;width:700px">
            <h2><center>Register</center></h2>
           
                
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has("errorrr"))
                <div class="alert alert-danger" role="alert">
                <ul>
                    <li>Username Sudah Digunakan</li>
                </ul>
                </div>
                @endif
            
            <form action="/register" method="post">
                @csrf
                <div class="form-group">Username : <input type="text" name="username" id="" class='form-control' value={{old('username')}}></div>
                <div class="form-group">Email : <input type="text" name="email" id="" class='form-control'></div>                
                <div class="form-group">Password : <input type="password" name="pass" id="" class='form-control' ></div>                
                <div class="form-group">Confirmation Password : <input type="password" name="conpass" id="" class='form-control'></div>                
                <a href="/login"><button type="button" name="btntoLogin" class="btn btn-info">To Login</button></a>
                <a href=""><button type="submit" name="btnRegister" class="btn btn-success">Register</button></a> 
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>