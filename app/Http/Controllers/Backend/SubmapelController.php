<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SubMapel;
use App\Mapel;
use DB;

class SubmapelController extends Controller
{
    public function index()
    {
        $submapel = DB::table('tb_submapel')
                    ->join('tb_mapel', 'tb_mapel.mapel_id', '=','tb_submapel.submapel_mapel_id')
                    ->get();

        return view('backend/pages/submapel/index',[
            'active' => 'submapel',
            'submapel' => $submapel,
        ]);
    }

    public function create()
    {
        $mapel = Mapel::all();
        return view('backend/pages/submapel/form',[
            'active' => 'submapel',
            'url' => 'submapel',
            'mapel' => $mapel,
        ]);
    }

    public function store(Request $request, SubMapel $submapel)
    {
        $validator = Validator::make($request->all(), [
            'submapel_mapel_id'         => 'required',
            'submapel_kategori'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('submapel.create')
                ->withErrors($validator)
                ->withInput();
        }

        $submapel->submapel_mapel_id = $request->input('submapel_mapel_id');
        $submapel->submapel_kategori = $request->input('submapel_kategori');
        $submapel->save();

        return redirect()
            ->route('submapel')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(SubMapel $submapel)
    {
        $mapel = Mapel::all();
        return view(
            'backend/pages/submapel/form',
            [
                'active' => 'submapel',
                'url' => 'submapel.update',
                'submapel' => $submapel,
                'mapel' => $mapel,
            ]
        );
    }

    public function update(Request $request, SubMapel $submapel)
    {
        $validator = Validator::make($request->all(), [
            'submapel_mapel_id'         => 'required',
            'submapel_kategori'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('submapel.update', $submapel->submapel_id)
                ->withErrors($validator)
                ->withInput();
        }

        $submapel->submapel_mapel_id = $request->input('submapel_mapel_id');
        $submapel->submapel_kategori = $request->input('submapel_kategori');
        $submapel->save();

        return redirect()
            ->route('submapel')
            ->with('message', 'Data berhasil diedit');
    
    }

    public function destroy(SubMapel $submapel)
    {

        $submapel->forceDelete();

        return redirect()
            ->route('submapel')
            ->with('message', 'Data berhasil dihapus');
    }
}
