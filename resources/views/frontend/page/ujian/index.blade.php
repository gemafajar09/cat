@extends('frontend/index')
@section('content')
@include('frontend/page/ujian/listsoal')
    <!-- <div class="col-md-12">
        @include('frontend/navbar')
    </div> -->
    <input type="hidden" name="mulai_ujian_id" id="mulai_ujian_id" value="{{$mulai_ujian_id}}">
    <input type="hidden" id="id_selanjutnya">
    <input type="hidden" id="id_sebelumnya">
    <input type="hidden" id="id_sekarang">
    
    <div class="col-md-12">
        <div class="card" style="border-radius: 0;min-height: 100vh;" id="soal">
            <div class="card-header">
                <h3> 
                  Text Font : 
                <button type="button" onclick="myFunction30()" class="btn btn-default">30%</button>
                <button type="button" onclick="myFunction70()" class="btn btn-default">70%</button>
                <button type="button" onclick="myFunction85()" class="btn btn-default">85%</button>
                <button type="button" onclick="myFunction100()" class="btn btn-default">100%</button>
                <button type="button" style="background-color:aqua" class="w3-button w3-border  w3-right w3-large"><span id="demo">Loading...</span> </button>
                <button type="button" style="background-color:grey; color:white" class="w3-button w3-border w3-right w3-large">TIME LEFT</button>
              </h3> 
            </div>
            <div class="card-body">
                <div id="isisoal"></div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-bottom">
        <div class="col-md-2">
            <button class="btn btn-info" style="color:white" onclick="sebelumnya()" type="button"><i class="fa fa-arrow-left"> SOAL SEBELUMNYA</i></button>
        </div>
        <div class="col-md-8">
            <div  style=" width: 150px; margin:auto; background:yellow;border-radius: 5px;font-size: 14px;padding: 2px;">
                <input type="checkbox" id="ragu" style="margin-top: 10px;margin-left: 15px;">
                <label  for="ragu">RAGU - RAGU</label>
            </div>
        </div>
        <div class="col-md-2">
            <button id="lanjut" onclick="selanjutnya()" class="btn btn-success">SOAL BERIKUTNYA <i class="fa fa-arrow-right"></i></button>
            <button id="selesai" style="display:none" onclick="selesaikan()" class="btn btn-success">SELESAIKAN</button>
        </div>
    </nav>

    <div class="icon-bar">
        <span href="#" style="background-color:aqua" class="facebook" onclick="openNav()"><i class="fa fa-angle-double-left "></i> &nbsp;SOAL</span>
    </div>
    
    <script>
        var arrayKosong = [];
        var dataIdSoal = '<?= json_encode($soal) ?>'
        JSON.parse(dataIdSoal).forEach(e => {
            arrayKosong.push(e)
        });

        var bool = false
        $('#nosoal').show();
        function nosoal()
        {
            if(bool == 'false')
            {
                bool = true
            }else{
                bool = false
            }
            $("#nosoal").controlSidebar(bool);
        }

        $(document).ready(function() {
            isisoal(arrayKosong[0])
            hitung();
            var detik = 00;
            
            // selisih waktu
            var jamMulai = '<?= $jamMulai ?>',
                jamSelesai = '<?= $jamSelesai ?>',
            
            hours = jamSelesai.split(':')[0] - jamMulai.split(':')[0],
                minutes = jamSelesai.split(':')[1] - jamMulai.split(':')[1];
        
            minutes = minutes.toString().length<2?'0'+minutes:minutes;
            if(minutes<0){ 
                hours--;
                minutes = 60 + minutes;        
            }
            hours = hours.toString().length<2?'0'+hours:hours;
            console.log(hours+':'+minutes)
            // =======================
            function hitung() 
            {
                setTimeout(hitung, 1000);
                if (minutes < 5 && hours == 0) {
                    document.getElementById('demo').style.color = '#ff0000'
                };
                if (minutes == 0 && hours == 0 && detik == 0) {
                    
                    window.location = '/nilai-skor'
                };
                $('#demo').html( hours + ' : ' + minutes + ' : ' + detik );
                detik--;
                if (detik < 0) {
                    detik = 59;
                    minutes--;
                    if (minutes < 0) {
                        minutes = 59;
                        hours--;
                        if (hours < 0) {
                            toast.sucess('Waktu Ujian Telah Berakhir.')
                        }
                    }
                }
            }
        });

        function openNav() {
            document.getElementById("myNav").style.width = "23%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        function isisoal(soal)
        {
           var mulai_ujian_id = $('#mulai_ujian_id').val()
           var index =  arrayKosong.indexOf(parseInt(soal))
           $('#id_selanjutnya').val(arrayKosong[index+1])
           $('#id_sebelumnya').val(arrayKosong[index-1])
           $('#id_sekarang').val(soal)
           $('#isisoal').load("/isisoal/"+soal+"/"+mulai_ujian_id)
           cekjumlahsoal()
           if(mulai_ujian_id != '')
           {
               $('#tampiljumlahterjawab').show()
           }
        }

        function selanjutnya()
        {   
            // ambil variabel yg akan disimpan ke tb_mulai_ujian_detail
            var mulai_ujian_id = $('#mulai_ujian_id').val();
            var soal_id = $('#id_sekarang').val();
            var mulai_ujian_detail_jawaban = $("input[name='pilihan']:checked").val();
            var ragu = $('#ragu').is(":checked")         
            // console.log(mulai_ujian_id, soal_id, mulai_ujian_detail_jawaban, ragu);
            if(typeof(mulai_ujian_detail_jawaban) != 'undefined'){
                $.ajax({
                    type: "POST",
                    url: "{{ route('simpanJawaban') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'mulai_ujian_id' : mulai_ujian_id,
                        'soal_id' : soal_id,
                        'mulai_ujian_detail_jawaban' : mulai_ujian_detail_jawaban,
                        'ragu' : (ragu == true) ? '1' : '0',
                    },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                    }
                });
                // ambil variabel untuk lanjut ke soal berikutnya
                var soal = $('#id_selanjutnya').val()
                var soal_sekarang = $('#id_sekarang').val()
                var index =  arrayKosong.indexOf(parseInt(soal))
                $('#id_selanjutnya').val(arrayKosong[index+1])
                $('#id_sekarang').val(soal)
                isisoal(soal)
                ceksoaldijawab()
                cekjumlahsoal()
            } else { 
                alert('Silahkan pilih jawaban terlebih dahulu')
            }
            // simpanjawaban(mulai_ujian_id, soal_sekarang, jawaban, ragu)
        }

        function sebelumnya()
        {
            var soal = $('#id_sebelumnya').val()
            isisoal(soal)
        }

        function selesaikan()
        {   
            // ambil variabel yg akan disimpan ke tb_mulai_ujian_detail
            var mulai_ujian_id = $('#mulai_ujian_id').val();
            var soal_id = $('#id_sekarang').val();
            var mulai_ujian_detail_jawaban = $("input[name='pilihan']:checked").val();
            var ragu = $('#ragu').is(":checked")         

            // cek apakah selesai atau tidak
            if(typeof(mulai_ujian_detail_jawaban) != 'undefined'){
                var r = confirm("Apakah Anda Yakin Menyelesaikan Ujian?");
                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('simpanJawaban') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'mulai_ujian_id' : mulai_ujian_id,
                            'soal_id' : soal_id,
                            'mulai_ujian_detail_jawaban' : mulai_ujian_detail_jawaban,
                            'ragu' : (ragu == true) ? '1' : '0',
                        },
                        dataType: "JSON",
                        success: function (response) {
                            window.location = '/nilai-skor/'+mulai_ujian_id
                        }
                    });
                } else {
                    toast.success('Silahkan Koreksi jawaban terlebih dahulu')
                }                
            } else { 
                toast.success('Silahkan pilih jawaban terlebih dahulu')
            }
        }

        function cekjumlahsoal()
        {
            var soalselanjutnya = $('#id_selanjutnya').val()
            if(soalselanjutnya == '')
            {
                $('#selesai').show()
                $('#lanjut').hide()
            }else{
                $('#selesai').hide()
                $('#lanjut').show()
            }
        }

        function ceksoaldijawab()
        {
            var mulai_ujian_id = $('#mulai_ujian_id').val();
            for(var i=0; i < arrayKosong.length; i++)
            {
                var soal_id = arrayKosong[i];
                $.ajax({
                    url: '{{ route('cekJawaban') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token" : "{{ csrf_token() }}",
                        "soal_id" : arrayKosong[i],
                        'mulai_ujian_id': mulai_ujian_id
                    },
                    success: function(res){
                        var jawaban = ''
                        if(res.data.mulai_ujian_detail_jawaban == 'a')
                        {
                            jawaban = 'A'
                        }
                        else if(res.data.mulai_ujian_detail_jawaban == 'b')
                        {
                            jawaban = 'B'
                        }
                        else if(res.data.mulai_ujian_detail_jawaban == 'c')
                        {
                            jawaban = 'C'
                        }
                        else if(res.data.mulai_ujian_detail_jawaban == 'd')
                        {
                            jawaban = 'D'
                        }
                        else if(res.data.mulai_ujian_detail_jawaban == 'e')
                        {
                            jawaban = 'E'
                        }
                        else
                        {
                            jawaban = ''
                        }
                        if(res.data){
                            if(res.data.mulai_ujian_detail_ragu_ragu == 1)
                            {
                                document.getElementById(res.data.soal_id).style.backgroundColor  = '#ffec26'
                                document.getElementById(res.data.soal_id).style.color  = '#000'
                                document.getElementById('jawabanSoal'+res.data.soal_id).innerHTML = jawaban
                            }else{
                                document.getElementById(res.data.soal_id).style.backgroundColor  = '#636ff2'
                                document.getElementById(res.data.soal_id).style.color  = '#ffffff'
                                document.getElementById('jawabanSoal'+res.data.soal_id).innerHTML = jawaban
                            }
                        }
                    }
                })
            } 
        }
        ceksoaldijawab()

        // // mematikan function browser
        // $(document).bind("contextmenu",function(e) {
        //     alert('Silahkan Lanjutkan Ujian!')
        //     return false;
        // });
        // // mematikan back button
        

        // document.onkeydown = function(e) {
        //     if(event.keyCode == 123) {
        //         return false;
        //     }
        //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        //         alert('Silahkan Lanjutkan Ujian!')
        //         return false;
        //     }
        //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        //         alert('Silahkan Lanjutkan Ujian!')
        //         return false;
        //     }
        //     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        //         alert('Silahkan Lanjutkan Ujian!')
        //         return false;
        //     }
        // }
    </script>
@endsection