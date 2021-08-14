<?php

namespace App\Imports;

use App\Soal;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoalImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {   
        foreach ($rows as $no => $row) {
            // $row[0] == kategori_soal
            // $row[1] == mapel
            // $row[2] == submapel
            // $row[3] == soal
            // $row[4] == soal a
            // $row[5] == soal b
            // $row[6] == soal c
            // $row[7] == soal d
            // $row[8] == soal e
            // $row[9] == skor soal a
            // $row[10] == skor soal b
            // $row[11] == skor soal c
            // $row[12] == skor soal d
            // $row[13] == skor soal e

            // cari data kategori terlebih dahulu
            $kategori_soal = DB::table('tb_kategori_soal')
                            ->where('kategori_soal', $row[0])
                            ->first();
            
            // jika kategori soal == TIU
            if($row[0] != 'TIU'){
                $soal_id = DB::table('tb_master_soal')->insertGetId([
                    "soal_kategori_id" => $kategori_soal->kategori_id,
                    "soal_mapel_id" => 0,
                    "soal_submapel_id" => 0,
                    "soal_ujian_tipe" => "text",
                    "soal_ujian" => $row[3],
                    "soal_pilihan_tipe" => "text",
                    "soal_a" => $row[4],
                    "soal_b" => $row[5],
                    "soal_c" => $row[6],
                    "soal_d" => $row[7],
                    "soal_e" => $row[8],
                ]);
            } else {
                // cari mapel
                $mapel = DB::table('tb_mapel')
                        ->where('mapel_kategori', $row[1])
                        ->first();
                        // jika mapel tidak ada maka insert

                        
                if(empty($mapel->mapel_id)){
                    $mapel = DB::table('tb_mapel')->insertGetId([
                            "mapel_kategori" => $row[1]
                    ]);
                }
                
                // cari submapel
                $submapel = DB::table('tb_submapel')
                            ->where('submapel_kategori', $row[2])
                            ->first();

                // jika mapel ada maka ambil idnya jika tidak insert
                if(empty($submapel->submapel_id)){
                    $submapel = DB::table('tb_submapel')->insertGetId([
                        "submapel_mapel_id" => $mapel->mapel_id,
                        "submapel_kategori" => $row[2],
                    ]);
                }

                $soal_id = DB::table('tb_master_soal')->insertGetId([
                    "soal_kategori_id" => $kategori_soal->kategori_id,
                    "soal_mapel_id" => $mapel->mapel_id,
                    "soal_submapel_id" => $submapel->submapel_id,
                    "soal_ujian_tipe" => "text",
                    "soal_ujian" => $row[3],
                    "soal_pilihan_tipe" => "text",
                    "soal_a" => $row[4],
                    "soal_b" => $row[5],
                    "soal_c" => $row[6],
                    "soal_d" => $row[7],
                    "soal_e" => $row[8],
                ]);
            }

            // insert tb_skorsoal
            DB::table("tb_skorsoal")->insert([
                'skorsoal_soal_id' => $soal_id,
                'skorsoal_a' => $row[9],
                'skorsoal_b' => $row[10],
                'skorsoal_c' => $row[11],
                'skorsoal_d' => $row[12],
                'skorsoal_e' => $row[13],
            ]);

        }
    }
    // skip heading supaya langsung ke data ke 2
    public function startRow(): int
    {
        return 2;
    }
}
