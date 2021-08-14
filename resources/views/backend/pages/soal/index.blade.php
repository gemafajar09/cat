@extends('backend/layouts/app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Soal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">SWIMOC CAT</a></li>
                    <li class="breadcrumb-item active">Soal</li>
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
                        <h3 class="card-title">
                            <a class="btn btn-primary btn-sm text-white" onclick="importSoal()"><i class="fa fa-plus"></i> Import Soal</a>
                            <a class="btn btn-primary btn-sm text-white" href="{{ asset('dist/img/excel.csv') }}" download=""><i class="fa fa-download"></i> Contoh Excel</a>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="callout callout-success" style="display:none" id="message">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>

                        <div class="row">
                            @foreach($soal as $no => $sl)
                            <div class="col-md-4 col-sm-6 col-12">
                                <a href="{{ route('soal.kategori' ,$sl->kategori_id) }}" style="color: black;">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                        <div class="info-box-content">
                                            <h2 class="info-box-text">Soal {{ $sl->kategori_soal }}</h2>
                                            <span class="info-box-number">Total Soal : {{ number_format($sl->total_soal) }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </a>
                                <!-- /.info-box -->
                            </div>
                            @endforeach
                        </div>
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


<!-- modal import -->
<div class="modal fade" id="ModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('soal.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>File CSV</label>
                        <input type="file" class="form-control @error('soal_import') {{ 'is-invalid' }} @enderror" name="soal_import" id="soal_import">
                        @error('soal_import')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
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

    function importSoal() { 
        $('#ModalImport').modal()
    }

</script>

@if (session()->has('message'))
<script>
    $('#message').show();
    setInterval(function () {
        $('#message').hide();
    }, 5000);

</script>
@endif

@endsection
