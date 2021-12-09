@extends('HeaderAdmin')
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
            <h3>Laporan Penjualan Paket Investasi</h3>
            @if (session()->has("success"))
                {{-- Kita tampilkan alert success nya! --}}
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

            <span id="errorMsg"></span>
            <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <table class="table table-bordered" id="tbPegawai">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>ID Transaksi</th>
                                <th>Username Customer</th>
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
                                            <td>{{ $d->username_cust}}</td>
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
