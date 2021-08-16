@extends('MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Tambah Paket</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                <form class="form-horizontal style-form" method="POST" action="addPaket">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Deposit Amount</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" name="jumlahDeposit" id="jumlahDeposit">
                            </div>
                        </div>
                    </div>
                </form>
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
            <div style="padding:30px;margin-left:800px;">
            <button class="btn btn-success" type="submit">Deposit</button>
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
  @push("js")
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('asset/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('asset/admin/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('asset/admin/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!--custom switch-->
  <script src="{{asset('asset/admin/lib/bootstrap-switch.js')}}"></script>
  <!--custom tagsinput-->
  <script src="{{asset('asset/admin/lib/jquery.tagsinput.js')}}"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/form-component.js')}}"></script>
  <script>
       $(document).ready(function(){          
            $('#jumlahDeposit').ForceNumericOnly();
            $('#phone').ForceNumericOnly();
            $('#norek').ForceNumericOnly();
            $('#pin').on('keyup', function () {
                if($(this).val().length > 6) {
                    $(this).val($(this).val().substr(0,$(this).val().length-1))
                };
            });
            $('#username').on('blur',function(){
                console.log('test');
                $.ajax({
                    method:'get',
                    url:'/ajaxUsernameCustomer/'+$('#username').val(),
                    success:function(res){      
                        if(res.length==0){
                            $('#messageusername').html('You can use this username').css('color', 'green');
                        }
                        else{
                            $('#messageusername').html('Username Already Used').css('color', 'red');
                        }
                        console.log(res);
                    // res.forEach(element => {
                    //     $('#asalbandara').val(element.bandara_asal);
                    //     $('#tujuanbandara').val(element.bandara_tujuan);
                    //     $('#durasiflight').val(element.durasi);
                    //     $('#hargaflight').val(element.harga);
                    // });
                    }                
                });
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
