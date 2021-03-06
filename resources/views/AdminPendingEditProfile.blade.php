@extends('HeaderAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
        .scrolledTable{ overflow-y: auto; clear:both; }
        .fa-cog {
            color: white;
        }
    </style>
@endpush
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3>Daftar Pending Request Edit Profile</h3>
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
                                <th>Tanggal Request</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Alasan Perubahan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ecust->count()==0)
                                <td colspan="12"><center><b>No Data<b></center></td>
                            @else
                                @foreach($ecust as $e)
                                    <tr>
                                        @if ($e->status == 1)
                                        <td>{{ $loop->iteration}}</td>
                                            @foreach ($cust as $d)
                                                @if ($d->username_customer == $e->username_cust)
                                                    <td>{{ $e->tanggal}}</td>
                                                    <td>{{ $e->username_cust}}</td>
                                                    <td>{{ $d->nama_customer}}</td>
                                                    <td>{{ $e->keterangan}}</td>
                                                    <td>Pending</td>
                                                    <td>
                                                        <a class="btn btn-warning mt-3" href="/admin/pending/editprofile/detail/{{ $e->username_cust}}"> <i class="fa fa-info"></i> Detail</a>
                                                    </td>
                                                @endif
                                            @endforeach
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
         $('#btnDecline').on('click',function(){
             if(document.getElementById("keterangan").value.length == 0){
                $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Keterangan harus di isi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`)
                event.preventDefault();
             }
         });
     });
</script>
@endpush
@endsection
