@extends('frontend/index')
@section('content')
    <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <a class="navbar-brand" href="#">
            <b>Selamat Datang</b>
        </a>
    </nav>
    </div>
    <div class="col-md-8 py-5">
        <div class="card card-default">
            <div class="card-header">
                Data Peserta
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <p>
                        Jika semua data subah betul atau benar silahkan inputkan token yang di dapat untuk melanjutkan ujian
                    </p>
                </div>
                <label for="">Nama</label>
                <input type="text" readonly value="Gema Fajar Ramadhan" class="form-control">
                <label for="">NIK</label>
                <input type="text" readonly value="1371110402960004" class="form-control">
                <label for="">Durasi</label>
                <input type="text" readonly value="120 Menit" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-4 py-5">
        <div class="card card-default">
            <div class="card-header">
                Mulai Ujian
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <p>Silahkan MAsukan Token Ujian Untuk Memulai Ujian</p>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Inputkan Token">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection