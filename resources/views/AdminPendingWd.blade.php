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
            <h3>Daftar Pending Withdrawal</h3>
            @if (session()->has("success"))
                {{-- Kita tampilkan alert success nya! --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get("success") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session()->has("error"))
            {{-- Kita tampilkan alert success nya! --}}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get("error") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <span id="errorMsg"></span>
            <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <table class="table table-bordered" id="tbPegawai">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>ID Withdraw</th>
                                <th>Username Customer</th>
                                <th>Tanggal Withdraw</th>
                                <th>Jumlah</th>
                                <th>Detail User</th>
                                <th>Status</th>
                                <th>Upload Bukti</th>
                                <th>Accept</th>
                                <th>Keterangan</th>
                                <th>Decline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($hwd->count()==0)
                                <td colspan="11"><center><b>No Data<b></center></td>
                            @else
                                @foreach($hwd as $d)
                                    <tr>
                                        @if ($d->status_wd == 1)
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $d->id_wd}}</td>
                                            <td>{{ $d->username_cust}}</td>
                                            <td>{{ $d->tanggal_wd}}</td>
                                            <td>@currency($d->jumlah_wd),-</td>
                                            @foreach ($cust as $c)
                                                @if ($c->username_customer == $d->username_cust)
                                                    <td>Nama Bank : {{ $c->namabank_customer}}<br>
                                                    No Rekening : {{ $c->norek_customer}}<br>
                                                    Atas/Nama : {{ $c->an_customer}}</td>
                                                @endif
                                            @endforeach
                                            <td>Pending</td>
                                            <form class="form-horizontal style-form" method="POST" action="/admin/pending/withdrawal/accept" enctype="multipart/form-data">
                                                @csrf
                                                <td>
                                                    <div class="input-group">
                                                        <input type="file" name="img" class="file" accept="image/*" id="inputGambar" required>
                                                        <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file" required>
                                                        <div class="input-group-append">
                                                            <button type="button" class="browse btn btn-primary">Browse...</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_wd}}" hidden>
                                                    <input type="text" class="form-control" name="saldo" id="saldo" value="{{$d->jumlah_wd}}" hidden>
                                                    <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success mt-3" type="submit" id="btnAccept"><i class="fa fa-check"></i> Accept</button>
                                                </td>
                                            </form>
                                            <form class="form-horizontal style-form" method="POST" action="/admin/pending/withdrawal/decline" enctype="multipart/form-data">
                                                @csrf
                                                <td>
                                                    <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">Ket</span>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="basic-addon3">
                                                    <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_wd}}" hidden>
                                                    <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger mt-3" type="submit" id="btnDecline"><i class="fa fa-times"></i> Decline</button>
                                                </td>
                                            </form>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
                     // document.getElementsByTagName('div')[0].appendChild(img);
                     // };
                     // $('#image-preview').src=fileReader.result;
                     // $('#image-preview').attr('style',"object-fill:contain;");
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
        $("#tbPegawai").DataTable({
            retrieve: true,
            paging: true,
            scrollX: true,
            lengthChange : true,
            scrollCollapse: true,
            searching: true,
            ordering: true
            });
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         });
         $('#btnDecline').on('click',function(){
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
