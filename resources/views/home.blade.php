<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Home</title>
</head>
<body style="background-color:rgb(51, 51, 51);" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ (url()->current() == url("/home")) ? 'active' : '' }}">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item {{ (url()->current() == url("/followteman")) ? 'active' : '' }}">
                    <a class="nav-link" href="/followteman">Follow Teman</a>
                </li>
                <li class="nav-item {{ (url()->current() == url("/postteman")) ? 'active' : '' }}">
                    <a class="nav-link" href="/postteman">Post Teman</a>
                </li>
            </ul>
        </div>
        <a class="nav-link btn btn-danger" href="/logout">Logout</a>
    </nav>
    <div class="container pb-5" style="background-color:rgb(219, 219, 219);border-radius:8px;">
        <div class="nama_follow pl-3 pt-3">
            <span class="font-weight-bold h3 ml-3 mt-5">Hello, {{Session::get('active')}}</span>
            <span class="h4 ml-3 mt-5">Following : {{Session::get('following')}}  <span class="ml-3"></span>Follower : {{Session::get('follower')}}</span>
        </div><hr>        
        <h2><center>Postingan Anda</center></h2>        
            @if($posts=="nol")
            <h4><center>Tidak Ada Data<center></h4>        
        @else
        <div class="row pl-5 pr-5 ml-auto" >
            @foreach ($posts['posting'] as $item)
            <div class="card ml-3 mt-5" style="width: 20rem;">
                <img src="{{$item->img_link}}" class="card-img-top" height="300px">
                <div class="card-body">                
                    <p class="card-text h5" style="font-size:10pt;">{!!nl2br($item->caption)!!}</p><hr>
                        @foreach ($posts['comment'] as $items)
                        <p>
                            @if($items->id_post==$item->id)
                                <?php $idusercomment=$items->id_user; ?>
                                @foreach ($allusers as $itemss)
                                    @if($itemss->id==$items->id_user)
                                        <b>{{$itemss->username}}</b> - 
                                    @endif
                                @endforeach
                                {{$items->isicomment}}
                            @endif                            
                        </p>
                        @endforeach
                    <hr>
                    <div class="row justify-content-around">
                        @if(!isset($posts['like']))
                            <a href="/like/{{$item->id}}" class="btn btn-success">Like</a>                                                      
                        @else
                        <?php $cekpos=true ?>
                            @foreach ($posts['like'] as $items)
                            @if ($items->id_posting==$item->id)
                                <?php $cekpos=false?>
                            @endif                        
                            @endforeach
                            @if($cekpos)                            
                                <a href="/like/{{$item->id}}" class="btn btn-success">Like</a>   
                            @else
                                <a href="/unlike/{{$item->id}}" class="btn btn-success">Unlike</a>        
                            @endif
                        @endif
                        <a href="/comment/{{$item->id}}" class="btn btn-success">Comment</a>                                            
                    </div>
                
                    {{-- <div class="row justify-content-around">
                        <div class="harga">Harga : Rp. 15.000</div>
                        <a href="/dough/wheatdough" class="btn btn-success">Pilih</a>                
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        <hr> 
        <h2 class="pt-3"><center>Tambahkan Post</center></h2>
        @if ($errors->any())      
            @foreach ($errors->all() as $item)
                @if ($item=='Link Gambar harus diisi !' || $item=='Caption harus diisi !')
                    <li>{{$item}}</li>
                @endif
            @endforeach
        @endif
        <form action="/posting" method="post">
            @csrf
            <div class="form-group">
                Link Gambar : <input type="text" name="linkgambar" id="" class="form-control">
            </div>
            <div class="form-group">
                Caption : <textarea type="text" name="caption" id="" class="form-control"></textarea>
            </div>
            <button type="submit" class='btn btn-success'>Post</button>    
        </form>

    
             
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>