@extends('HeaderAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
@endpush
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3>Detail Pending Withdrawal</h3>
            @if (session()->has("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get("success") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session()->has("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get("error") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form class="form-horizontal style-form">
                            @foreach($hwd as $d)
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ID Withdrawal</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->id_wd}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Username Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->username_cust}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Deposit</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->tanggal_wd}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Deposit</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="@currency($d->jumlah_wd),-" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Detail Bank Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @foreach ($cust as $c)
                                                    @if ($c->username_customer == $d->username_cust)
                                                        <textarea type="text" rows="3" class="form-control" disabled>Nama Bank : {{$c->namabank_customer}} &#10;No Rekening : {{ $c->norek_customer}} &#10;Atas/Nama : {{ $c->an_customer}}
                                                        </textarea>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Status</span>
                                            @if ( $d->status_wd == 1)
                                            <input style="background-color: #f5ea6e; color:black; text-align: center; " type="text" class="form-control" value="Pending" aria-describedby="basic-addon3">
                                            @elseif ($d->status_wd == 2)
                                            <input style="background-color: #b1f0c2; color:black; text-align: center; " type="text" class="form-control" value="Success" aria-describedby="basic-addon3">
                                            @else
                                            <input style="background-color: #f0776e; color:black; text-align: center; " type="text" class="form-control" value="Declined" aria-describedby="basic-addon3">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <span id="errorMsg"></span>
                                <form class="form-horizontal style-form" method="POST" action="/"></form>
                                <form class="form-horizontal style-form" method="POST" action="/admin/pending/withdrawal/accept" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="input-group mb-3">
                                                <input type="file" name="img" class="file" accept="image/*" id="inputGambar" required>
                                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file" required>
                                                <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                                </div><br>
                                            </div>
                                                <a href="#" id="pop"><img src="" id="preview" class="img-thumbnail" data-lightbox="roadtrip"></a>
                                                <!-- The Modal -->
                                                <div id="myModal" class="modal">

                                                    <!-- The Close Button -->
                                                    <span class="close">&times;</span>

                                                    <!-- Modal Content (The Image) -->
                                                    <img class="modal-content" id="img01">

                                                    <!-- Modal Caption (Image Text) -->
                                                    <div id="caption"></div>
                                                </div>
                                                <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_wd}}" hidden>
                                                <input type="text" class="form-control" name="saldo" id="saldo" value="{{$d->jumlah_wd}}" hidden>
                                                <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden><br>
                                            <button class="btn btn-success mt-3" type="submit" id="btnAccept"><i class="fa fa-check"></i> Accept</button>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal style-form" method="POST" action="/admin/pending/withdrawal/decline" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">Keterangan</span>
                                                <textarea type="text" class="form-control" rows="3" id="keterangan" name="keterangan" aria-describedby="basic-addon3"></textarea>
                                                <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_wd}}" hidden>
                                                <input type="text" class="form-control" name="saldo" id="saldo" value="{{$d->jumlah_wd}}" hidden>
                                                <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden>
                                            </div>
                                            <button class="btn btn-danger mt-3" type="submit" id="btnDecline"><i class="fa fa-times"></i> Decline</button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </form>
                    </div>
                    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                </div>
                                <div class="modal-body">
                                    <center><img src="" id="imagepreview" style="width: 500px; height: 364px; object-fit:contain" ></center>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
  </section>
  <script src="{{asset('asset_sementara/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  @push('js')
  <script type="text/javascript">
    $(document).ready(function(){
        $('#gambar').on('change',function(event){
             var file = event.target.files[0];
             if (file.type.match('image')) {
                 var fileReader = new FileReader();
                 fileReader.readAsDataURL(file);
                 fileReader.onload = readSucess;
                 function readSucess(){
                     if($('#image-preview').length){
                         var img = document.createElement('img');
                         img.src=fileReader.result;
                         console.log(img.height);
                         if(img.width>img.height){
                            $('#image-preview').width(200).height(150);
                         }
                         else{
                            $('#image-preview').width(150).height(200);
                         }
                         $('#image-preview').attr('src',fileReader.result);
                     }
                     else{
                         $('#btn-pick').html(`<i class="fa fa-paperclip"></i> Change`);
                         var img = document.createElement('img');
                         img.setAttribute('id',"image-preview");
                         img.src = fileReader.result;
                         if(img.width>img.height){
                            img.width=200
                            img.height=150
                         }
                         else{
                            img.height=200
                            img.width=150
                         }
                         img.setAttribute('style','object-fit:cover');
                         $('#pop').append(img);
                     }
                 }
             }
         });
         $('.browse').on('click',function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                var img=document.getElementById("preview");
                img.src = e.target.result;
                if(img.width>img.height){
                    img.width=350;
                    img.height=200;
                }
                else{
                    img.width=150
                    img.height=200;
                }
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
         });
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         }); $('#btnDecline').on('click',function(){
             if(document.getElementById("keterangan").value.length == 0){
                $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Keterangan harus di isi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`)
                event.preventDefault();
             }
         });
         $('#btnAccept').on('click',function(){
             if($('#file').val()==""){
                $('#errorMsg').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                   Harus Melampirkan Gambar Bukti Transfer!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`)
             }
         });
    });

</script>
@endpush
@endsection
