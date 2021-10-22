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
            <h3>Log Admin</h3>
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
                <div class="form-panel"><table class="table table-bordered" id="tbPegawai">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Username</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count()==0)
                                <td colspan="4"><center><b>No Data<b></center></td>
                            @else
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $d->tanggal}}</td>
                                        <td>{{ $d->username_admin}}</td>
                                        <td>{{ $d->keterangan}}</td>
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
<<<<<<< HEAD
        $("#tbPegawai").DataTable({
                retrieve: true,
                paging: true,
                lengthChange : true,
                searching: true,
                ordering: true,
                bJQueryUI: true,
                bStateSave: true,
            });
            $('#tbPegawai').wrap("<div class='scrolledTable'></div>");
=======

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
>>>>>>> 53edefbfc72ce0329d32e390df14eb8d7877cbb7
     });
</script>
@endpush
@endsection
