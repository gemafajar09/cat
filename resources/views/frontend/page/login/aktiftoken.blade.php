@extends('frontend/index')
@section('content')
    <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <a class="navbar-brand" href="#">
            <b>Selamat Datang : {{session('user_nama')}}</b>
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-cog" style="color:white"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('keluar')  }}" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
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
                <input type="text" readonly value="{{session('user_nama')}}" class="form-control">
                <label for="">NIK</label>
                <input type="text" readonly value="{{session('user_nik')}}" class="form-control">
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
@endsection