<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Selamat Ujian</title>

    @include('frontend/header')
</head>

<body>
    @include('frontend/script')  
    @if(session('pesan') == TRUE)
        <script>
            alert("{{session('pesan')}}")
        </script>
    @endif
    <div class="row">  
        @yield('content')
    </div>
    <!-- pesan -->
    @if(Session::has('pesan'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {!! Session::get('pesan')!!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {!! Session::get('error')!!}
        </div>
    @endif
</body>

</html>
