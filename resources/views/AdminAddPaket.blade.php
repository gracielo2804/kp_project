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
            <h3>Tambah Paket Investasi Baru</h3>
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
                <form class="form-horizontal style-form" method="POST" action="/admin/list/addpaket/new" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Paket</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="namapaket" id="namapaket" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Keterangan Paket</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keteranganpaket" id="keteranganpaket" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Minimal Investasi</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" name="mininvest" id="mininvest" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Persentasi Profit</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" name="persentase" id="persentase" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Durasi Kontrak (Bulan)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" name="durasi" id="durasi" required>
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
                    </div></div>
                    <button class="btn btn-success ml-3" type="submit" id="btnSubmit">Submit</button><br>
                </form>
                </div>
                <!-- Creates the bootstrap modal where the image will appear -->
                <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                                <center><img src="" id="imagepreview" style="width: 500px; height: 364px; object-fit:contain" ></center><br><br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-lg-12-->
            </div>
            <!-- /col-md-12 -->
            </div>

            </div>
            </div>
            <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  {{-- <script src="{{asset('asset_sementara/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script> --}}

  <!--common script for all pages-->
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
         $('#btnSubmit').on('click',function(){
             if($('#file').val()==""){
                $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Harus Melampirkan Gambar Paket Investasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`)
             }

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
@endpush
@endsection
