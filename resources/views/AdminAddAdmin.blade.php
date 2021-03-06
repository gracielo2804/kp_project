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
            <h3>Tambah Admin Baru</h3>
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
                <form class="form-horizontal style-form" method="POST" action="/admin/list/addadmin/new" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Username Admin</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="user" id="user" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="cols-sm-4 ml-3" style="font-size:9pt"></div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="password" class="form-control" name="newpassword" id="newpassword">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3  control-label">Konfirmasi Password</label>
                        <div class="cols-sm-4 ml-3" style="font-size:9pt"></div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="password" class="form-control" name="conpassword" id="conpassword" disabled>
                                <span id='message'></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Admin</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Telp Admin</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="telp" id="telp" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email Admin</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                    </div>
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
        $('#newpassword').on('keyup', function (){
            if($('#newpassword').val()!=""||$('#newpassword').val!=null){
                $('#conpassword').prop('disabled', false);
            }
            else{
                $('#conpassword').prop('disabled', true);
            }
            if(!$('#conpassword').prop('disabled')){
                if ($('#newpassword').val()==$('#conpassword').val()) {
                    $('#message').html('').css('color', 'green');
                    $('#btnSubmit').attr('type','submit');
                } else {
                    $('#message').html('Password harus sama dengan konfirmasi password').css('color', 'red');
                    $('#btnSubmit').attr('type','button');
                }
            }
        });
        $('#conpassword').on('keyup', function (){
            if(!$('#conpassword').prop('disabled')){
                if ($('#newpassword').val()==$('#conpassword').val()) {
                    $('#btnSubmit').attr('type','submit');
                    $('#message').html('').css('color', 'green');
                } else {
                    $('#message').html('Password harus sama dengan konfirmasi password').css('color', 'red');
                    $('#btnSubmit').attr('type','button');
                }
            }
        });
         $('#btnSubmit').on('click',function(){
            if($('#btnSubmit').attr('type')=="button"){
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
