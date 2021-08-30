<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mapel;
use App\KategoriSoal;
use App\Soal;
use App\SoalSkor;
use DB;
use DataTables;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    public function index()
    {
        $soal = DB::table('tb_kategori_soal')
                ->leftJoin('tb_master_soal', 'tb_master_soal.soal_kategori_id', 'tb_kategori_soal.kategori_id')
                ->select(DB::raw('COUNT(tb_master_soal.soal_kategori_id) as total_soal'), 'tb_kategori_soal.*')
                ->groupBy('tb_kategori_soal.kategori_id')
                ->get();

        return view('backend/pages/soal/index',[
            'active' => 'soal',
            'soal' => $soal,
        ]);
    }

    public function create($id)
    {
        $kategori_soal = KategoriSoal::all();
        $mapel = Mapel::all();
        
        return view('backend/pages/soal/form',[
            'active' => 'soal',
            'url' => 'soal.store',
            'kategori_soal' => $kategori_soal,
            'kategori_id' => $id,
        ]);
    }

    public function store(Request $request, Soal $soal, SoalSkor $skorsoal)
    {
        $validator = Validator::make($request->all(), [
            'soal_kategori_id'   => 'required',
            'soal_ujian_tipe'    => 'required',
            'soal_pilihan_tipe'  => 'required',
            'soal_ujian'         => 'required',
                'soal_a'         => 'required',
                'soal_b'         => 'required',
                'soal_c'         => 'required',
                'soal_d'         => 'required',
                'soal_e'         => 'required',
            'skorsoal_a'         => 'required|numeric',
            'skorsoal_b'         => 'required|numeric',
            'skorsoal_c'         => 'required|numeric',
            'skorsoal_d'         => 'required|numeric',
            'skorsoal_e'         => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->input('soal_ujian_tipe')  == 'text'){
            $soal->soal_ujian = $request->input('soal_ujian'); 
        }elseif($request->input('soal_ujian_tipe')  == 'file'){
            $validator = Validator::make($request->all(), [
                'soal_ujian'         => 'required|image:jpg,png,jpeg,mp3,mp4,'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $foto = $request->file('soal_ujian');
            $filename = time() . "-soal." . $foto->getClientOriginalExtension();
            $foto->move('upload/gambar/', $filename);
            $soal->soal_ujian = $filename;
        }elseif($request->input('soal_ujian_tipe')  == 'audio'){
            $validator = Validator::make($request->all(), [
                'soal_ujian'         => 'required|image:jpg,png,jpeg,mp3,mp4',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $audio = $request->file('soal_ujian');
            $filename = time() . "-soal." . $audio->getClientOriginalExtension();
            $audio->move('upload/audio/', $filename);
            $soal->soal_ujian = $filename;
        }

        if($request->input('soal_pilihan_tipe')  == 'text'){
            $soal->soal_a = $request->input('soal_a');
            $soal->soal_b = $request->input('soal_b');
            $soal->soal_c = $request->input('soal_c');
            $soal->soal_d = $request->input('soal_d');
            $soal->soal_e = $request->input('soal_e');
        }else{
            $validator = Validator::make($request->all(), [
                'soal_a'         => 'image:jpg,png,jpeg,mp3,mp4',
                'soal_b'         => 'image:jpg,png,jpeg,mp3,mp4',
                'soal_c'         => 'image:jpg,png,jpeg,mp3,mp4',
                'soal_d'         => 'image:jpg,png,jpeg,mp3,mp4',
                'soal_e'         => 'image:jpg,png,jpeg,mp3,mp4',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // soal A
            $audioA = $request->file('soal_a');
            $fileA = time() . "-soal-a." . $audioA->getClientOriginalExtension();
            $audioA->move('upload/audio/', $fileA);
            $soal->soal_a = $fileA;
            // soal B
            $audioB = $request->file('soal_b');
            $fileB = time() . "-soal-b." . $audioB->getClientOriginalExtension();
            $audioB->move('upload/audio/', $fileB);
            $soal->soal_b = $fileB;
            // soal C
            $audioC = $request->file('soal_c');
            $fileC = time() . "-soal-c." . $audioC->getClientOriginalExtension();
            $audioC->move('upload/audio/', $fileC);
            $soal->soal_c = $fileC;
            // soal D
            $audioD = $request->file('soal_d');
            $fileD = time() . "-soal-d." . $audioD->getClientOriginalExtension();
            $audioD->move('upload/audio/', $fileD);
            $soal->soal_d = $fileD;
            // soal E
            $audioE = $request->file('soal_e');
            $fileE = time() . "-soal-e." . $audioE->getClientOriginalExtension();
            $audioE->move('upload/audio/', $fileE);
            $soal->soal_e = $fileE;
        }

        $soal->soal_kategori_id = $request->input('soal_kategori_id');
        $soal->soal_mapel_id = $request->input('soal_mapel_id');
        $soal->soal_submapel_id = $request->input('soal_submapel_id');
        $soal->soal_ujian_tipe = $request->input('soal_ujian_tipe');
        $soal->soal_pilihan_tipe = $request->input('soal_pilihan_tipe');
        $soal->save();

        $id = $soal->soal_id;

        $skorsoal->skorsoal_soal_id = $id;
        $skorsoal->skorsoal_a = $request->input('skorsoal_a');
        $skorsoal->skorsoal_b = $request->input('skorsoal_b');
        $skorsoal->skorsoal_c = $request->input('skorsoal_c');
        $skorsoal->skorsoal_d = $request->input('skorsoal_d');
        $skorsoal->skorsoal_e = $request->input('skorsoal_e');
        $skorsoal->save();

        return redirect()
            ->route('soal')
            ->with('message', 'Data berhasil ditambahkan');

    }

    public function edit($id)
    {
        $kategori_soal = KategoriSoal::all();
        $soal = DB::table('tb_master_soal')
                ->join('tb_skorsoal', 'tb_master_soal.soal_id', 'tb_skorsoal.skorsoal_soal_id')
                ->where('tb_master_soal.soal_id', $id)
                ->first();

        return view('backend/pages/soal/form',[
            'active' => 'soal',
            'url' => 'soal.update',
            'kategori_soal' => $kategori_soal,
            'soal' => $soal,
        ]);
    }

    public function update(Request $request, Soal $soal, SoalSkor $skorsoal)
    {
        $validator = Validator::make($request->all(), [
            'soal_kategori_id'         => 'required',
            'soal_ujian_tipe'         => 'required',
            'soal_pilihan_tipe'         => 'required',
            'skorsoal_a'         => 'required|numeric',
            'skorsoal_b'         => 'required|numeric',
            'skorsoal_c'         => 'required|numeric',
            'skorsoal_d'         => 'required|numeric',
            'skorsoal_e'         => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = $soal->soal_id;

        if($request->input('soal_ujian_tipe')  == 'text'){
            if($soal->soal_ujian_tipe == 'file'){
                unlink('upload/gambar/'. $soal->soal_ujian);
            }
            $soal->soal_ujian = $request->input('soal_ujian'); 
        }else{
            $validator = Validator::make($request->all(), [
                'soal_ujian'         => 'image:jpg,png,jpeg,mp3,mp4',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // hapus file lama
            if ($request->hasFile('soal_ujian')) {
                if($soal->soal_ujian_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_ujian);
                }
                $foto = $request->file('soal_ujian');
                $filename = time() . "-soal." . $foto->getClientOriginalExtension();
                $foto->move('upload/gambar/', $filename);
                $soal->soal_ujian = $filename;
            }
        }

        if($request->input('soal_pilihan_tipe')  == 'text'){
            if($soal->soal_pilihan_tipe == 'file'){
                unlink('upload/gambar/'. $soal->soal_a);
                unlink('upload/gambar/'. $soal->soal_b);
                unlink('upload/gambar/'. $soal->soal_c);
                unlink('upload/gambar/'. $soal->soal_d);
                unlink('upload/gambar/'. $soal->soal_e);
            }
            $soal->soal_a = $request->input('soal_a');
            $soal->soal_b = $request->input('soal_b');
            $soal->soal_c = $request->input('soal_c');
            $soal->soal_d = $request->input('soal_d');
            $soal->soal_e = $request->input('soal_e');
        }else{
            $validator = Validator::make($request->all(), [
                'soal_a'         => 'image:jpg,png,jpeg',
                'soal_b'         => 'image:jpg,png,jpeg',
                'soal_c'         => 'image:jpg,png,jpeg',
                'soal_d'         => 'image:jpg,png,jpeg',
                'soal_e'         => 'image:jpg,png,jpeg',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // soal A
            if ($request->hasFile('soal_a')) {
                // hapus file lama
                if($soal->soal_pilihan_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_a);
                }
                $fotoA = $request->file('soal_a');
                $filenameA = time() . "-soal-a." . $fotoA->getClientOriginalExtension();
                $fotoA->move('upload/gambar/', $filenameA);
                $soal->soal_a = $filenameA;
            }
            // soal B
            if ($request->hasFile('soal_b')) {
                // hapus file lama
                if($soal->soal_pilihan_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_b);
                }
                $fotoB = $request->file('soal_b');
                $filenameB = time() . "-soal-b." . $fotoB->getClientOriginalExtension();
                $fotoB->move('upload/gambar/', $filenameB);
                $soal->soal_b = $filenameB;
            }
            // soal C
            if ($request->hasFile('soal_c')) {
                // hapus file lama  
                if($soal->soal_pilihan_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_c);
                }

                $fotoC = $request->file('soal_c');
                $filenameC = time() . "-soal-c." . $fotoC->getClientOriginalExtension();
                $fotoC->move('upload/gambar/', $filenameC);
                $soal->soal_c = $filenameC;
            }
            // soal D
            if ($request->hasFile('soal_d')) {
                // hapus file lama  
                if($soal->soal_pilihan_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_d);
                }

                $fotoD = $request->file('soal_d');
                $filenameD = time() . "-soal-d." . $fotoD->getClientOriginalExtension();
                $fotoD->move('upload/gambar/', $filenameD);
                $soal->soal_d = $filenameD;
            }
            // soal E
            if ($request->hasFile('soal_e')) {
                // hapus file lama  
                if($soal->soal_pilihan_tipe == 'file'){
                    unlink('upload/gambar/'. $soal->soal_e);
                }

                $fotoE = $request->file('soal_e');
                $filenameE = time() . "-soal-e." . $fotoE->getClientOriginalExtension();
                $fotoE->move('upload/gambar/', $filenameE);
                $soal->soal_e = $filenameE;
            }
        }

        $soal->soal_kategori_id = $request->input('soal_kategori_id');
        $soal->soal_ujian_tipe = $request->input('soal_ujian_tipe');
        $soal->soal_pilihan_tipe = $request->input('soal_pilihan_tipe');
        $soal->save();

        DB::table('tb_skorsoal')
            ->where('skorsoal_soal_id', $id)
            ->update([
                'skorsoal_a' => $request->input('skorsoal_a'),
                'skorsoal_b' => $request->input('skorsoal_b'),
                'skorsoal_c' => $request->input('skorsoal_c'),
                'skorsoal_d' => $request->input('skorsoal_d'),
                'skorsoal_e' => $request->input('skorsoal_e'),
            ]);

        return redirect()
            ->route('soal')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(Soal $soal)
    {

        if($soal->soal_ujian_tipe == 'file'){
            unlink('images/soal/' . $soal->soal_ujian);
        }

        if($soal->soal_pilihan_tipe == 'file'){
            unlink('images/soal/' . $soal->soal_a);
            unlink('images/soal/' . $soal->soal_b);
            unlink('images/soal/' . $soal->soal_c);
            unlink('images/soal/' . $soal->soal_d);
            unlink('images/soal/' . $soal->soal_e);
        }

        DB::table('tb_skorsoal')->where('skorsoal_soal_id', $soal->soal_id)->delete();

        $soal->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    // kategori
    public function soalKategori($id)
    {
        $kategori_soal = DB::table('tb_kategori_soal')
                ->where('kategori_id', $id)
                ->first();

        $soal = DB::table('tb_master_soal')
                    ->where('soal_kategori_id', $id)
                    ->get();

        return view('backend/pages/soal/soal-kategori',[
            'active' => 'soal',
            'kategori_soal' => $kategori_soal,
            'soal' => $soal,
            'kategori_id' => $id
        ]);
    }

    public function apiSoalKategori(Request $request, $id)
    {   
        if ($request->ajax()) {
            $data = DB::table('tb_master_soal')
                    ->join('tb_skorsoal', 'tb_skorsoal.skorsoal_soal_id', 'tb_master_soal.soal_id')     
                    ->where('tb_master_soal.soal_kategori_id', $id)   
                    ->get();
        

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('soal', function($row){
                        if($row->soal_ujian_tipe == 'text'){
                            $actionBtn = $row->soal_ujian;
                        }elseif($row->soal_ujian_tipe == 'file'){
                            $actionBtn = '
                                        <img src="' . asset('images/soal/'. $row->soal_ujian) . '" style="width: 200px; height: 200px; display: block;margin-left: auto; margin-right: auto;">
                                        ';
                        }elseif($row->soal_ujian_tipe == 'audio'){
                            $actionBtn = $row->soal_ujian;
                        }
                        return $actionBtn;
                    })

                    ->addColumn('jawaban', function($row){
                        $actionBtn = '
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>A</th>
                                            <th>' . $row->skorsoal_a . '</th>
                                        </tr>
                                        <tr>
                                            <th>B</th>
                                            <th>' . $row->skorsoal_b . '</th>
                                        </tr>
                                        <tr>
                                            <th>C</th>
                                            <th>' . $row->skorsoal_c . '</th>
                                        </tr>
                                        <tr>
                                            <th>D</th>
                                            <th>' . $row->skorsoal_d . '</th>
                                        </tr>
                                        <tr>
                                            <th>E</th>
                                            <th>' . $row->skorsoal_e . '</th>
                                        </tr>
                                    </table>
                                    ';
                        
                        return $actionBtn;
                    })
                    ->addColumn('option', function($row){
                        $actionBtn = '
                                    <a href="'. route('soal.edit', $row->soal_id) .'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus(' . "'" . route('soal.delete', $row->soal_id) . "'" . ')"><i class="fa fa-trash"></i> </button>';
                        return $actionBtn;
                    })
                    // ->rawColumns(['soal', 'soal_a', 'soal_b', 'soal_c', 'soal_d', 'soal_e', 'option'])
                    ->rawColumns(['soal','jawaban','option'])
                    ->make(true);
        }
    }

    // submapel
    public function soalSubmapel($id)
    {
        $submapel = DB::table('tb_submapel')
                    ->join('tb_mapel', 'tb_mapel.mapel_id', 'tb_submapel.submapel_mapel_id',)
                    ->where('submapel_id', $id)
                    ->first();

        return view('backend/pages/soal/soal-submapel',[
            'active' => 'soal',
            'submapel' => $submapel,
        ]);
    }

    public function apiSoalSubmapel(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = DB::table('tb_master_soal')
            ->join('tb_skorsoal', 'tb_skorsoal.skorsoal_soal_id', 'tb_master_soal.soal_id')     
            ->where('tb_master_soal.soal_submapel_id', $id)   
            ->get();
        

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('soal', function($row){
                        if($row->soal_ujian_tipe == 'text'){
                            $actionBtn = $row->soal_ujian;
                        }else{
                            $actionBtn = '
                                        <img src="' . asset('images/soal/'. $row->soal_ujian) . '" style="width: 200px; height: 200px; display: block;margin-left: auto; margin-right: auto;">
                                        ';
                        }
                        return $actionBtn;
                    })
                    // ->addColumn('soal_a', function($row){
                    //     if($row->soal_pilihan_tipe == 'text'){
                    //         $actionBtn = $row->soal_a;
                    //     }else{
                    //         $actionBtn = '
                    //                     <img src="' . asset('images/soal/'. $row->soal_a) . '" style="width: 80px; height: 80px; display: block;margin-left: auto; margin-right: auto;">
                    //                     ';
                    //     }
                    //     return $actionBtn;
                    // })
                    // ->addColumn('soal_b', function($row){
                    //     if($row->soal_pilihan_tipe == 'text'){
                    //         $actionBtn = $row->soal_b;
                    //     }else{
                    //         $actionBtn = '
                    //                     <img src="' . asset('images/soal/'. $row->soal_b) . '" style="width: 80px; height: 80px; display: block;margin-left: auto; margin-right: auto;">
                    //                     ';
                    //     }
                    //     return $actionBtn;
                    // })
                    // ->addColumn('soal_c', function($row){
                    //     if($row->soal_pilihan_tipe == 'text'){
                    //         $actionBtn = $row->soal_c;
                    //     }else{
                    //         $actionBtn = '
                    //                     <img src="' . asset('images/soal/'. $row->soal_c) . '" style="width: 80px; height: 80px; display: block;margin-left: auto; margin-right: auto;">
                    //                     ';
                    //     }
                    //     return $actionBtn;
                    // })
                    // ->addColumn('soal_d', function($row){
                    //     if($row->soal_pilihan_tipe == 'text'){
                    //         $actionBtn = $row->soal_d;
                    //     }else{
                    //         $actionBtn = '
                    //                     <img src="' . asset('images/soal/'. $row->soal_d) . '" style="width: 80px; height: 80px; display: block;margin-left: auto; margin-right: auto;">
                    //                     ';
                    //     }
                    //     return $actionBtn;
                    // })
                    // ->addColumn('soal_e', function($row){
                    //     if($row->soal_pilihan_tipe == 'text'){
                    //         $actionBtn = $row->soal_e;
                    //     }else{
                    //         $actionBtn = '
                    //                     <img src="' . asset('images/soal/'. $row->soal_e) . '" style="width: 80px; height: 80px; display: block;margin-left: auto; margin-right: auto;">
                    //                     ';
                    //     }
                    //     return $actionBtn;
                    // })
                    ->addColumn('jawaban', function($row){
                        $actionBtn = '
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>A</th>
                                            <th>' . $row->skorsoal_a . '</th>
                                        </tr>
                                        <tr>
                                            <th>B</th>
                                            <th>' . $row->skorsoal_b . '</th>
                                        </tr>
                                        <tr>
                                            <th>C</th>
                                            <th>' . $row->skorsoal_c . '</th>
                                        </tr>
                                        <tr>
                                            <th>D</th>
                                            <th>' . $row->skorsoal_d . '</th>
                                        </tr>
                                        <tr>
                                            <th>E</th>
                                            <th>' . $row->skorsoal_e . '</th>
                                        </tr>
                                    </table>
                                    ';
                        
                        return $actionBtn;
                    })
                    ->addColumn('option', function($row){
                        $actionBtn = '
                                    <a href="'. route('soal.edit', $row->soal_id) .'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus(' . "'" . route('soal.delete', $row->soal_id) . "'" . ')"><i class="fa fa-trash"></i> </button>';
                        return $actionBtn;
                    })
                    // ->rawColumns(['soal', 'soal_a', 'soal_b', 'soal_c', 'soal_d', 'soal_e', 'option'])
                    ->rawColumns(['soal','jawaban','option'])
                    ->make(true);
        }
    }

    public function apiSoalSubmapelCari(Request $request)
    {
        $data_submapel = DB::table('tb_submapel')
                        ->where('submapel_mapel_id', $request->id)
                        ->get();

        return json_encode([
            'status' => 'success',
            'data' => $data_submapel  
        ], 200);
        
    }
    
    // import
    public function importSoal(Request $request){
        Excel::import(new SoalImport, $request->file('soal_import'));
        return redirect()
            ->back()
            ->with('message', 'Data berhasil diimport');
    }

}
