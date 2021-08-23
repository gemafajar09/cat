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
                        <h3 class="card-title"><button class="btn btn-primary btn-sm text-white"
                                onclick="window.history.back();"><i class="fa fa-arrow-left"></i> Back</button></h3>
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
                        <form class="form-horizontal" action="{{ route($url, $soal->soal_id ?? null) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($soal))
                            @method('put')
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kategori Soal</label>
                                            <select
                                                class="custom-select select2bs4 @error('soal_kategori_id') {{ 'is-invalid' }} @enderror"
                                                name="soal_kategori_id" id="soal_kategori_id">
                                                <option value="">-- Pilih --</option>
                                                @foreach($kategori_soal as $ktg)
                                                <option value="{{ $ktg->kategori_id }}">{{ $ktg->kategori_soal }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @if( old('soal_kategori_id') != '' )
                                            <script>
                                                document.getElementById('soal_kategori_id').value =
                                                    "{{ old('soal_kategori_id') }}"

                                            </script>
                                            @endif
                                            @if(isset($soal))
                                            <script>
                                                document.getElementById('soal_kategori_id').value =
                                                    '<?php echo $soal->soal_kategori_id ?>'
                                            </script>
                                            @endif
                                            @error('soal_kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" id="soal_mapel_id_div" style="display : none;">
                                            <label>Mata Pelajaran</label>
                                            <select
                                                class="custom-select select2bs4 @error('soal_mapel_id') {{ 'is-invalid' }} @enderror"
                                                name="soal_mapel_id" id="soal_mapel_id">
                                                <option value="0">-- Pilih --</option>
                                                @foreach($mapel as $mpl)
                                                <option value="{{ $mpl->mapel_id }}">{{ $mpl->mapel_kategori }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @if( old('soal_mapel_id') != '' )
                                            <script>
                                                document.getElementById('soal_mapel_id').value =
                                                    "{{ old('soal_mapel_id') }}"

                                            </script>
                                            @endif
                                            @if(isset($soal))
                                            <script>
                                                document.getElementById('soal_mapel_id').value =
                                                    '<?php echo $soal->soal_mapel_id ?>'
                                            </script>
                                            @endif
                                            @error('soal_mapel_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" id="soal_submapel_id_div" style="display : none;">
                                            <label>Sub Mata Pelajaran</label>
                                            <select
                                                class="custom-select select2bs4 @error('soal_submapel_id') {{ 'is-invalid' }} @enderror"
                                                name="soal_submapel_id" id="soal_submapel_id">
                                                <option value="0">-- Pilih --</option>
                                            </select>

                                            @if( old('soal_submapel_id') != '' )
                                            <script>
                                                document.getElementById('soal_submapel_id').value =
                                                    "{{ old('soal_submapel_id') }}"

                                            </script>
                                            @endif
                                            @if(isset($soal))
                                            <script>
                                                document.getElementById('soal_submapel_id').value =
                                                    '<?php echo $soal->soal_submapel_id ?>'
                                            </script>
                                            @endif
                                            @error('soal_submapel_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipe Soal</label>
                                            <select
                                                class="custom-select select2bs4 @error('soal_ujian_tipe') {{ 'is-invalid' }} @enderror"
                                                name="soal_ujian_tipe" id="soal_ujian_tipe">
                                                <option value="">-- Pilih --</option>
                                                <option value="text">Text</option>
                                                <option value="file">Foto</option>
                                            </select>

                                            @if( old('soal_ujian_tipe') != '' )
                                            <script>
                                                document.getElementById('soal_ujian_tipe').value =
                                                    "{{ old('soal_ujian_tipe') }}"
                                            </script>
                                            @endif
                                            @if(isset($soal))
                                            <script>
                                                document.getElementById('soal_ujian_tipe').value =
                                                    '<?php echo $soal->soal_ujian_tipe ?>'
                                            </script>
                                            @endif
                                            @error('soal_ujian_tipe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipe Jawaban</label>
                                            <select
                                                class="custom-select select2bs4 @error('soal_pilihan_tipe') {{ 'is-invalid' }} @enderror"
                                                name="soal_pilihan_tipe" id="soal_pilihan_tipe">
                                                <option value="">-- Pilih --</option>
                                                <option value="text">Text</option>
                                                <option value="file">Foto</option>
                                            </select>

                                            @if( old('soal_pilihan_tipe') != '' )
                                            <script>
                                                document.getElementById('soal_pilihan_tipe').value =
                                                    "{{ old('soal_pilihan_tipe') }}"

                                            </script>
                                            @endif
                                            @if(isset($soal))
                                            <script>
                                                document.getElementById('soal_pilihan_tipe').value =
                                                    '<?php echo $soal->soal_pilihan_tipe ?>'
                                            </script>
                                            @endif
                                            @error('soal_pilihan_tipe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="soal_ujian_div">

                                    </div>
                                    <div class="col-md-12" id="soal_jawaban_div">

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

<script>

    $('#soal_kategori_id').change(function (e) { 
        e.preventDefault();
        let id_kategori = this.value;
        if(id_kategori == '1'){
            $('#soal_mapel_id_div').attr('style', 'display : block');
            $('#soal_submapel_id_div').attr('style', 'display : block');
        }else{
            $('#soal_mapel_id_div').attr('style', 'display: none');
            $('#soal_submapel_id_div').attr('style', 'display: none');
        }
    });

    // cari data submapel
    $('#soal_mapel_id').change(function (e) { 
        e.preventDefault();
        let id = this.value
        axios.post('{{ route("soal.cariSubmapel") }}', {
            'id' : id
        }).then(function (res) { 
            var data = res.data.data;
            document.getElementById('soal_submapel_id').innerHTML = "<option value='0'>-- Pilih --</option>";
            for(var x = 0; x < data.length; x++)
            {
                document.getElementById("soal_submapel_id").innerHTML += "<option value='" + data[x].submapel_id + "'>" + data[x].submapel_kategori + "</option>";
            }
        }).catch(function (err) { 
            console.log(err);
        })
    });

    // tampilkan form soal
    $('#soal_ujian_tipe').change(function (e) { 
        e.preventDefault();
        var tipe = this.value;
        document.getElementById("soal_ujian_div").innerHTML = '';
        if(tipe == 'text'){
            document.getElementById("soal_ujian_div").innerHTML += `
            <div class="form-group"> 
                <label>Soal</label>
                <textarea class="form-control textarea @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" rows="10">{{ old('soal_ujian')  ??  $soal->soal_ujian ?? '' }}</textarea>
            </div>
            @error('soal_ujian')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror`;

            $('.textarea').summernote({
                height: 200
            });
        }else if(tipe == 'file'){
            document.getElementById("soal_ujian_div").innerHTML += `
            @if(isset($soal)) 
            <img src="{{ asset('images/soal/' .  $soal->soal_ujian) }}" style="height: 250px;">
            @endif
            <div class="form-group">
                <label>Soal</label>
                <input type="file" class="form-control @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" value="{{ old('soal_ujian')  ?? '' }}">
            </div>
            @error('soal_ujian')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror`;
        }
    });

    // tampilkan form jawaban
    $('#soal_pilihan_tipe').change(function (e) { 
        e.preventDefault();
        var tipe = this.value;
        document.getElementById("soal_jawaban_div").innerHTML = '';
        if(tipe == 'text'){
            document.getElementById("soal_jawaban_div").innerHTML += ` 

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilihan A</label>
                        <textarea class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" rows="10">{{ old('soal_a')  ?? $soal->soal_a ?? '' }}</textarea>
                    </div>
                    @error('soal_a')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilihan B</label>
                        <textarea class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" rows="10">{{ old('soal_b')  ?? $soal->soal_b ?? '' }}</textarea>
                    </div>
                    @error('soal_b')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilihan C</label>
                        <textarea class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" rows="10">{{ old('soal_c')  ?? $soal->soal_c ?? '' }}</textarea>
                    </div>
                    @error('soal_c')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilihan D</label>
                        <textarea class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" rows="10">{{ old('soal_d')  ?? $soal->soal_d ?? '' }}</textarea>
                    </div>
                    @error('soal_d')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilihan E</label>
                        <textarea class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" rows="10">{{ old('soal_e')  ?? $soal->soal_e ?? '' }}</textarea>
                    </div>
                    @error('soal_e')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <table class="table table-bordered">
                            <tr>
                                <td>A</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                    @error('skorsoal_a')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>

                            </tr>
                            <tr>
                                <td>B</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                    @error('skorsoal_b')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                    @error('skorsoal_c')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                    @error('skorsoal_d')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>E</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                    @error('skorsoal_e')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>      
            `;

            $('.textarea').summernote({
                height: 200
            });
            $('.number').keyup(function (e) { 
                this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
            });
        }else if(tipe == 'file'){
            document.getElementById("soal_jawaban_div").innerHTML += `

            <div class="row">
                <div class="col-md-6">
                    @if(isset($soal)) 
                    <img src="{{ asset('images/soal/' .  $soal->soal_a) }}" style="height: 250px;">
                    @endif
                    <div class="form-group">
                        <label>Pilihan A</label>
                        <input type="file" class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" value="{{ old('soal_a')  ?? '' }}">
                    </div>
                    @error('soal_a')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    @if(isset($soal)) 
                    <img src="{{ asset('images/soal/' .  $soal->soal_b) }}" style="height: 250px;">
                    @endif
                    <div class="form-group">
                        <label>Pilihan B</label>
                        <input type="file" class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" value="{{ old('soal_b')  ?? '' }}">
                    </div>
                    @error('soal_b')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    @if(isset($soal)) 
                    <img src="{{ asset('images/soal/' .  $soal->soal_c) }}" style="height: 250px;">
                    @endif
                    <div class="form-group">
                        <label>Pilihan C</label>
                        <input type="file" class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" value="{{ old('soal_c')  ?? '' }}">
                    </div>
                    @error('soal_c')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    @if(isset($soal)) 
                    <img src="{{ asset('images/soal/' .  $soal->soal_d) }}" style="height: 250px;">
                    @endif
                    <div class="form-group">
                        <label>Pilihan D</label>
                        <input type="file" class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" value="{{ old('soal_d')  ?? '' }}">
                    </div>
                    @error('soal_d')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    @if(isset($soal)) 
                    <img src="{{ asset('images/soal/' .  $soal->soal_e) }}" style="height: 250px;">
                    @endif
                    <div class="form-group">
                        <label>Pilihan E</label>
                        <input type="file" class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" value="{{ old('soal_e')  ?? '' }}">
                    </div>
                    @error('soal_e')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <table class="table table-bordered">
                            <tr>
                                <td>A</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                    @error('skorsoal_a')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>

                            </tr>
                            <tr>
                                <td>B</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                    @error('skorsoal_b')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                    @error('skorsoal_c')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                    @error('skorsoal_d')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>E</td>
                                <td>
                                    <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                    @error('skorsoal_e')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            `;
            $('.number').keyup(function (e) { 
                this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
            });
        }
    });

</script>

@if(count($errors) > 0)
    <script>
        $(document).ready(function () {
            
            @if(isset($soal))
            // cari data submapel jika add submapel
            let id = $('#soal_mapel_id').val();
            axios.post('{{ route("soal.cariSubmapel") }}', {
                'id' : id
            }).then(function (res) { 
                var data = res.data.data;
                document.getElementById('soal_submapel_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                for(var x = 0; x < data.length; x++)
                {
                    document.getElementById("soal_submapel_id").innerHTML += "<option value='" + data[x].submapel_id + "'>" + data[x].submapel_kategori + "</option>";
                }
                document.getElementById("soal_submapel_id").value = '{{ $soal->soal_submapel_id }}'
            }).catch(function (err) { 
                console.log(err);
            });
            
            @elseif(count($errors) > 0)
            // cari data submapel jika add submapel
            let id = $('#soal_mapel_id').val();
            axios.post('{{ route("soal.cariSubmapel") }}', {
                'id' : id
            }).then(function (res) { 
                var data = res.data.data;
                document.getElementById('soal_submapel_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                for(var x = 0; x < data.length; x++)
                {
                    document.getElementById("soal_submapel_id").innerHTML += "<option value='" + data[x].submapel_id + "'>" + data[x].submapel_kategori + "</option>";
                }
                document.getElementById("soal_submapel_id").value = '{{ old("soal_submapel_id") }}'
            }).catch(function (err) { 
                console.log(err);
            });
            @else
            // cari data submapel
            $('#soal_mapel_id').change(function (e) { 
                e.preventDefault();
                let id = this.value
                axios.post('{{ route("soal.cariSubmapel") }}', {
                    'id' : id
                }).then(function (res) { 
                    var data = res.data.data;
                    document.getElementById('soal_submapel_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                    for(var x = 0; x < data.length; x++)
                    {
                        document.getElementById("soal_submapel_id").innerHTML += "<option value='" + data[x].submapel_id + "'>" + data[x].submapel_kategori + "</option>";
                    }
                }).catch(function (err) { 
                    console.log(err);
                })
            });
            @endif


            // tampilkan form soal
            var tipe = $('#soal_ujian_tipe').val();
            // document.getElementById("soal_ujian_div").innerHTML = '';
            if(tipe == 'text'){
                document.getElementById("soal_ujian_div").innerHTML += `
                <div class="form-group"> 
                    <label>Soal</label>
                    <textarea class="form-control textarea @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" rows="10">{{ old('soal_ujian')  ??  $soal->soal_ujian ?? '' }}</textarea>
                </div>
                @error('soal_ujian')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror`;

                $('.textarea').summernote({
                    height: 200
                });
            }else if(tipe == 'file'){
                document.getElementById("soal_ujian_div").innerHTML += `
                @if(isset($soal))
                <img src="{{ asset('images/soal/' . $soal->soal_ujian) }}" style="height: 250px;">
                @endif 
                <div class="form-group">
                    <label>Soal</label>
                    <input type="file" class="form-control @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" value="{{ old('soal_ujian')  ?? '' }}">
                </div>
                @error('soal_ujian')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror`;
            }

            // tampilkan form jawaban
            var tipe2 = $('#soal_pilihan_tipe').val()
            // document.getElementById("soal_jawaban_div").innerHTML = '';
            if(tipe2 == 'text'){
                document.getElementById("soal_jawaban_div").innerHTML += ` 

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan A</label>
                            <textarea class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" rows="10">{{ old('soal_a')  ?? $soal->soal_a ?? '' }}</textarea>
                        </div>
                        @error('soal_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan B</label>
                            <textarea class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" rows="10">{{ old('soal_b')  ?? $soal->soal_b ?? '' }}</textarea>
                        </div>
                        @error('soal_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan C</label>
                            <textarea class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" rows="10">{{ old('soal_c')  ?? $soal->soal_c ?? '' }}</textarea>
                        </div>
                        @error('soal_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan D</label>
                            <textarea class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" rows="10">{{ old('soal_d')  ?? $soal->soal_d ?? '' }}</textarea>
                        </div>
                        @error('soal_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan E</label>
                            <textarea class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" rows="10">{{ old('soal_e')  ?? $soal->soal_e ?? '' }}</textarea>
                        </div>
                        @error('soal_e')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <table class="table table-bordered">
                                <tr>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                        @error('skorsoal_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                        @error('skorsoal_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                        @error('skorsoal_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                        @error('skorsoal_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                        @error('skorsoal_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>              
                `;

                $('.invalid-feedback').css('display', 'block');

                $('.number').keyup(function (e) { 
                    this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
                });
            }else if(tipe2 == 'file'){
                document.getElementById("soal_jawaban_div").innerHTML += `

                <div class="row">
                    <div class="col-md-6">
                        @if(isset($soal))
                        <img src="{{ asset('images/soal/' . $soal->soal_a) }}" style="height: 250px;">
                        @endif 
                        <div class="form-group">
                            <label>Pilihan A</label>
                            <input type="file" class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" value="{{ old('soal_a')  ?? '' }}">
                        </div>
                        @error('soal_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if(isset($soal))
                        <img src="{{ asset('images/soal/' . $soal->soal_b) }}" style="height: 250px;">
                        @endif 
                        <div class="form-group">
                            <label>Pilihan B</label>
                            <input type="file" class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" value="{{ old('soal_b')  ?? '' }}">
                        </div>
                        @error('soal_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if(isset($soal))
                        <img src="{{ asset('images/soal/' . $soal->soal_c) }}" style="height: 250px;">
                        @endif 
                        <div class="form-group">
                            <label>Pilihan C</label>
                            <input type="file" class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" value="{{ old('soal_c')  ?? '' }}">
                        </div>
                        @error('soal_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if(isset($soal))
                        <img src="{{ asset('images/soal/' . $soal->soal_d) }}" style="height: 250px;">
                        @endif 
                        <div class="form-group">
                            <label>Pilihan D</label>
                            <input type="file" class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" value="{{ old('soal_d')  ?? '' }}">
                        </div>
                        @error('soal_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if(isset($soal))
                        <img src="{{ asset('images/soal/' . $soal->soal_e) }}" style="height: 250px;">
                        @endif 
                        <div class="form-group">
                            <label>Pilihan E</label>
                            <input type="file" class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" value="{{ old('soal_e')  ?? '' }}">
                        </div>
                        @error('soal_e')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <table class="table table-bordered">
                                <tr>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                        @error('skorsoal_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                        @error('skorsoal_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                        @error('skorsoal_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                        @error('skorsoal_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                        @error('skorsoal_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                `;
                $('.invalid-feedback').css('display', 'block');

                $('.number').keyup(function (e) { 
                    this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
                });
            }

        });
    </script>
@elseif(isset($soal))
    <script>
        $(document).ready(function () {
            let id_kategori = $('#soal_kategori_id').val();
            if(id_kategori == '1'){
                $('#soal_mapel_id_div').attr('style', 'display : block');
                $('#soal_submapel_id_div').attr('style', 'display : block');
            }else{
                $('#soal_mapel_id_div').attr('style', 'display: none');
                $('#soal_submapel_id_div').attr('style', 'display: none');
            }

            // cari data submapel
            let id = $('#soal_mapel_id').val();
            axios.post('{{ route("soal.cariSubmapel") }}', {
                'id' : id
            }).then(function (res) { 
                var data = res.data.data;
                document.getElementById('soal_submapel_id').innerHTML = "<option value='0'>-- Pilih --</option>";
                for(var x = 0; x < data.length; x++)
                {
                    document.getElementById("soal_submapel_id").innerHTML += "<option value='" + data[x].submapel_id + "'>" + data[x].submapel_kategori + "</option>";
                }
                document.getElementById("soal_submapel_id").value = '{{ $soal->soal_submapel_id }}'
            }).catch(function (err) { 
                console.log(err);
            });

            // tampilkan form soal
            var tipe = $('#soal_ujian_tipe').val();
            // document.getElementById("soal_ujian_div").innerHTML = '';
            if(tipe == 'text'){
                document.getElementById("soal_ujian_div").innerHTML += `
                <div class="form-group"> 
                    <label>Soal</label>
                    <textarea class="form-control textarea @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" rows="10">{{ old('soal_ujian')  ??  $soal->soal_ujian ?? '' }}</textarea>
                </div>
                @error('soal_ujian')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror`;

                $('.textarea').summernote({
                    height: 200
                });
            }else if(tipe == 'file'){
                document.getElementById("soal_ujian_div").innerHTML += ` 
                <img src="{{ asset('images/soal/' . $soal->soal_ujian) }}" style="height: 250px;">
                <div class="form-group">
                    <label>Soal</label>
                    <input type="file" class="form-control @error('soal_ujian') {{ 'is-invalid' }} @enderror" name="soal_ujian" id="soal_ujian" value="{{ old('soal_ujian')  ?? '' }}">
                </div>
                @error('soal_ujian')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror`;
            }

            // tampilkan form jawaban
            var tipe2 = $('#soal_pilihan_tipe').val()
            // document.getElementById("soal_jawaban_div").innerHTML = '';
            if(tipe2 == 'text'){
                document.getElementById("soal_jawaban_div").innerHTML += ` 

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan A</label>
                            <textarea class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" rows="10">{{ old('soal_a')  ?? $soal->soal_a ?? '' }}</textarea>
                        </div>
                        @error('soal_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan B</label>
                            <textarea class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" rows="10">{{ old('soal_b')  ?? $soal->soal_b ?? '' }}</textarea>
                        </div>
                        @error('soal_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan C</label>
                            <textarea class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" rows="10">{{ old('soal_c')  ?? $soal->soal_c ?? '' }}</textarea>
                        </div>
                        @error('soal_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan D</label>
                            <textarea class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" rows="10">{{ old('soal_d')  ?? $soal->soal_d ?? '' }}</textarea>
                        </div>
                        @error('soal_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan E</label>
                            <textarea class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" rows="10">{{ old('soal_e')  ?? $soal->soal_e ?? '' }}</textarea>
                        </div>
                        @error('soal_e')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <table class="table table-bordered">
                                <tr>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                        @error('skorsoal_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                        @error('skorsoal_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                        @error('skorsoal_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                        @error('skorsoal_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                        @error('skorsoal_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                
                `;

                $('.invalid-feedback').css('display', 'block');

                $('.number').keyup(function (e) { 
                    this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
                });
            }else if(tipe2 == 'file'){
                document.getElementById("soal_jawaban_div").innerHTML += `

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/soal/' . $soal->soal_a) }}" style="height: 250px;">
                        <div class="form-group">
                            <label>Pilihan A</label>
                            <input type="file" class="form-control @error('soal_a') {{ 'is-invalid' }} @enderror" name="soal_a" id="soal_a" value="{{ old('soal_a')  ?? '' }}">
                        </div>
                        @error('soal_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/soal/' . $soal->soal_b) }}" style="height: 250px;">
                        <div class="form-group">
                            <label>Pilihan B</label>
                            <input type="file" class="form-control @error('soal_b') {{ 'is-invalid' }} @enderror" name="soal_b" id="soal_b" value="{{ old('soal_b')  ?? '' }}">
                        </div>
                        @error('soal_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/soal/' . $soal->soal_c) }}" style="height: 250px;">
                        <div class="form-group">
                            <label>Pilihan C</label>
                            <input type="file" class="form-control @error('soal_c') {{ 'is-invalid' }} @enderror" name="soal_c" id="soal_c" value="{{ old('soal_c')  ?? '' }}">
                        </div>
                        @error('soal_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/soal/' . $soal->soal_d) }}" style="height: 250px;">
                        <div class="form-group">
                            <label>Pilihan D</label>
                            <input type="file" class="form-control @error('soal_d') {{ 'is-invalid' }} @enderror" name="soal_d" id="soal_d" value="{{ old('soal_d')  ?? '' }}">
                        </div>
                        @error('soal_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/soal/' . $soal->soal_e) }}" style="height: 250px;">
                        <div class="form-group">
                            <label>Pilihan E</label>
                            <input type="file" class="form-control @error('soal_e') {{ 'is-invalid' }} @enderror" name="soal_e" id="soal_e" value="{{ old('soal_e')  ?? '' }}">
                        </div>
                        @error('soal_e')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <table class="table table-bordered">
                                <tr>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_a') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_a" value="{{ old('skorsoal_a')  ?? $soal->skorsoal_a ?? '' }}">
                                        @error('skorsoal_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_b') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_b" value="{{ old('skorsoal_b')  ?? $soal->skorsoal_b ?? '' }}">
                                        @error('skorsoal_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_c') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_c"  value="{{ old('skorsoal_c')  ?? $soal->skorsoal_c ?? '' }}">
                                        @error('skorsoal_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_d') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_d" value="{{ old('skorsoal_d')  ?? $soal->skorsoal_d ?? '' }}">
                                        @error('skorsoal_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>
                                        <input type="text" class="form-control number @error('skorsoal_e') {{ 'is-invalid' }} @enderror" placeholder="Masukkan bobot" name="skorsoal_e" value="{{ old('skorsoal_e')  ?? $soal->skorsoal_e ?? '' }}">
                                        @error('skorsoal_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                `;
                $('.invalid-feedback').css('display', 'block');

                $('.number').keyup(function (e) { 
                    this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');
                });
            }

        });
    </script>
@endif

<!-- /.content -->
@endsection
