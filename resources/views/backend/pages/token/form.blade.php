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
                                <li class="breadcrumb-item"><a href="#">SWIMOC CAT</a></li>
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
                                    <h3 class="card-title"><a class="btn btn-primary btn-sm text-white" href="{{ route('token') }}"><i class="fa fa-arrow-left"></i> Back</a></h3>
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
                                    <form class="form-horizontal" action="{{ route($url, $token->token_id ?? null) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($token))
                                        @method('put')
                                        @endif
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control @error('token_tanggal') {{ 'is-invalid' }} @enderror" name="token_tanggal" id="token_tanggal" value="{{ old('token_tanggal') ?? $token->token_tanggal ?? '' }}">
                                                @error('token_tanggal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jam</label>
                                                <input type="time" class="form-control @error('token_tanggal') {{ 'is-invalid' }} @enderror" name="token_jam" id="token_jam" value="{{ old('token_jam') ?? $token->token_jam ?? '' }}">
                                                @error('token_jam')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label style="width: 100%;">Token
                                                <a class="btn btn-info btn-sm" onclick="generate_pass()" style="float: right !important;">Generate Token !</a>
                                                </label>
                                                <input type="text" class="form-control @error('token_key') {{ 'is-invalid' }} @enderror" name="token_key" id="token_key" value="{{ old('token_key') ?? $token->token_key ?? '' }}">
                                                @if(isset($user))
                                                <span style="color:red;"><i>*Abaikan jika tidak mengganti password</i></span>
                                                @endif
                                                @error('token_key')
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
            <script>
                function generate_pass() {  
                    var randPassword = Array(8).fill("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz").map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
                    $('#token_key').val(randPassword);
                }
            </script>

@endsection