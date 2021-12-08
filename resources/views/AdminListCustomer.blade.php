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
            <h3>Daftar Customer</h3>
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
                                <th>Username Customer</th>
                                <th>Nama Customer</th>
                                <th>Telp Customer</th>
                                <th>Email Customer</th>
                                <th>Jumlah Saldo</th>
                                <th>Jumlah Paket Aktif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customer->count()==0)
                                <td colspan="13"><center><b>No Data<b></center></td>
                            @else
                                @foreach($customer as $d)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $d->username_customer}}</td>
                                        <td>{{ $d->nama_customer}}</td>
                                        <td>{{ $d->telp_customer}}</td>
                                        <td>{{ $d->email_customer}}</td>
                                        <td>@currency( $d->saldo),-</td>
                                        <?php $jmlhpaket=0;?>
                                        @foreach ($kontrakpaket as $kp)
                                            @if ($kp->username_cust == $d->username_customer)
                                            <?php $jmlhpaket++;?>
                                            @endif
                                        @endforeach
                                        <td>
                                            {{$jmlhpaket}}
                                        </td>
                                        <td>
                                            <a class="btn btn-warning mt-3" href="/admin/list/customer/detail/{{$d->username_customer}}"> <i class="fa fa-info"></i> Detail</a>
                                        </td>
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
