@extends('frontend/index')
@section('content')
    <div class="col-md-12">
        @include('frontend/navbar')
    </div>
    
    <div class="col-md-10 py-3">
        <input type="hidden" name="mulai_ujian_id" id="mulai_ujian_id" value="{{$mulai_ujian_id}}">
        <div id="soal">
            <div id="isisoal"></div>
            <input type="hidden" id="id_selanjutnya">
            <input type="hidden" id="id_sekarang">
            <button id="lanjut" style="margin-bottom:1em;color:white;" type="button" onclick="selanjutnya()" class="nextsoal">Selanjutnya</button>
            <button id="selesai" style="margin-bottom:1em;color:white;display:none" type="button" onclick="" class="nextsoal">Selesaikan</button>
        </div>
    </div>
    <div class="col-md-2 py-3">
        <div class="row" id="bordersoal">
            @foreach($soal as $i => $a)
            <div class="col-xs-2 jarakpilihan">
                <a role="button" onclick="isisoal('{{$a->soal_id, $a->soal_id}}')">
                    <div class="pilihansoal" id="{{$a->soal_id}}" style="background-color:#f1f1f1; color:grey; cursor:pointer">
                        <h3>{{$i+1}}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        var arrayKosong = [];
        var dataIdSoal = '<?= json_encode($soal) ?>'
        JSON.parse(dataIdSoal).forEach(e => {
            arrayKosong.push(e.soal_id)
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
            var detik = 00;
            var menit = 00;
            var jam = 2;
            isisoal(arrayKosong[0])
            hitung();
            
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
                    var peringatan = 'style="color:red"';
                };
                $('#waktu').html('Sisa Waktu : '+ hours + ' : ' + minutes + ' : ' + detik );
                detik--;
                if (detik < 0) {
                    detik = 59;
                    minutes--;
                    if (minutes < 0) {
                        minutes = 59;
                        hours--;
                        if (hours < 0) {
                            clearInterval();
                        }
                    }
                }
            }
        });

        function clearInterval() 
        {
            alert('Please wait')
        }

        function isisoal(soal)
        {
           var mulai_ujian_id = $('#mulai_ujian_id').val()
           var index =  arrayKosong.indexOf(parseInt(soal))
           $('#id_selanjutnya').val(arrayKosong[index+1])
           $('#id_sekarang').val(soal)
           $('#isisoal').load("/isisoal/"+soal+"/"+mulai_ujian_id)
           cekjumlahsoal()
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

        function cekjumlahsoal()
        {
            var soalselanjutnya = $('#id_selanjutnya').val()
            console.log(soalselanjutnya)
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

                        if(res.data){
                            // jika ragu == 1
                            if(res.data.mulai_ujian_detail_ragu_ragu == 1)
                            {
                                document.getElementById(res.data.soal_id).style.backgroundColor  = '#ffec26'
                                document.getElementById(res.data.soal_id).style.color  = '#000'
                            }else{
                                document.getElementById(res.data.soal_id).style.backgroundColor  = '#636ff2'
                                document.getElementById(res.data.soal_id).style.color  = '#ffffff'
                            }
                            // $(`input[name='pilihan'][value='${res.data.mulai_ujian_detail_jawaban}']`).prop('checked', true);
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