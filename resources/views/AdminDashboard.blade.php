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
            <h3>Dashboard</h3>
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
            <div class="col">
                <div class="form-panel">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #97e8d8; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-user-alt fa-lg" style="color: #97e8d8; margin-right:20px;margin-left:10px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $ctreditprofile = 0; ?>
                                            @foreach($eprofile as $d)
                                                <?php $ctreditprofile += 1 ?>
                                            @endforeach
                                            <h5 class="m-b-0">{{$ctreditprofile}}</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Pending Edit Profile</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #ffeccf; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-donate fa-lg" style="color: #ffeccf; margin-right:20px;margin-left:10px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $ctrpendingdeposit = 0; ?>
                                            @foreach($hdepo as $d)
                                                <?php $ctrpendingdeposit += 1 ?>
                                            @endforeach
                                            <h5 class="m-b-0">{{$ctrpendingdeposit}}</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Pending Deposit</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #ffadad; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-money-check-alt fa-lg" style="color: #ffadad; margin-right:20px;margin-left:7px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $ctrpendingwd = 0; ?>
                                            @foreach($hwd as $d)
                                                <?php $ctrpendingwd += 1 ?>
                                            @endforeach
                                            <h5 class="m-b-0">{{$ctrpendingwd}}</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Pending Withdrawal</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #faadff; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fa fa-cart-plus fa-lg" style="color: #e0baff; margin-right:20px;margin-left:10px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $ctrhpakettoday = 0; ?>
                                            @foreach($hpakettoday as $d)
                                                <?php $ctrhpakettoday += 1 ?>
                                            @endforeach
                                            <h5 class="m-b-0">{{$ctrhpakettoday}}</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Total Pembelian Paket Investasi Hari Ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #ffba70; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-file-invoice-dollar fa-lg" style="color: #ffba70; margin-right:20px;margin-left:13px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $uangtoday = 0; ?>
                                            @foreach($hpakettoday as $d)
                                                <?php $uangtoday += $d->jumlah_investasi ?>
                                            @endforeach
                                            <h5 class="m-b-0">@currency($uangtoday),-</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Total Pemasukan Hari Ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #b1ffad; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-file-invoice-dollar fa-lg" style="color: #b1ffad; margin-right:20px;margin-left:13px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $uangweek = 0; ?>
                                            @foreach($hpaketweek as $d)
                                                <?php $uangweek += $d->jumlah_investasi ?>
                                            @endforeach
                                            <h5 class="m-b-0">@currency($uangweek),-</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Total Pemasukan Minggu Ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #e0baff; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-file-invoice-dollar fa-lg" style="color: #e0baff; margin-right:20px;margin-left:13px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $uangmonth = 0; ?>
                                            @foreach($hpaketbulan as $d)
                                                <?php $uangmonth += $d->jumlah_investasi ?>
                                            @endforeach
                                            <h5 class="m-b-0">@currency($uangmonth),-</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Total Pemasukan Bulan Ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="border-color: #70bcff; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-file-invoice-dollar fa-lg" style="color: #70bcff; margin-right:20px;margin-left:13px;margin-top:12px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:10px;">
                                            <?php $uangyear = 0; ?>
                                            @foreach($hpakettahun as $d)
                                                <?php $uangyear += $d->jumlah_investasi ?>
                                            @endforeach
                                            <h5 class="m-b-0">@currency($uangyear),-</h3>
                                            <h6 class="text-muted m-b-0" style="margin-top: -10px">Total Pemasukan Tahun Ini</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-md-auto">
                            <div class="card" style="border-color: #FFD700; border-width:5px 0px 5px 0px;height: 110px;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2)">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="round round-success" style="background-color: #525252; border-radius:50%; width:40px;height:40px;margin-top:10px; margin-right:15px;">
                                            <i class="fas fa-hand-holding-usd fa-lg" style="color: #FFD700; margin-right:20px;margin-left:10px;margin-top:10px;size:50px;"></i>
                                        </div>
                                        <div class="m-l-10 align-self-center" style="margin-top:0px;">
                                            <?php $ctreditprofile = 0; ?>
                                            @foreach($eprofile as $d)
                                                <?php $ctreditprofile += 1 ?>
                                            @endforeach
                                            <h5 class="m-b-0">Pembagian Dividen</h3>
                                            <div class="d-flex flex-row">
                                                <h6 class="text-muted m-b-0" style="margin-top: -10px; margin-right:20px;">Fitur Pembagian Dividen Akan Dibuka Setiap Tanggal 1 Di Tiap Bulannya.</h6>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <h6 class="text-muted m-b-0" style="margin-top: -10px">Status : </h6>
                                                @if (date('d') == "10")
                                                        @if ($dividen->tanggal_pembagian->format('m Y') != date('m Y'))
                                                            <h6 class="m-b-0" style="margin-top: -10px; margin-left:5px;color:#87d67c">Bisa Membagikan Dividen</h6>
                                                        @else
                                                            <h6 class=" m-b-0" style="margin-top: -10px;margin-left:5px;color:#ff817d">Tidak Bisa Membagikan Dividen, Karena Dividen Sudah Pernah Di Bagikan Bulan Ini!</h6>
                                                        @endif
                                                @else
                                                    <h6 class=" m-b-0" style="margin-top: -10px;margin-left:5px;color:#ff817d">Tidak Bisa Membagikan Dividen, Karena Diluar Jadwal</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (date('d') == "10")
                                        @if ($dividen->tanggal_pembagian->format('m Y') != date('m Y'))
                                            <a href="/admin/dividen" style="float:right;color:whitesmoke; margin-top:-60px; width:150px; height 30px;border-radius:6%;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2); background-color:#2e2e2e; text-align:center"> <i class="fas fa-hand-holding-usd fa-lg" style="color: #FFD700; margin-right: 10px;margin-top:12px;margin-bottom:16px;"></i>Bagi Dividen</a><br>
                                        @else
                                            <a class="disabled" style="float:right;color:whitesmoke; margin-top:-60px; width:150px; height 30px;border-radius:6%;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2); background-color:#2e2e2e; text-align:center"> <i class="fas fa-hand-holding-usd fa-lg" style="color: #FFD700; margin-right: 10px;margin-top:12px;margin-bottom:16px;"></i>Bagi Dividen</a><br>
                                        @endif
                                    @else
                                        <a class="disabled" style="float:right;color:whitesmoke; margin-top:-60px; width:150px; height 30px;border-radius:6%;box-shadow: 3px 3px 3px 4px rgba(0, 0, 0, 0.2); background-color:#2e2e2e; text-align:center"> <i class="fas fa-hand-holding-usd fa-lg" style="color: #FFD700; margin-right: 10px;margin-top:12px;margin-bottom:16px;"></i>Bagi Dividen</a><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5>Daftar Pembelian Paket Hari Ini</h5>
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
                            @if ($hpakettoday->count()==0)
                                <td colspan="13"><center><b>Tidak Ada Pembelian Paket Baru Hari Ini<b></center></td>
                            @else
                                @foreach($hpakettoday as $d)
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
