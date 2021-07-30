@extends('frontend/index')
@section('content')
    <div class="container">
        <div id="form-resgister" class="card mx-auto">
            <div class="card-body">
                <center>
                    <label id="label-login" for="">Register CAT</label>
                </center>
                <hr>
                <form action="{{route('regis')}}" method="POST">
                    @csrf
                    <label for="">Nik</label>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Nik" name="user_nik" id="user_nik" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        </div>
                    </div>
                    <label for="">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Nama" name="user_nama" id="user_nama" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                    </div>
                    <label for="">No. Hp</label>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="No. Hp" name="user_no_hp" id="user_no_hp" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                    </div>
                    <label for="">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" placeholder="Email" name="user_email" id="user_email" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    </div>
                    <label for="">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="Password" name="user_password" id="user_password" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                    </div>
                    <label for="">Ulangi Password</label>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="Ulangi Password" name="user_password1" id="user_password1" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    <div align="right">
                        <button id="btn-login" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#user').val('')
            $('#pass').val('')
        })
    </script>
@endsection