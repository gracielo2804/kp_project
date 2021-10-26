@extends('MasterAdmin')
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
            <h3><!--<i class="fa fa-angle-right"></i> -->Deposit</h3>    
            @if (session()->has("success"))
                {{-- Kita tampilkan alert success nya! --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get("success") }}
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
                <form class="form-horizontal style-form" method="POST" action="/deposit" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Deposit Amount</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" name="jumlahDeposit" id="jumlahDeposit" value='{{old('jumlahDeposit')}}' required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tujuan Transfer</label>
                        <div class="col-sm-6">
                            <select name="bankTujuan" id="" class="form-control" placeholder="Keyword search" >
                                @foreach ($listBank as $item=>$values)
                                <option value={{$values->id}}>{{"$values->atas_nama - $values->no_rek - $values->namabank_admin"}}</option>
                            @endforeach                   
                            </select>
                        </div>     
                    </div>     
                    <div class="ml-2 col-sm-6">
                        <div id="msg">Bukti Transfer</div>
                            <input type="file" name="img" class="file" accept="image/*" id="inputGambar" required>
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file" required>
                                <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse...</button>
                                </div>
                            </div>
                        </div>
                        <div class="ml-2 col-sm-6">
                            <a href="#" id="pop"><img src="" id="preview" class="img-thumbnail"></a>
                        </div>
                        <div style="padding:30px;">
                            <button class="btn btn-success" type="submit" id="btnDeposit">Deposit</button>
                        </div>
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
                                <center><img src="" id="imagepreview" style="width: 500px; height: 364px; object-fit:contain" ></center>
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
            {{-- <div class="row mt">
                <div class="col-lg-12">
                <div class="form-panel">
                    
                    <h4 class="mb"><i class="fa fa-angle-right"></i>Detail Paket</h4>
                    <form class="form-horizontal style-form" method="POST" action="addPaket">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-4">
                        <span>Hari Ke- 1</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Time</label>
                            <div class="col-sm-4">
                            <input type="Time" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Dari</label>
                            <div class="col-sm-4">
                            <input type="Text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-4">
                            <input type="Text" class="form-control">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Transportasi</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Bis</option>
                                    <option>Pesawat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Ini Muncul klo dia pilih Pesawat</label>
                            <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Pilih Pesawat</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Hotel</label>
                            <div class="col-sm-4">
                            <select class="form-control">
                                <option>Pilihan sesuai yang ada di database</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Catatan</label>
                            <div class="col-sm-4">
                            <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5"></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </form>
                </div>
                </div>
                <!-- col-lg-12-->
            </div>
            <div class="col-md-12 mt">
                <div class="content-panel">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Hari Ke-</th>
                        <th>Tanggal</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Transportasi</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div> --}}
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
        console.log('asd');
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
         $('#btnDeposit').on('click',function(){
             if($('#file').val()==""){
                $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Harus Melampirkan Foto Bukti Transfer!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`)
             }
             
         });
         const autoNumericOptionsEuro = {
            digitGroupSeparator        : '.',
            decimalCharacter           : ',',
            decimalCharacterAlternative: '.',
            currencySymbolPlacement    : AutoNumeric.options.currencySymbolPlacement.prefix,
            roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
            minimumValue               : 0,
            wheelStep                  : 1000,
            decimalPlaces              : 0
        };
        new AutoNumeric(document.getElementById('jumlahDeposit'), autoNumericOptionsEuro);
         $('#jumlahDeposit').ForceNumericOnly();  
         $('#jumlahDeposit').ForceNumericOnly();  
         $("#pop").on("click", function() {
             $('#imagepreview').attr('src', $('#preview').attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
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
 