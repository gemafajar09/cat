<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\KategoriSoal;
use DB;

class KategoriSoalController extends Controller
{
    public function index()
    {
        $kategori_soal = KategoriSoal::all();
        return view('backend/pages/kategori-soal/index',[
            'active' => 'kategori-soal',
            'kategori_soal' => $kategori_soal,
        ]);
    }

    public function create()
    {
        return view('backend/pages/kategori-soal/form',[
            'active' => 'kategori-soal',
            'url' => 'kategori-soal',
        ]);
    }

    public function store(Request $request, KategoriSoal $kategori_soal)
    {
        $validator = Validator::make($request->all(), [
            'kategori_soal'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kategori-soal.create')
                ->withErrors($validator)
                ->withInput();
        }

        $kategori_soal->kategori_soal = $request->input('kategori_soal');
        $kategori_soal->save();

        return redirect()
            ->route('kategori-soal')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(KategoriSoal $kategori_soal)
    {
        return view(
            'backend/pages/kategori-soal/form',
            [
                'active' => 'kategori-soal',
                'kategori_soal' => $kategori_soal,
                'url' => 'kategori-soal.update',
            ]
        );
    }

    public function update(Request $request, KategoriSoal $kategori_soal)
    {
        $validator = Validator::make($request->all(), [
            'kategori_soal'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kategori-soal.update', $kategori_soal->kategori_id)
                ->withErrors($validator)
                ->withInput();
        }

        $kategori_soal->kategori_soal = $request->input('kategori_soal');
        $kategori_soal->save();

        return redirect()
            ->route('kategori-soal')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(KategoriSoal $kategori_soal)
    {

        $kategori_soal->forceDelete();

        return redirect()
            ->route('kategori-soal')
            ->with('message', 'Data berhasil dihapus');
    }
}
