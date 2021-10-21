@extends('HeaderAdmin')
@push('css')
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }th, td {
    white-space: nowrap;
}
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
     });
</script>
@endpush
@endsection
