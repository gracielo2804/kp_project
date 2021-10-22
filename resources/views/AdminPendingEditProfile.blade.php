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
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                                <th>Alasan Perubahan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
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
                                            @foreach ($cust as $d)
                                                @if ($d->username_customer == $e->username_cust)
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $e->tanggal}}</td>
                                                    <td>{{ $e->username_cust}}</td>
                                                    <td>{{ $d->nama_customer}}</td>
                                                    <td>{{ $d->telp_customer}}<br>Diubah Menjadi : {{ $e->telp_cust}}</td>
                                                    <td>{{ $d->email_customer}}<br>Diubah Menjadi : {{ $e->email_cust}}</td>
                                                    <td>{{ $d->namabank_customer}}<br>Diubah Menjadi : {{ $e->namabank_cust}}</td>
                                                    <td>{{ $d->norek_customer}}<br>Diubah Menjadi : {{ $e->norek_cust}}</td>
                                                    <td>{{ $d->an_customer}}<br>Diubah Menjadi : {{ $e->an_cust}}</td>
                                                    <td>{{ $e->keterangan}}</td>
                                                    <td>Pending</td>
                                                    <form class="form-horizontal style-form" method="POST" action="/admin/pending/request/decline" enctype="multipart/form-data">
                                                        @csrf
                                                        <td>
                                                            <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon3">Ket</span>
                                                            <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="basic-addon3">
                                                            <input type="text" class="form-control" name="username" id="username" value="{{$e->username_cust}}" hidden>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-success mt-3" href="/admin/pending/request/accept/{{$e->username_cust}}/{{ $e->password_cust}}/{{$e->nama_cust}}/{{$e->telp_cust}}/{{ $e->email_cust}}/{{ $e->namabank_cust}}/{{ $e->norek_cust}}/{{ $e->an_cust}}"> <i class="fa fa-check"></i> Accept</a>
                                                            <button class="btn btn-danger mt-3" type="submit" id="btnDecline"><i class="fa fa-times"></i> Decline</button>
                                                        </td>
                                                    </form>
                                                @endif
                                            @endforeach
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
            $('#tbPegawai').wrap("<div class='scrolledTable'></div>");
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         });
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
