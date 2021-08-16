<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SettingSoal;
use DB;

class SettingSoalController extends Controller
{
    public function store(Request $request, SettingSoal $setting)
    {

        $validator = Validator::make($request->all(), [
            'token_id'         => 'required',
            'kategori_id'         => 'required',
            'setting_soal_jumlah'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori_id = implode(",", $request->input('kategori_id'));

        $setting_soal_jumlah = [];
        foreach($request->input('setting_soal_jumlah') as $row) { 
            if ($row != null) {
                array_push($setting_soal_jumlah, $row); 
            }else{
                array_push($setting_soal_jumlah, 0); 
            }
        }
        $setting_soal_jumlah = implode(",", $setting_soal_jumlah);


        // cek apakah data sudah ada
        $cek = DB::table("tb_setting_soal")
                ->where("token_id", $request->input('token_id'))
                ->first();
        if($cek){
            DB::table("tb_setting_soal")
                ->where("token_id", $request->input("token_id"))
                ->update([
                    "kategori_id" => $kategori_id,
                    "setting_soal_jumlah" => $setting_soal_jumlah,
                ]);

            return json_encode([
                "success" => true,
                "message" => "Data sukses diupdate"
            ], 201);

        } else {
            $setting->token_id = $request->input('token_id');
            $setting->kategori_id = $kategori_id;
            $setting->setting_soal_jumlah = $setting_soal_jumlah;
            $setting->save();
    
            return json_encode([
                "success" => true,
                "message" => "Data sukses ditambahkan"
            ], 201);
        }


    }

    public function edit($id)
    {
        $setting_soal = DB::table("tb_setting_soal")
                        ->where("token_id", $id)
                        ->first();

        if(empty($setting_soal)){
            $setting_soal = "";
        }

        return json_encode([
            "success" => true,
            "message" => "Data sukses diambil",
            "data" => $setting_soal,
        ], 200);

    }
}
