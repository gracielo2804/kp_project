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
            <input type="hidden" name="saldoCust" id=saldoCust value="{{$customer['saldo']}}">
            <h3><!--<i class="fa fa-angle-right"></i> -->Invest</h3>    
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
                <form class="form-horizontal style-form" method="POST" action="/invest" id="formInvest">
                    <input type="hidden" name="" id="namaPaket" value=""> 
                    <input type="hidden" name="" id="minimalInvestasi" value=""> 
                    <input type="hidden" name="" id="returnInvestasi" value=""> 
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Paket Investasi</label>
                        <div class="col-sm-6">
                            <select name="idPaketInput" id="paketInvestasi" class="form-control" placeholder="Keyword search" >
                                <option id= "op0" val=0 class="">Silahkan Memilih Paket</option> 
                                @foreach ($dataPaket as $item=>$values)
                                    <option value="{{$values->id_paket}}" minim="{{$values->minimal_investasi}}" persentase="{{$values->presentase_profit}}" nama="{{$values->nama_paket}}">
                                        {{"$values->nama_paket"}}</option>
                                 @endforeach                   
                            </select>
                        </div>    
                        <div class="d-none" id="infopaket">
                            <p id="emailHelp" class="form-text text-muted ml-3">Minimal Investasi untuk paket ini adalah Rp. <span id=minimInvestText></span></p>
                        <p id="emailHelp" class="form-text text-muted ml-3">Persentase profit untuk paket ini adalah <span id=returnInvestText></span>% per bulannya</p>
                        </div>                         
                    </div>     
                    <div class="form-group">                        
                        <label class="col-sm-2 col-sm-2 control-label">Invest</label>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" autocomplete="off" class="form-control" name="jumlahInvest" id="jumlahInvest"  value='{{old('jumlahInvest')}}' max={{$customer['saldo']}} required disabled>                                
                                <p id="investError" class="text-danger d-none"> Saldo anda tidak mencukupi untuk pembelian paket investasi ini</p>     
                            </div>
                        </div>                        
                        <p id="emailHelp" class="form-text text-muted ml-3">Saldo Anda saat Ini Rp. {{number_format($customer['saldo'],0,',','.')}}</p>
                        <input type="hidden" id="maximum-value" value="{{$customer['saldo']}}">
                    </div>
                    {{-- <div class="form-group ml-3">
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
                    </div>             --}}
                    {{-- <div class="form-group">
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
                    </div>      --}}
                    {{-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">PIN</label>
                        <div class="col-6">
                            <input type="text" class="form-control-lg" name="mycode" id="pincode-input1" >
                        </div>     
                    </div>  --}}
                        <a href="#" id="pop" class="pl-3"><button class="btn btn-success" type="button" id="btnDeposit">Invest</button></a>
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
                                <button type="button" id="submitInvest" class="btn btn-success">Confirm</button>
                                </div>
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
        var saldo=$('#saldoCust').val();
        $('#paketInvestasi').on('change',function(){
            if($(this).children('option:selected').val()!=0){
                $('#op0').addClass('d-none');
                $('#infopaket').removeClass('d-none');
                var minim=$(this).children('option:selected').attr('minim');
                var nama=$(this).children('option:selected').attr('nama');
                console.log(`saldo : ${saldo} - minim: ${minim}`)
                if(parseInt(minim)>parseInt(saldo)){
                    $('#jumlahInvest').prop('disabled',true);
                    $('#jumlahInvest').addClass('is-invalid');
                    $('#investError').removeClass('d-none');
                    $('#btnDeposit').prop('disabled',true);
                    
                }
                else{
                    $('#jumlahInvest').prop('disabled',false);
                    $('#jumlahInvest').removeClass('is-invalid');
                    $('#investError').addClass('d-none');
                    $('#btnDeposit').prop('disabled',false);
                }
                var persentase=$(this).children('option:selected').attr('persentase');
                var text=new Intl.NumberFormat('de-DE').format(minim)
                $('#minimInvestText').html(text);
                $('#returnInvestText').html(persentase);
                autoNumericOptionsEuro.minimumValue=minim;
                $('#jumlahInvest').val('');
                if(parseInt(minim)<autoNumericOptionsEuro.maximumValue){
                    $('#jumlahInvest').val(minim);
                    new AutoNumeric(document.getElementById('jumlahInvest'), autoNumericOptionsEuro);
                    
                }                                             
            }
            else{
                $('#op0').removeClass('d-none');
                $('#infopaket').addClass('d-none');
            }            
        });  
        $('#btnDeposit').on('click',function(){
            var invest=$('#jumlahInvest').val().replace('.','')
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: `Anda akan investasi ${$('#paketInvestasi').children('option:selected').attr('nama')}
                 sebesar Rp. ${new Intl.NumberFormat('de-DE').format(parseInt(invest))}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya,Saya yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#imagemodal').modal();                        
                    }
                })                                
        });
        $('#submitInvest').on('click',function(){
            var invest=$('#jumlahInvest').val().replace('.','')
            $.ajax({
                method:'get',
                url:'/ajaxCekPin/'+pininput,
                success:function(res){      
                    if(res=="1"){
                        Swal.fire(
                        'Berhasil!',
                        `Anda telah investasi ${$('#paketInvestasi').children('option:selected').attr('nama')}
                             sebesar Rp. ${new Intl.NumberFormat('de-DE').format(parseInt(invest))}`,
                        'success'
                        ).then((result)=>{
                            $('#jumlahInvest').val(parseInt(invest));                        
                            $('#formInvest').submit();
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
 