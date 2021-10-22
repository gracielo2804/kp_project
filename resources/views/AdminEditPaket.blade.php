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
            <h3>Edit Paket</h3>
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
            <!-- BASIC FORM ELELEMNTS -->
            <span id="errorMsg"></span>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form class="form-horizontal style-form" method="POST" action="/admin/list/editpaket/submit" enctype="multipart/form-data">
                            @csrf
                            @foreach ($data as $d)
                            <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_paket}}" hidden>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Paket</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="namapaket" id="namapaket" value="{{$d->nama_paket}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Keterangan Paket</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keteranganpaket" id="keteranganpaket" value="{{$d->keterangan_paket}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Minimal Investasi</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="mininvest" id="mininvest" value="{{$d->minimal_investasi}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Persentasi Profit</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="persentase" id="persentase" value="{{$d->presentase_profit}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Durasi Kontrak (Bulan)</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="durasi" id="durasi" value="{{$d->durasi_kontrak
                                            }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Gambar Paket</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="file" name="img" class="file" accept="image/*" id="inputGambar" required>
                                            <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file" required>
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <a href="#" id="pop"><img src="" id="preview" class="img-thumbnail"></a>

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success ml-3" type="submit" id="btnSubmit">Submit</button><br>
                            @endforeach
                        </form>
                    </div>
                    <!-- Creates the bootstrap modal where the image will appear -->
                    <div class="modal fade" id="imagemodal" class="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  @push('js')
  <script>
    $(document).ready(function(){
         $('#btnSubmit').on('click',function(){
            if($('#btnSubmit').attr('type')=="button"){
            }
         });
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
            reader.readAsDataURL(this.files[0]);
        });

        $(".pop").on("click", function() {
            $('#imagepreview').attr('src', $(this).attr('src'));
            $('#imagemodal').modal('show');
        });

        $('#btnSubmit').on('click',function(){
             if($('#file').val()==""){
                $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Harus Melampirkan Gambar Paket Investasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>`
                )
            }
        });
    });

</script>
@endpush
@endsection
