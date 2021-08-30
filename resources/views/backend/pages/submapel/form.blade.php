@extends('backend/layouts/app')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mata Pelajaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">MEDIATAMA CAT</a></li>
                                <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('submapel') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $submapel->submapel_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($submapel))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="custom-select select2bs4 @error('submapel_mapel_id') {{ 'is-invalid' }} @enderror" name="submapel_mapel_id" id="submapel_mapel_id">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach($mapel as $mpl)
                                                    <option value="{{ $mpl->mapel_id }}">{{ $mpl->mapel_kategori }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @if( old('submapel_mapel_id') != ''  )
                                                <script>
                                                    document.getElementById('submapel_mapel_id').value = "{{ old('submapel_mapel_id') }}"
                                                </script>
                                                @endif
                                                @if(isset($submapel))
                                                <script>
                                                    document.getElementById('submapel_mapel_id').value = '<?php echo $submapel->submapel_mapel_id ?>'
                                                </script>
                                                @endif
                                                @error('submapel_mapel_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control @error('submapel_kategori') {{ 'is-invalid' }} @enderror" name="submapel_kategori" id="submapel_kategori" value="{{ old('submapel_kategori') ?? $submapel->submapel_kategori ?? '' }}">
                                                @error('submapel_kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
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
@endsection