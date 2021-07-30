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
    @include('backend/script')  
    <div class="row" style="margin:5px;">  
        @yield('content')
    </div>
    
</body>

</html>
