<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend/page/login/aktiftoken');
    }

    public function mulaiujian(Request $r)
    {
        $token = $r->token;
        $tanggal = date('Y-m-d');
        $jamKini = date("H:i:s");
        $cektoken = DB::table('tb_token')->where('token_key',$token)->where('token_tanggal',$tanggal)->first();
        if(!empty($cektoken))
        {
            if($jamKini > $cektoken->token_jam_selesai)
            {
                return back()->with('pesan', 'Waktu Ujian Telah Berakhir');
            }else{
                $soal = DB::select('SELECT a.soal_id FROM `tb_master_soal` a LEFT JOIN tb_kategori_soal b ON a.soal_kategori_id=b.kategori_id');

                // =======================
                $data['soal'] = $soal;
                $data['jamMulai'] = date("H:i:s");
                $data['jamSelesai'] = $cektoken->token_jam_selesai;

                // simpan data peserta ujian
                $cek = DB::table('tb_mulai_ujian')
                        ->where('tb_mulai_ujian.user_id', session('user_id'))
                        ->where('tb_mulai_ujian.mulai_ujian_tanggal', $tanggal)
                        ->first();
                if($cek){
                    $data['mulai_ujian_id'] = $cek->mulai_ujian_id;
                } else {
                    $data['mulai_ujian_id'] = DB::table('tb_mulai_ujian')->insertGetId([
                        'user_id' =>  session('user_id'),
                        'mulai_ujian_tanggal' => $tanggal,
                        'mulai_ujian_start' => date("H:i:s")
                    ]);
                }        

                return view('frontend/page/ujian/index',$data)->with('pesan', 'selamat ujian.');
            }
        }else{
            return back()->with('pesan', 'Token Expired.');
        }
    }

    public function isisoal($id,$mulai_ujian_id)
    {
        // hitung jumlah terjawab dan tidak
        $soal = DB::table('tb_master_soal')->select(DB::raw('COUNT(soal_id) as jumlah'))->first();
        $dijawab = DB::table('tb_mulai_ujian_detail')->select(DB::raw('COUNT(soal_id) as dijawab'))->where('mulai_ujian_detail_ragu_ragu',0)->where('mulai_ujian_id',$mulai_ujian_id)->first();
        $raguragu = DB::table('tb_mulai_ujian_detail')->select(DB::raw('COUNT(soal_id) as raguragu'))->where('mulai_ujian_detail_ragu_ragu',1)->where('mulai_ujian_id',$mulai_ujian_id)->first();
        $belumdijawab = $soal->jumlah - $dijawab->dijawab - $raguragu->raguragu;
        $datajawaban = array(
            'dijawab' => $dijawab->dijawab,
            'ragu_ragu' => $raguragu->raguragu,
            'belumdijawab' => $belumdijawab
        );
        $data['hasiljawaban'] = $datajawaban;
        // ===============================
        $soal = DB::select('SELECT a.soal_id FROM `tb_master_soal` a LEFT JOIN tb_kategori_soal b ON a.soal_kategori_id=b.kategori_id');
        $jawab = array();
        $data['soal'] = DB::table('tb_master_soal')->join('tb_kategori_soal','tb_kategori_soal.kategori_id','tb_master_soal.soal_kategori_id')->where('tb_master_soal.soal_id',$id)->first();
        // cek apakah soal sudah di jawab atau belum
        $cekisian = DB::table('tb_mulai_ujian_detail')->where('mulai_ujian_id',$mulai_ujian_id)->where('soal_id',$id)->first();
        if($cekisian == null)
        {
            $jawab = array(
                'mulai_ujian_detail_jawaban' => '',
                'mulai_ujian_detail_ragu_ragu' => ''
            );
        }else{
            $jawab = array(
                'mulai_ujian_detail_jawaban' => $cekisian->mulai_ujian_detail_jawaban,
                'mulai_ujian_detail_ragu_ragu' => $cekisian->mulai_ujian_detail_ragu_ragu
            );
        }
        $data['cekisian'] = $jawab;
        return view('frontend/page/ujian/isisoal',$data);
    }
    
    public function simpanJawaban(Request $r)
    {
        // cek apakah jawaban telah tersimpan di tb_mulai_ujian_detail
        $cek = DB::table('tb_mulai_ujian_detail')
                ->where('mulai_ujian_id', $r->mulai_ujian_id)
                ->where('soal_id', $r->soal_id)
                ->first();
        if(!empty($cek)){
            DB::table('tb_mulai_ujian_detail')
                ->where('mulai_ujian_detail_id', $cek->mulai_ujian_detail_id)
                ->update([
                    'mulai_ujian_detail_jawaban' => $r->mulai_ujian_detail_jawaban,
                    'mulai_ujian_detail_ragu_ragu' => $r->ragu,
                ]);
        }else{
            DB::table('tb_mulai_ujian_detail')->insert([
                'mulai_ujian_id' => $r->mulai_ujian_id,
                'soal_id' => $r->soal_id,
                'mulai_ujian_detail_jawaban' => $r->mulai_ujian_detail_jawaban,
                'mulai_ujian_detail_ragu_ragu' => $r->ragu,
            ]);
        }   

        return response()->json('success');
    }

    public function cekJawaban(Request $request)
    {

        $data = DB::table('tb_mulai_ujian_detail')
                ->where('soal_id', $request->soal_id)
                ->where('mulai_ujian_id', $request->mulai_ujian_id)
                ->first();

        return json_encode([
            'data' => $data,
        ]);


    }

    public function nilaiskor($id_mulai_ujian)
    {
        // kelaurkan kategori soal
        $kategorisoal = DB::table('tb_kategori_soal')->get();
        $tiu = 0;
        $twk = 0;
        $tkp = 0;
        foreach($kategorisoal as $key => $a)
        {
            // tampilkan berdasarkan kategori soal
            $dataskor[$key] = DB::table('tb_mulai_ujian')
                        ->join('tb_mulai_ujian_detail','tb_mulai_ujian.mulai_ujian_id','tb_mulai_ujian_detail.mulai_ujian_id')->join('tb_skorsoal','tb_skorsoal.skorsoal_soal_id','tb_mulai_ujian_detail.soal_id')
                        ->join('tb_master_soal','tb_master_soal.soal_id','tb_mulai_ujian_detail.soal_id')
                        ->where('tb_mulai_ujian.mulai_ujian_id',$id_mulai_ujian)
                        ->where('tb_master_soal.soal_kategori_id',$a->kategori_id)
                        ->select('tb_master_soal.soal_kategori_id','tb_mulai_ujian_detail.mulai_ujian_id','tb_skorsoal.skorsoal_a','tb_skorsoal.skorsoal_b','tb_skorsoal.skorsoal_c','tb_skorsoal.skorsoal_c','tb_skorsoal.skorsoal_d','tb_skorsoal.skorsoal_e','tb_mulai_ujian_detail.mulai_ujian_detail_jawaban')
                        ->get();

            foreach($dataskor[$key] as $i => $skor)
            {
                $hasiljawaban[$i] = 'skorsoal_'.$skor->mulai_ujian_detail_jawaban;
                if($skor->soal_kategori_id == 1)
                {
                    $tiu += $skor->{$hasiljawaban[$i]};
                }elseif($skor->soal_kategori_id == 2){
                    $twk += $skor->{$hasiljawaban[$i]};
                }elseif($skor->soal_kategori_id == 3){
                    $tkp += $skor->{$hasiljawaban[$i]};
                }
            }
        }
        $data['nilai'] = array(
            'tiu' => $tiu,
            'twk' => $twk,
            'tkp' => $tkp
        );

        return view('frontend/page/ujian/nilaiskor',$data);
    }

    // api android

    public function tokenapp(Request $r)
    {
        $token = $r->token;
        $user_id = $r->user_id;
        $tanggal = date('Y-m-d');
        $jamKini = date("H:i:s");
        $cektoken = DB::table('tb_token')->where('token_key',$token)->where('token_tanggal',$tanggal)->first();
        if(!empty($cektoken))
        {
            if($jamKini > $cektoken->token_jam_selesai)
            {
                $data = array(
                    'jamMulai'  => '',
                    'jamSelesai' => '',
                    'mulaiUjianId' => ''
                );
                return response()->json(
                    array(
                        'pesan' => 'Waktu Ujian Berakhir',
                        'data' => $data
                        )
                );
            }else{
                $soal = DB::select('SELECT a.soal_id FROM `tb_master_soal` a LEFT JOIN tb_kategori_soal b ON a.soal_kategori_id=b.kategori_id');

                // =======================
                $jamMulai = date("H:i:s");
                $jamSelesai = $cektoken->token_jam_selesai;

                // simpan data peserta ujian
                $cek = DB::table('tb_mulai_ujian')
                        ->where('tb_mulai_ujian.user_id', session('user_id'))
                        ->where('tb_mulai_ujian.mulai_ujian_tanggal', $tanggal)
                        ->first();
                if($cek){
                    $mulai_ujian_id = $cek->mulai_ujian_id;
                } else {
                    $mulai_ujian_id = DB::table('tb_mulai_ujian')->insertGetId([
                        'user_id' =>  $user_id,
                        'mulai_ujian_tanggal' => $tanggal,
                        'mulai_ujian_start' => date("H:i:s")
                    ]);
                }        
                $data = array(
                    'jamMulai'  => $jamMulai,
                    'jamSelesai' => $jamSelesai,
                    'mulaiUjianId' => $mulai_ujian_id
                );

                return response()->json(array(
                    'pesan' => 'Selamat Ujian',
                    'data' => $data
                    ));
            }
        }else{
            $data = array(
                'jamMulai'  => '',
                'jamSelesai' => '',
                'mulaiUjianId' => ''
            );
            return response()->json(
                array(
                    'pesan' => 'Token Expired.',
                    'data' => $data
                    )
            );
        }
    }
}
