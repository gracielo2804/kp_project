@extends('MasterAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
        .scrolledTable{ overflow-y: auto; clear:both; }
    </style>
@endpush
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><!--<i class="fa fa-angle-right"></i> -->History Deposit</h3>

            <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <table id="tablehisdepo" border="1px" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Jumlah Investasi</th>
                                <th>Tanggal Expired</th>
                                <th>Status</th><th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count()==0)
                                <td colspan="6"><center><b>No Data<b></center></td>
                            @else
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->id_transaksi }}</td>
                                        <td>
                                            @foreach ($dataPaket as $item)
                                                @if($d->id_paket==$item->id_paket)
                                                    {{$item->nama_paket}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $d->tanggal_pembelian }}</td>
                                        <td>Rp. {{ number_format($d->jumlah_investasi) }}</td>
                                        <td>{{ $d->tanggal_pembelian }}</td>
                                        <td>
                                            @if($d->status==1)
                                                <p class="btn btn-success">Active
                                            @elseif($d->status==2)
                                                <p class="btn btn-danger">Expired
                                            @endif
                                        </td>
                                        <td>
                                            {{$d->keterangan}}
                                        </td>
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
  <script src="{{asset('asset_sementara/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  @push('js')
  <script>
    $(document).ready(function(){
        $("#tablehisdepo").DataTable({
                retrieve: true,
                paging: true,
                lengthChange : true,
                searching: true,
                ordering: true,
                bJQueryUI: true,
                bStateSave: true,
                iDisplayLength: 10,
                aaSorting: [[4, "desc"], [5, "asc"]],
                aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                sPaginationType: "full_numbers",
            });
            $('#tablehisdepo').wrap("<div class='scrolledTable'></div>");
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         });
     });
</script>
@endpush


  @endsection
