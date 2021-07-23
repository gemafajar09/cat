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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('barang') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $barang->barang_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($barang))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kode</label>
                                                        <input type="text" class="form-control @error('barang_kode') {{ 'is-invalid' }} @enderror" name="barang_kode" id="barang_kode" value="{{ old('barang_kode') ?? $barang->barang_kode ?? '' }}">
                                                        @error('barang_kode')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control @error('barang_nama') {{ 'is-invalid' }} @enderror" name="barang_nama" id="barang_nama" value="{{ old('barang_nama') ?? $barang->barang_nama ?? '' }}">
                                                        @error('barang_nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select class="custom-select select2bs4 @error('kategori_id') {{ 'is-invalid' }} @enderror" name="kategori_id" id="kategori_id">
                                                            <option value="">-- Pilih --</option>
                                                            @foreach($kategori as $ktg)
                                                            <option value="{{ $ktg->kategori_id }}">{{ $ktg->kategori_nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        @if( old('kategori_id') != ''  )
                                                        <script>
                                                            document.getElementById('kategori_id').value = "{{ old('kategori_id') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($barang))
                                                        <script>
                                                            document.getElementById('kategori_id').value = '<?php echo $barang->kategori_id ?>'
                                                        </script>
                                                        @endif
                                                        @error('kategori_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Satuan</label>
                                                        <select class="custom-select select2bs4tag @error('barang_satuan') {{ 'is-invalid' }} @enderror" name="barang_satuan" id="barang_satuan">
                                                            <option value="">-- Pilih --</option>
                                                        </select>                                                
                                                        @if( old('barang_satuan') != ''  )
                                                        <script>
                                                            document.getElementById('barang_satuan').value = "{{ old('barang_satuan') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($barang))
                                                        <script>
                                                            document.getElementById('barang_satuan').value = '<?php echo $barang->barang_satuan ?>'
                                                        </script>
                                                        @endif
                                                        @error('barang_satuan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Harga Beli</label>
                                                        <input type="text" class="form-control number @error('barang_harga_beli') {{ 'is-invalid' }} @enderror" name="barang_harga_beli" id="barang_harga_beli" value="{{ old('barang_harga_beli') ?? $barang->barang_harga_beli ?? '' }}">
                                                        @error('barang_harga_beli')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Harga Jual</label>
                                                        <input type="text" class="form-control number @error('barang_harga_jual') {{ 'is-invalid' }} @enderror" name="barang_harga_jual" id="barang_harga_jual" value="{{ old('barang_harga_jual') ?? $barang->barang_harga_jual ?? '' }}" >
                                                        @error('barang_harga_jual')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Stok Awal</label>
                                                        <input type="text" class="form-control number @error('barang_stok_awal') {{ 'is-invalid' }} @enderror" name="barang_stok_awal" id="barang_stok_awal" value="{{ old('barang_stok_awal') ?? $barang->barang_stok_awal ?? '' }}" >
                                                        @error('barang_stok_awal')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Stok Sisa</label>
                                                        <input type="text" class="form-control number @error('barang_stok_sisa') {{ 'is-invalid' }} @enderror" name="barang_stok_sisa" id="barang_stok_sisa" value="{{ old('barang_stok_sisa') ?? $barang->barang_stok_sisa ?? '' }}" >
                                                        @error('barang_stok_sisa')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Masuk</label>
                                                        <input type="date" class="form-control @error('barang_tanggal') {{ 'is-invalid' }} @enderror" name="barang_tanggal" id="barang_tanggal" value="{{ old('barang_tanggal') ?? $barang->barang_tanggal ?? '' }}" >
                                                        @error('barang_tanggal')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input type="file" class="form-control @error('barang_foto') {{ 'is-invalid' }} @enderror" name="barang_foto" id="barang_foto" value="{{ old('barang_foto') ?? $barang->barang_foto ?? '' }}" >
                                                        @error('barang_foto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="custom-select @error('barang_status') {{ 'is-invalid' }} @enderror" name="barang_status" id="barang_status">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Tersedia">Tersedia</option>
                                                            <option value="Kosong">Kosong</option>
                                                        </select>
                                                        
                                                        @if( old('barang_status') != ''  )
                                                        <script>
                                                            document.getElementById('barang_status').value = "{{ old('barang_status') }}"
                                                        </script>
                                                        @endif
                                                        @if(isset($barang))
                                                        <script>
                                                            document.getElementById('barang_status').value = '<?php echo $barang->barang_status ?>'
                                                        </script>
                                                        @endif
                                                        
                                                        @error('barang_status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                </div>
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
            @if(isset($barang))
            <script>
                $(document).ready(function () {
                    document.getElementById("barang_satuan").innerHTML = null;
                    axios.get("{{ route('barang.satuan') }}")
                        .then(function(res){
                            var satuan = res.data.data;
                            for(var x = 0; x < satuan.length; x++)
                            {
                                document.getElementById("barang_satuan").innerHTML += "<option value='" + satuan[x] +"'>" + satuan[x] + "</option>"
                            }

                            document.getElementById('barang_satuan').value = '<?php echo $barang->barang_satuan ?>';

                        })
                });
            </script>
            @else
            <script>
                $(document).ready(function () {
                    document.getElementById("barang_satuan").innerHTML = null;
                    axios.get("{{ route('barang.satuan') }}")
                        .then(function(res){
                            var satuan = res.data.data;
                            for(var x = 0; x < satuan.length; x++)
                            {
                                document.getElementById("barang_satuan").innerHTML += "<option value='" + satuan[x] +"'>" + satuan[x] + "</option>"
                            }
                            document.getElementById('barang_satuan').value = "{{ old('barang_satuan') }}";
                        })
                });
            </script>
            @endif
            
@endsection