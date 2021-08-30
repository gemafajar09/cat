@extends('backend/layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Token Ujian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MEDIATAMA CAT</a></li>
                                <li class="breadcrumb-item active">Token Ujian</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('token.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                
                                    <div class="callout callout-success" style="display:none" id="message">
                                        <strong>{{ session()->get('message') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>

                                    <table id="example1" class="table table-bordered table-striped example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Token</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($token as $no => $tkn)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($tkn->token_tanggal)->isoFormat('D MMMM Y') }}</td>
                                                <td>{{ $tkn->token_jam_mulai }}</td>
                                                <td>{{ $tkn->token_jam_selesai }}</td>
                                                <td>{{ $tkn->token_key }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="mSetting('{{ $tkn->token_id }}')"><i class="fa fa-cog"></i> Setting Soal</button>
                                                    <a href="{{ route('token.edit', $tkn->token_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('token.delete', $tkn->token_id) }}')"><i class="fa fa-trash"></i> </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

            <!-- modal hapus -->
            <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="POST" id="formDelete">
                            <div class="modal-body">
                                @csrf
                                @method('delete')
                                Yakin Hapus Data ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info btn-sm">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- modal setting soal -->
            <div class="modal fade" id="ModalSetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Setting Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    Tambah Data Soal
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" id="token_id">
                                        @foreach($kategorisoal as $no => $ktg)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kategori Soal</label>
                                                    <input type="hidden" value="{{ $ktg->kategori_id }}" name="kategori_id" class="form-control">
                                                    <input type="text" value="{{ $ktg->kategori_soal }}" class="form-control" readonly>
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Soal</label>
                                                <input type="text" id="setting_soal_jumlah<?= $no+1 ?>" name="setting_soal_jumlah" class="form-control number">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button onclick="simpanSoal()" class="btn btn-primary btn-block">Save</button>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // untuk hapus data
                function mHapus(url) {
                    $('#ModalHapus').modal()
                    $('#formDelete').attr('action', url);
                }
                // utk setting soal
                function mSetting(id) {
                    $('#token_id').val(id);

                    $.ajax({
                        type: "GET",
                        url: "{{ url('/cat-admin/setting-soal') }}/" + id,
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        dataType: "JSON",
                        success: function (response) {
                            if(response.data){
                                var setting_soal_jumlah = response.data.setting_soal_jumlah;
                                var a = setting_soal_jumlah.split(",");
                                
                                for (let i = 0; i < $('input[name*=setting_soal_jumlah').length; i++) {
                                    $(`#setting_soal_jumlah${i + 1}`).val(a[i]);
                                }
                            }

                        }
                    });

                    $('#ModalSetting').modal()
                }

                // simpan setting soal
                function simpanSoal() {  
                    var kategori_id = $('input[name^=kategori_id]').map(function(idx, elem) {
                        return $(elem).val();
                    }).get();
                    
                    var setting_soal_jumlah = $('input[name^=setting_soal_jumlah]').map(function(idx, elem) {
                        return $(elem).val();
                    }).get();

                    var token_id = $('#token_id').val();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('setting-soal.store') }}",
                        data: {
                            "_token" : "{{ csrf_token() }}",
                            "token_id" : token_id,
                            "kategori_id" : kategori_id,
                            "setting_soal_jumlah" : setting_soal_jumlah,
                        },
                        dataType: "JSON",
                        success: function (response) {
                            console.log(response.message);
                        }
                    });
                }


            </script>

            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif

@endsection