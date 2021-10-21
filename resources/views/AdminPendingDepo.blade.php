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
            <h3>Daftar Pending Deposit</h3>
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
                                <th>ID Deposit</th>
                                <th>Username Customer</th>
                                <th>Tanggal Deposit</th>
                                <th>Jumlah</th>
                                <th>Bank Customer</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                                <th>Bank Tujuan</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($hdepo->count()==0)
                                <td colspan="13"><center><b>No Data<b></center></td>
                            @else
                                @foreach($hdepo as $d)
                                    <tr>
                                        @if ($d->status == 1)
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $d->id_depo}}</td>
                                            <td>{{ $d->username_cust}}</td>
                                            <td>{{ $d->tanggal_depo}}</td>
                                            <td>@currency($d->jumlah_depo),-</td>
                                            <td>{{ $d->bank_cust}}</td>
                                            <td>{{ $d->norek_cust}}</td>
                                            <td>{{ $d->an_cust}}</td>
                                            @foreach ($bank as $b)
                                                @if ($d->id_bank_tujuan == $b->id)
                                                    <td>{{$b->nama}}</td>
                                                @endif
                                            @endforeach
                                            <td><center><a href="#" id="pop"><img width="250px" height="200px" src="/{{ $d->bukti_trf}}" id="preview" class="img-thumbnail"></a></center></td>
                                            <td>Pending</td>
                                            <form class="form-horizontal style-form" method="POST" action="/admin/pending/deposit/decline" enctype="multipart/form-data">
                                            @csrf
                                            <td>
                                                <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">Ket</span>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="basic-addon3">
                                                <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_depo}}" hidden>
                                                <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-success mt-3" href="/admin/pending/deposit/accept/{{$d->id_depo}}/{{$d->username_cust}}/{{$d->jumlah_depo}}"> <i class="fa fa-check"></i> Accept</a>

                                                <button class="btn btn-danger mt-3" type="submit" id="btnSubmit"><i class="fa fa-times"></i> Decline</button>
                                            </td>
                                            </form>
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
            scrollX: true,
            lengthChange : true,
            scrollCollapse: true,
            searching: true,
            ordering: true
            });
         $(".pop").on("click", function() {
             $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
             $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
         });
         $('#btnSubmit').on('click',function(){
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
