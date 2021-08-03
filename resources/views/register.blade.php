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
                {{-- <div class="form-group">
                    Register Sebagai : 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                           Admin
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                    </div>
                </div> --}}
              
                <div class="form-group">Username : <input type="text" name="username" id="" class='form-control' value={{old('username')}}></div>
                <div class="form-group">Name : <input type="text" name="name" id="" class='form-control' value={{old('name')}}></div>                
                <div class="form-group">Email : <input type="text" name="email" id="" class='form-control' value={{old('email')}}></div>                
                <div class="form-group">Password : <input type="password" name="pass" id="pass" class='form-control' value={{old('pass')}} ></div>                
                <div class="form-group">Confirmation Password : <input type="password" name="conpass" id="conpass" class='form-control'  value={{old('conpass')}}>
                    <span id='message'></span>
                </div>
                <div class="form-group">PIN : <input type="password" name="pin" id="pin" class='form-control' value={{old('pin')}} ></div>                
                <div class="form-group">Phone Number : <input type="text" name="phone" id="phone" class='form-control' placeholder="ex : 0812312312312" value={{old('phone')}}  ></div>                
               
                <div class="form-group">
                    Bank Name : 
                    <div class="select-wrap one-third">
                       <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                       <select name="" id="" class="form-control" placeholder="Keyword search" name="lokasi">
                         <option value="">Select your bank name</option>
                         <option value="BCA">BCA</option>
                         <option value="Mandiri">Mandiri</option>
                         <option value="BNI">BNI</option>
                         <option value="BRI">BRI</option>                        
                       </select>
                    </div>     
                </div>            
                <div class="form-group">Bank Account Number : <input type="text" name="norek" id="norek" class='form-control' value={{old('norek')}} ></div> 
                <div class="form-group">Bank Account Name : <input type="text" name="an_bank" id="an_bank" class='form-control' value={{old('an_bank')}} ></div>                               
                <a href="/logincust"><button type="button" name="btntoLogin" class="btn btn-info">To Login</button></a>
                <a href=""><button type="submit" name="btnRegister" class="btn btn-success">Register</button></a> 
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#pass, #conpass').on('keyup', function () {
                if ($('#pass').val() == $('#conpass').val()) {
                    $('#message').html('').css('color', 'green');
                } else 
                    $('#message').html('The password must be the same as the confirmation password').css('color', 'red');
                });
                $('#pin').ForceNumericOnly();
                $('#phone').ForceNumericOnly();
                $('#norek').ForceNumericOnly();
                $('#pin').on('keyup', function () {
                    if($(this).val().length > 6) {
                        $(this).val($(this).val().substr(0,$(this).val().length-1))
                    };
                });
            });       
            
            jQuery.fn.ForceNumericOnly =
            function()
            {
                return this.each(function()
                {
                    $(this).keydown(function(e)
                    {
                        var key = e.charCode || e.keyCode || 0;
                        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                        // home, end, period, and numpad decimal
                        return (
                            key == 8 || 
                            key == 9 ||
                            key == 13 ||
                            key == 46 ||
                            // key == 110 ||
                            // key == 190 ||
                            (key >= 35 && key <= 40) ||
                            (key >= 48 && key <= 57) ||
                            (key >= 96 && key <= 105));
                    });
                });
            };     
        </script>
    </body>
</html>