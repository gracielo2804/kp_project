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
            <h3>Detail Pending Deposit</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form class="form-horizontal style-form" method="POST" action="/admin/pending/deposit/detail/decline" enctype="multipart/form-data">
                        @csrf
                            @foreach($hdepo as $d)
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ID Deposit</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->id_depo}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Username Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->username_cust}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Deposit</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $d->tanggal_depo}}" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah Deposit</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="@currency($d->jumlah_depo),-" disabled>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Detail Bank Customer</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <textarea type="text" rows="3" class="form-control" disabled>Bank : {{$d->bank_cust}} &#10;No Rek : {{ $d->norek_cust}} &#10;Atas Nama : {{ $d->an_cust}}
                                                </textarea>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    @foreach ($bank as $b)
                                        @if ($d->id_bank_tujuan == $b->id)
                                            <label class="col-sm-2 col-sm-2 control-label">Detail Bank Tujuan</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <textarea type="text" rows="3" class="form-control" disabled>Bank : {{$b->namabank_admin}} &#10;No Rek : {{ $b->no_rek}} &#10;Atas Nama : {{ $b->atas_nama}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Status</span>
                                            @if ( $d->status == 1)
                                            <input style="background-color: #f5ea6e; color:black; text-align: center; " type="text" class="form-control" value="Pending" aria-describedby="basic-addon3">
                                            @elseif ($d->status == 2)
                                            <input style="background-color: #b1f0c2; color:black; text-align: center; " type="text" class="form-control" value="Success" aria-describedby="basic-addon3">
                                            @else
                                            <input style="background-color: #f0776e; color:black; text-align: center; " type="text" class="form-control" value="Declined" aria-describedby="basic-addon3">
                                            @endif

                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                    <label class="">Bukti Transfer</label>
                                    <a href="#" id="pop"><img  src="/{{ $d->bukti_trf}}" id="preview" class="img-thumbnail"></a></td>
                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01">

                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>
                                    </div>
                                </div>
                                @if ($d->status == 1)
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Keterangan</span>
                                            <textarea type="text" rows="3" class="form-control" id="keterangan"
                                            name="keterangan" aria-describedby="basic-addon3"></textarea>
                                            <input type="text" class="form-control" name="idpaket" id="idpaket" value="{{$d->id_depo}}" hidden>
                                            <input type="text" class="form-control" name="username" id="username" value="{{$d->username_cust}}" hidden>
                                        </div>
                                        @if (session()->has("success"))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session()->get("success") }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @elseif (session()->has("error"))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session()->get("error") }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <!-- BASIC FORM ELELEMNTS -->
                                        <span id="errorMsg"></span>
                                        <a class="btn btn-success mt-3" href="/admin/pending/deposit/accept/{{$d->id_depo}}/{{$d->username_cust}}/{{$d->jumlah_depo}}"> <i class="fa fa-check"></i> Accept</a>

                                        <button class="btn btn-danger mt-3" type="submit" id="btnSubmit"><i class="fa fa-times"></i> Decline</button>
                                    </div>
                                @endif
                            @endforeach
                        </form>
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

        </section>
    </section>
  </section>
  <script src="{{asset('asset_sementara/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  @push('js')
  <script>
    $(document).ready(function(){
        $(".pop").on("click", function() {
            $('#imagepreview').attr('src', $(this).attr('src'));
            $('#imagemodal').modal('show');
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
