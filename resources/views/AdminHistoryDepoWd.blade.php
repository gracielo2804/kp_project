@extends('HeaderAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }th, td {

    white-space: nowrap;
}
.scrolledTable{ overflow-y: auto; clear:both; }
    </style>
@endpush
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3>Riwayat Deposit & Penarikan Saldo</h3>
            @if (session()->has("success"))
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
            <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <label > <b><u>Pilih Kategori : </u></b></label>
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="kategori">
                                            <option value="deposit" selected="selected">Deposit</option>
                                            <option value="withdrawal">Withdrawal</option>
                                        </select><span class="input-group-btn"> &nbsp;
                                        <button  class="btn btn-warning " type="button" id="btnSubmit"><i class="fa fa-search"></i> Search</button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><br>
                    <table class="table table-bordered" id="tbPegawai">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>ID Deposit</th>
                                <th>Username Customer</th>
                                <th>Tanggal Deposit</th>
                                <th>Jumlah Deposit</th>
                                <th>Detail Bank Customer</th>
                                <th>Detail Bank Tujuan</th>
                                <th>Bukti Transfer</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($hdepo->count()==0)
                                <td colspan="9"><center><b>No Data<b></center></td>
                            @else
                                @foreach($hdepo as $d)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $d->id_depo}}</td>
                                        <td>{{ $d->username_cust}}</td>
                                        <td>{{ $d->tanggal_depo}}</td>
                                        <td>@currency( $d->jumlah_depo),-</td>
                                        <td>Bank : {{$d->bank_cust}} <br>No Rek : {{ $d->norek_cust}} <br>Atas Nama : {{ $d->an_cust}}</td>
                                        @foreach ($bank as $b)
                                            @if ($d->id_bank_tujuan == $b->id)
                                                    <td>Bank : {{$b->namabank_admin}} <br>No Rek : {{ $b->no_rek}} <br>Atas Nama : {{ $b->atas_nama}}</td>
                                            @endif
                                        @endforeach
                                        @if ($d->bukti_trf != NULL)
                                            <td><center><a href="#" id="pop" ><img width="250px" height="200px" src="/{{ $d->bukti_trf}}" id="preview" class="img-thumbnail"></a></center></td>
                                        @else <td></td>
                                        @endif
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>
                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">
                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                        <td>{{ $d->keterangan}}</td>
                                        @if ( $d->status == 1)
                                            <td style="background-color: #f5ea6e; color:black; text-align: center; ">Pending</td>
                                        @elseif ($d->status == 2)
                                            <td style="background-color: #b1f0c2; color:black; text-align: center; ">Accepted</td>
                                        @else
                                            <td style="background-color: #f0776e; color:black; text-align: center; ">Declined</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <table class="table table-bordered" id="tbWD" style="display: none;">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>ID Withdrawal</th>
                                <th>Username Customer</th>
                                <th>Tanggal Withdrawal</th>
                                <th>Jumlah Withdrawal</th>
                                <th>Detail Bank Customer</th>
                                <th>Bukti Transfer</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($hdepo->count()==0)
                                <td colspan="9"><center><b>No Data<b></center></td>
                            @else
                                @foreach($hwd as $d)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $d->id_wd}}</td>
                                        <td>{{ $d->username_cust}}</td>
                                        <td>{{ $d->tanggal_wd}}</td>
                                        <td>@currency( $d->jumlah_wd),-</td>
                                        <td>Bank : {{$d->bank_tujuan}} <br>No Rek : {{ $d->norek_tujuan}} <br>Atas Nama : {{ $d->an_tujuan}}</td>
                                        <td><center><a href="#" id="pop" ><img width="250px" height="200px" src="/{{ $d->bukti_trf}}" id="preview" class="img-thumbnail"></a></center></td>
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>
                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">
                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                        <td>{{ $d->keterangan}}</td>
                                        @if ( $d->status_wd == 1)
                                            <td style="background-color: #f5ea6e; color:black; text-align: center; ">Pending</td>
                                        @elseif ($d->status_wd == 2)
                                            <td style="background-color: #b1f0c2; color:black; text-align: center; ">Accepted</td>
                                        @else
                                            <td style="background-color: #f0776e; color:black; text-align: center; ">Declined</td>
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
        $("#tbPegawai").DataTable({
            retrieve: true,
            paging: true,
            lengthChange : true,
            searching: true,
            ordering: true,
            bJQueryUI: true,
            bStateSave: true,
            iDisplayLength: 50,
            aaSorting: [[4, "desc"], [5, "asc"]],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            sPaginationType: "full_numbers",
        });
        $("#tbWD").DataTable({
            retrieve: true,
            paging: true,
            lengthChange : true,
            searching: true,
            ordering: true,
            bJQueryUI: true,
            bStateSave: true,
            iDisplayLength: 50,
            aaSorting: [[4, "desc"], [5, "asc"]],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            sPaginationType: "full_numbers",
        });
        $('#tbPegawai').wrap("<div class='scrolledTable'></div>");
        $('#tbWD').wrap("<div class='scrolledTable'></div>");
        $('#tbWD').parents('div.dataTables_wrapper').first().hide();
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         });
         $('#btnSubmit').on('click',function(){
                console.log("ini wd");
            if(document.getElementById("kategori").value == "withdrawal"){
                $('#tbWD').show();
                $('#tbWD').parents('div.dataTables_wrapper').first().show();
                $('#tbPegawai').parents('div.dataTables_wrapper').first().hide();
                event.preventDefault();
            }
            else{
                $('#tbPegawai').parents('div.dataTables_wrapper').first().show();
                $('#tbWD').parents('div.dataTables_wrapper').first().hide();
                event.preventDefault();
            }
        });
    });
</script>
@endpush
@endsection
