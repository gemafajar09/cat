@extends('backend/layouts/app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Soal {{ $kategori_soal->kategori_soal }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">SWIMOC CAT</a></li>
                    <li class="breadcrumb-item active">Data Soal {{ $kategori_soal->kategori_soal }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
@if($kategori_soal->kategori_soal == 'TIU')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a class="btn btn-primary btn-sm text-white"
                                href="{{ route('soal.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
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
                        <div class="row">
                            @foreach($mapelsupmapel as $no => $sl)
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="card ">
                                    <div class="card-header">
                                        <h3 class="card-title"> Soal {{ $sl['mapel'] }}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="info-box-content">
                                            <ul>
                                                @foreach($sl['submapel'] as $noo => $sub)
                                                <li>
                                                    <a href="{{ route('soal.submapel', $sub->submapel_id) }}" style="color: black;">{{ $sub->submapel_kategori }} - {{ number_format($sub->total) }} Soal </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <span class="info-box-number"></span>
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
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
@else
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a class="btn btn-primary btn-sm text-white"
                                href="{{ route('soal.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
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

                        <table class="table table-bordered table-striped yajra-example">
                            <thead>
                                <tr>
                                    <th style="width:5%">No</th>
                                    <th style="width:50%%">Soal</th>
                                    <th style="width:35%">Jawaban</th>
                                    <th style="width:10%">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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

<script>
    $(document).ready(function () {
        var table = $('.yajra-example').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('soal.listSoalKategori', $kategori_soal->kategori_id) }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {
                    data: 'soal', 
                    name: 'soal', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'jawaban', 
                    name: 'jawaban', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'option', 
                    name: 'option', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>
@endif
<!-- /.content -->

@endsection
