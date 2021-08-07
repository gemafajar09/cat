@extends('frontend/index')
@section('content')
    <div class="col-md-12">
        @include('frontend/navbar')
    </div>
    
    <div class="col-md-10 py-3">
        <input type="text" name="mulai_ujian_id" id="mulai_ujian_id" value="{{$mulai_ujian_id}}">
        <div id="soal">
            <div id="isisoal"></div>
            <input type="text" id="id_selanjutnya">
            <input type="text" id="id_sekarang">
            <button style="margin-bottom:1em;color:white;" type="button" onclick="selanjutnya()" class="nextsoal">Selanjutnya</button>
        </div>
    </div>
    <div class="col-md-2 py-3">
        <div class="row" id="bordersoal">
            @foreach($soal as $i => $a)
            <div class="col-xs-2 jarakpilihan">
                <a role="button" onclick="isisoal('{{$a->soal_id, $a->soal_id}}')">
                    <div class="pilihansoal" style="background-color:#f1f1f1; color:grey; cursor:pointer">
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
        console.log(arrayKosong);

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
           var index =  arrayKosong.indexOf(parseInt(soal))
           $('#id_selanjutnya').val(arrayKosong[index+1])
           $('#id_sekarang').val(soal)
           $('#isisoal').load("/isisoal/"+soal)
        }

        function selanjutnya()
        {   
            // ambil variabel yg akan disimpan ke tb_mulai_ujian_detail
            var mulai_ujian_id = $('#mulai_ujian_id').val();
            var soal_id = $('#id_sekarang').val();
            var mulai_ujian_detail_jawaban = $("input[name='pilihan']:checked").val();
            var ragu = $('#ragu').is(":checked")         
            // console.log(mulai_ujian_id, soal_id, mulai_ujian_detail_jawaban, ragu);
            console.log(typeof(mulai_ujian_detail_jawaban));
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
                var mulai_ujian_id = $('#mulai_ujian_id').val()
                var index =  arrayKosong.indexOf(parseInt(soal))
                $('#id_selanjutnya').val(arrayKosong[index+1])
                $('#id_sekarang').val(soal)
                $('#isisoal').load("/isisoal/"+soal)
            } else { 
                alert('Silahkan pilih jawaban terlebih dahulu')
            }


            // simpanjawaban(mulai_ujian_id, soal_sekarang, jawaban, ragu)
        }

        function simpanjawaban(mulai_ujian_id, soal, jawaban, ragu)
        {

        }
    </script>
@endsection