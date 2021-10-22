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
            <h3>Daftar Paket Investasi</h3>
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
                    <a class="btn btn-success btn-sm mt-3" href="/admin/list/addpaket"> <i class="fa fa-plus-circle"></i> Tambah Paket Investasi Baru</a><br><br>
                    <table class="table table-bordered" id="tbPegawai">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Gambar Paket</th>
                                <th>Nama Paket</th>
                                <th>Keterangan Paket</th>
                                <th>Minimal Investasi</th>
                                <th>Persentase Profit</th>
                                <th>Durasi Kontrak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count()==0)
                                <td colspan="9"><center><b>No Data<b></center></td>
                            @else
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->id_paket}}</td>
<<<<<<< HEAD
                                        <td><center><a href="#" id="pop" ><img width="250px" height="200px" src="/{{ $d->gambar_paket}}" id="preview" class="img-thumbnail"></a></center></td>
=======
                                        <td><center><a href="#" id="pop" ><img width="250px" height="200px" src="/{{ $d->gambar_paket}}" id="preview" class="img-thumbnail hover-shadow cursor" onclick="openModal();currentSlide({{ $loop->iteration}})"></a></center></td>
>>>>>>> 53edefbfc72ce0329d32e390df14eb8d7877cbb7
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                        <td>{{ $d->nama_paket}}</td>
                                        <td>{{ $d->keterangan_paket}}</td>
                                        <td>@currency($d->minimal_investasi),-</td>
                                        <td>{{ $d->presentase_profit }}%</td>
                                        <td>{{ $d->durasi_kontrak}} Bulan</td>
                                        <td>
                                            @if($d->status == 1)
                                                Active
                                            @else Non Active
                                            @endif
                                        </td>
                                        <td>
                                            @if($d->status == 1)
                                                <a class="btn btn-danger btn-sm mt-3" href="/admin/list/nonaktifpaket/{{$d->id_paket}}"> <i class="fa fa-times"></i> Non-Aktifkan Paket</a>
                                            @else
                                                <a class="btn btn-success btn-sm mt-3" href="/admin/list/aktifpaket/{{$d->id_paket}}"> <i class="fa fa-check"></i> Aktifkan Paket</a>
                                            @endif <br>
                                            <a class="btn btn-warning btn-sm mt-3" href="/admin/list/editpaket/{{$d->id_paket}}"> <i class="fa fa-pencil-square-o"></i> Edit Data Paket</a>
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
     });
</script>
@endpush
@endsection
