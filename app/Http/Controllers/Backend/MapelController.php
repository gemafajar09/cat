<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mapel;
use DB;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        return view('backend/pages/mapel/index',[
            'active' => 'mapel',
            'mapel' => $mapel,
        ]);
    }

    public function create()
    {
        return view('backend/pages/mapel/form',[
            'active' => 'mapel',
            'url' => 'mapel',
        ]);
    }

    public function store(Request $request, Mapel $mapel)
    {
        $validator = Validator::make($request->all(), [
            'mapel_kategori'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('mapel.create')
                ->withErrors($validator)
                ->withInput();
        }

        $mapel->mapel_kategori = $request->input('mapel_kategori');
        $mapel->save();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(Mapel $mapel)
    {
        return view(
            'backend/pages/mapel/form',
            [
                'active' => 'mapel',
                'mapel' => $mapel,
                'url' => 'mapel.update',
            ]
        );
    }

    public function update(Request $request, Mapel $mapel)
    {
        $validator = Validator::make($request->all(), [
            'mapel_kategori'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('mapel.update', $mapel->kategori_id)
                ->withErrors($validator)
                ->withInput();
        }

        $mapel->mapel_kategori = $request->input('mapel_kategori');
        $mapel->save();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(Mapel $mapel)
    {

        $mapel->forceDelete();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil dihapus');
    }
}
