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
            <h3>Detail Pending Request Edit Profile</h3>
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
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form class="form-horizontal style-form" method="POST" action="/admin/pending/editprofile/detail/decline" enctype="multipart/form-data">
                        @csrf
                            @foreach($ecust as $e)
                                @if ($e->status == 1)
                                    @foreach ($cust as $d)
                                        @if ($d->username_customer == $e->username_cust)
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Request</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$e->tanggal}}" disabled>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Username Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{ $e->username_cust }}" disabled>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Nama Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$d->nama_customer}}" disabled>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Telp Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group">
                                                                @if ($e->telp_cust)
                                                                    <input type="text" class="form-control" value="Tidak Berubah, Tetap : {{$d->telp_customer}}" disabled>
                                                                @else
                                                                    <textarea type="text" rows="3" class="form-control" disabled>{{$d->telp_customer}} &#10;Diubah Menjadi : &#10;{{$e->telp_cust}}</textarea>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Email Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group">
                                                                @if ($e->email_cust == null)
                                                                    <input type="text" class="form-control" value="Tidak Berubah, Tetap : {{$d->email_customer}}" disabled>
                                                                @else
                                                                    <textarea type="text" rows="3" class="form-control" disabled>{{$d->email_customer}} &#10;Diubah Menjadi : &#10;{{$e->email_cust}}</textarea>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Nama Bank Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group">
                                                                @if ($e->namabank_cust == "")
                                                                    <input type="text" class="form-control" value="Tidak Berubah, Tetap : {{$d->namabank_customer}}" disabled>
                                                                @else
                                                                    <textarea type="text" rows="3" class="form-control" disabled>{{$d->namabank_customer}} &#10;Diubah Menjadi : &#10;{{$e->namabank_cust}}</textarea>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">No Rekening Customer</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            @if ($e->norek_cust == "")
                                                                <input type="text" class="form-control" value="Tidak Berubah, Tetap : {{$d->norek_customer}}" disabled>
                                                            @else
                                                                <textarea type="text" rows="3" class="form-control" disabled>{{$d->norek_customer}} &#10;Diubah Menjadi : &#10;{{$e->norek_cust}}</textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Atas Nama Rekening</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            @if ($e->an_cust == "")
                                                                <input type="text" class="form-control" value="Tidak Berubah, Tetap : {{$d->an_customer}}" disabled>
                                                            @else
                                                                <textarea type="text" rows="3" class="form-control" disabled>{{$d->an_customer}} &#10;Diubah Menjadi : &#10;{{$e->an_cust}}</textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </label>
                                            </div><div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Alasan Perubahan Data</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                                <textarea type="text" rows="3" class="form-control" disabled>{{ $e->keterangan}}</textarea>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon3">Status</span>
                                                        @if ( $e->status == 1)
                                                        <input style="background-color: #f5ea6e; color:black; text-align: center; " type="text" class="form-control" value="Pending" aria-describedby="basic-addon3">
                                                        @elseif ($e->status == 2)
                                                        <input style="background-color: #b1f0c2; color:black; text-align: center; " type="text" class="form-control" value="Success" aria-describedby="basic-addon3">
                                                        @elseif($e->status == 3)
                                                        <input style="background-color: #f0776e; color:black; text-align: center; " type="text" class="form-control" value="Declined" aria-describedby="basic-addon3">
                                                        @endif

                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon3">Keterangan</span>
                                                        <textarea type="text" rows="3" class="form-control" id="keterangan"
                                                        name="keterangan" aria-describedby="basic-addon3"></textarea>
                                                        <input type="text" class="form-control" name="username" id="username" value="{{$e->username_cust}}" hidden>
                                                    </div>
                                                    <!-- BASIC FORM ELELEMNTS -->
                                                    <span id="errorMsg"></span>
                                                    <a class="btn btn-success mt-3" href="/admin/pending/request/accept/{{$e->username_cust}}/{{$e->nama_cust}}/{{$e->telp_cust}}/{{ $e->email_cust}}/{{ $e->namabank_cust}}/{{ $e->norek_cust}}/{{ $e->an_cust}}"> <i class="fa fa-check"></i> Accept</a>

                                                    <button class="btn btn-danger mt-3" type="submit" id="btnSubmit"><i class="fa fa-times"></i> Decline</button>
                                                </div>
                                            @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </form>
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
