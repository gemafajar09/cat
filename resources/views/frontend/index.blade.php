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
    <div class="row">  
        @yield('content')
    </div>
</body>

</html>
