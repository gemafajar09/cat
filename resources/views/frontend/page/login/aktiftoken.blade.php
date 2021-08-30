@extends('frontend/index')
@section('content')
<div class="col-md-12">
    @include('frontend/navbar')
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header bg-primary text-white">
                    Data Peserta
                </div>
                <div class="card-body">
                    <label for="">Nama</label>
                    <input type="text" readonly value="{{session('user_nama')}}" class="form-control">
                    <label for="">NIK</label>
                    <input type="text" readonly value="{{session('user_nik')}}" class="form-control">
                    <label for="">Durasi</label>
                    <input type="text" readonly value="120 Menit" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header bg-primary text-white">
                    Mulai Ujian
                </div>
                <div class="card-body">
                    <div class="alert alert-primary">
                        <p>Silahkan Masukan Token Ujian Untuk Memulai Ujian</p>
                    </div>
                    <form action="{{route('ujian-mulai')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="token" class="form-control" placeholder="Inputkan Token">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('pesan') == true)
    <script>
        toast.success('<?= session('pesan') ?>')
    </script>
@endif
@if(session('error') == true)
    <script>
        toast.error('<?= session('error') ?>')
    </script>
@endif
@endsection