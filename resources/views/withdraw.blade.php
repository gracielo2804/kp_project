@extends('MasterAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
        .error{
            color: red;
        }
    </style>
@endpush
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><!--<i class="fa fa-angle-right"></i> -->Withdraw</h3>    
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
                <input type="hidden" id="rekening_cust" value="{{$customer['norek_customer']}}">
                <input type="hidden" id="an_rek_cust" value='{{$customer['an_customer']}}'>
                <form class="form-horizontal style-form" method="POST" action="/withdraw" id="formWD">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Withdraw Amount</label>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" autocomplete="off" class="form-control" name="jumlahwithdraw" id="jumlahwithdraw"  value='{{old('jumlahwithdraw')}}' }} required>                                
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted ml-3">Maximum Withdraw Ammount is Rp. {{number_format($customer['saldo'])}}</small>
                        <input type="hidden" id="maximum-value" value="{{$customer['saldo']}}">
                    </div>
                    <div class="form-group ml-3">
                        Nama Bank : 
                        <div class="select-wrap one-third">
                           <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                           <select name="nama_bank" id="nama_bank" class="form-control col-6" placeholder="Keyword search" >
                                <option value="">Pilih Nama Bank</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>                        
                           </select>
                        </div>     
                    </div>            
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nomor Rekening</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="norek" id="norek" value='{{$customer['norek_customer']}}' required>
                        </div>     
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Atas Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="an" id="an" value='{{$customer['an_customer']}}' required>
                        </div>     
                    </div>     
                    {{-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">PIN</label>
                        <div class="col-6">
                            <input type="text" class="form-control-lg" name="mycode" id="pincode-input1" >
                        </div>     
                    </div>  --}}
                        {{-- <a href="#" id="pop" class="pl-3"> --}}
                            <button class="btn btn-success" type="button" id="btnDeposit">Next</button>
                        {{-- </a> --}}
                    <!-- Creates the bootstrap modal where the image will appear -->
                <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content modal-content-centered">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Input Pin</h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">PIN</label>
                                <div class="col-12">
                                    <input type="text" class="form-control-lg" name="mycode" id="pincode-input2" >
                                </div>     
                            </div> 
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" id="submitWD" class="btn btn-success">Withdraw</button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </form>
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
        $('#btnDeposit').on('click',function(){
            var norekcust=$('#rekening_cust').val();
            var namarekcust=$('#an_rek_cust').val();
            if(norekcust==$('#norek').val() && namarekcust==$('#an').val()){
                alertWD('Anda akan melakukan withdraw ke rekening anda sendiri');
            }
            else{
                alertWD('Ada perbedaan rekening dengan profil anda. Apakah anda ingin tetap melanjutkan ?');
            }
        });
        function alertWD(messages){
            Swal.fire({
                title: 'Info',
                text: messages,
                icon: 'info',   
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, lanjutkan'                            
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#imagemodal').modal();                    
                }
                else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Cancel',
                    text: 'Withdraw Dibatalkan',
                    })
                }
            });                        
        }
        $('#formWD').validate({
            rules: {
                nama_bank:"required",
                norek:"required",
                an:"required",
                jumlahwithdraw:"required",
            },
        });
        const maximumValueWithdrawal = $('#maximum-value').val();
        const autoNumericOptionsEuro = {
            digitGroupSeparator        : '.',
            decimalCharacter           : ',',
            decimalCharacterAlternative: '.',
            currencySymbolPlacement    : AutoNumeric.options.currencySymbolPlacement.prefix,
            roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
            maximumValue               : maximumValueWithdrawal,
            minimumValue               : 0,
            wheelStep                  : 1000,
            decimalPlaces              : 0
        };
        var pininput="";
        new AutoNumeric(document.getElementById('jumlahwithdraw'), autoNumericOptionsEuro);
        $('#jumlahwithdraw').ForceNumericOnly();  
        $('#norek').ForceNumericOnly();  
        $("#pop").on("click", function() {
            $('#imagepreview').attr('src', $('#preview').attr('src')); // here asign the image to the modal when the user click the enlarge link
            $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });   
        $('#submitWD').on('click',function(){
            if($('#formWD').valid()){
                $.ajax({
                    method:'get',
                    url:'/ajaxCekPin/'+pininput,
                    success:function(res){      
                        if(res=="1"){
                            console.log('sucess');
                            Swal.fire({
                                title: 'Success!',
                                text: 'Withdraw berhasil dilakukan',
                                icon: 'success',                               
                            }).then(function(){
                                $('#formWD').submit();
                            });      
                            // 
                        }
                        else{
                            Swal.fire(
                            'Failed!',
                            'PIN yang anda inputkan Salah!',
                            'error'
                            );      
                        }                    
                    }                
                });
            }
            else{
                Swal.fire(
                    'Failed!',
                    'Harap isi semua form',
                    'error',
                    
                );  
            }
            
        });
        $('#pincode-input1').pincodeInput({inputs:6,placeholders:"0 0 0 0 0 0",
            // change: function(input,value,inputnumber){
            //     console.log("onchange from input number "+inputnumber+", current value: " + value, input);
            // },
            keydown:function(e){

            },
            complete:function(value, e, errorElement){
                console.log("code entered: " + value);
                
                /*do some code checking here*/
                
                $(errorElement).html("code entered: " + value);
            }
        });
        $('#pincode-input2').pincodeInput({inputs:6,placeholders:"0 0 0 0 0 0",
            // change: function(input,value,inputnumber){
            //     console.log("onchange from input number "+inputnumber+", current value: " + value, input);
            // },
            keydown:function(e){

            },
            complete:function(value, e, errorElement){
                console.log("code entered: " + value);
                pininput=value;
                
                /*do some code checking here*/
                
                $(errorElement).html("code entered: " + value);
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
 