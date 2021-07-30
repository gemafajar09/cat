@extends('frontend/index')
@section('content')
    <div class="container">
        <div id="form-login" class="card mx-auto">
            <div class="card-body">
                <center>
                    <label id="label-login" for="">Login CAT</label>
                </center>
                <hr>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <label for="">NIK</label>
                    <div class="input-group mb-3">
                        <input type="number" placeholder="NIK" name="user_nik" id="user_nik" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        </div>
                    </div>
                    <label for="">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="Password" name="user_password" id="user_password" class="form-control">
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
    @if(session('pesan') == true)
        <script>
            alert('<?= session('pesan') ?>')
        </script>
    @endif
    @if(session('error') == true)
        <script>
            alert('<?= session('error') ?>')
        </script>
    @endif

    <script>
        $(document).ready(function(){
            $('#user').val('')
            $('#pass').val('')
        })
    </script>
@endsection