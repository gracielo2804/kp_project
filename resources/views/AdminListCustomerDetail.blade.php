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
            <h3>Detail Customer</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form class="form-horizontal style-form" enctype="multipart/form-data">
                            @foreach($customer as $d)
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Username Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->username_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->nama_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Telp Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->telp_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Email Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->email_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Bank Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->namabank_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No Rekening Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->norek_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Atas Nama Rekening</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->an_customer}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Total Saldo</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="@currency( $d->saldo),-" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <label class="col-sm-4 col-sm-24control-label"><b><u>Daftar Paket Investasi Aktif :</u></b></label>
                                    </label>
                                </div>
                            @endforeach
                        </form>
                        <table class="table table-bordered" id="tbPegawai">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Expired</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($hpaket->count()==0)
                                    <td colspan="13"><center><b>No Data<b></center></td>
                                @else
                                    @foreach($hpaket as $d)
                                        <tr>
                                            @if ($d->status == 1)
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $d->id_transaksi}}</td>
                                                @foreach ($paket as $p)
                                                    @if ($d->id_paket == $p->id_paket)
                                                        <td>{{ $p->nama_paket}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $d->tanggal_pembelian}}</td>
                                                <td>{{ $d->tanggal_expired}}</td>
                                                <td>@currency($d->jumlah_investasi),-</td>
                                                @if ($d->status == 1)
                                                    <td style="background-color: #b1f0c2">Active</td>
                                                @else <td style="background-color: #f0776e" >Expired</td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
            $('#tbPegawai').wrap("<div class='scrolledTable'></div>");
     });
</script>
@endpush
@endsection
