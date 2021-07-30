<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend/page/login/aktiftoken');
    }

    public function mulaiujian()
    {
        return view('frontend/page/ujian/index');
    }

    public function isisoal($link)
    {
        return view('frontend/page/ujian/'.$link);
    }
}
