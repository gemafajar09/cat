@extends('backend/layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Barang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">SWIMOC CAT</a></li>
                                <li class="breadcrumb-item active">Barang</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('barang.create') }}"><i class="fa fa-plus"></i> Add</a></h3>
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

                                    <table id="example1" class="table table-bordered table-striped yajra-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Stok Awal</th>
                                                <th>Stok Sisa</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Foto</th>
                                                <th>Option</th>
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

            <script>
                // untuk hapus data
                function mHapus(url) {
                    $('#ModalHapus').modal()
                    $('#formDelete').attr('action', url);
                }
            </script>

            @if (session()->has('message'))
            <script>
                $('#message').show();
                setInterval(function(){ $('#message').hide(); }, 5000);
            </script>
            @endif

            <script>
                $(document).ready(function () {
                    var table = $('.yajra-example').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('barang.list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'barang_kode', name: 'barang_kode'},
                            {data: 'barang_nama', name: 'barang_nama'},
                            {data: 'kategori_nama', name: 'kategori_nama'},
                            {data: 'barang_satuan', name: 'barang_satuan'},
                            {data: 'barang_stok_awal', name: 'barang_stok_awal'},
                            {data: 'barang_stok_sisa', name: 'barang_stok_sisa'},
                            {data: 'barang_harga_beli', name: 'barang_harga_beli'},
                            {data: 'barang_harga_jual', name: 'barang_harga_jual'},
                            {
                                data: 'foto', 
                                name: 'foto', 
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

@endsection