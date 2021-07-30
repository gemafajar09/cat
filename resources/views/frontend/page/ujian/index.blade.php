@extends('frontend/index')
@section('content')
    <div class="col-md-12">
        @include('frontend/navbar')
    </div>
    
    <div class="col-md-10 py-3">
        <div id="soal">
            <div id="isisoal"></div>
            <button style="margin-bottom:1em;color:white;" type="submit" class="nextsoal">Selanjutnya</button>
        </div>
    </div>
    <div class="col-md-2 py-3">
        <div class="row" id="bordersoal">
            <div class="col-xs-2 jarakpilihan">
                <a role="button" onclick="isisoal('isisoal')">
                    <div class="pilihansoal" style="background-color:blue; color:white; cursor:pointer">
                        <h3>1</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-2 jarakpilihan">
                <a role="button" onclick="isisoal('isisoal2')">
                    <div class="pilihansoal" style="background-color:yellow; color:black; cursor:pointer">
                        <h3>2</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script>
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
            alert(bool)
        }

        $(document).ready(function() {
            isisoal('isisoal')
            var detik = 00;
            var menit = 30;
            var jam = 2;
            hitung();
            function hitung() {
            setTimeout(hitung, 1000);
            if (menit < 5 && jam == 0) {
                var peringatan = 'style="color:red"';
            };
            $('#waktu').html('Sisa Waktu : '+ jam + ' : ' + menit + ' : ' + detik );
            detik--;
            if (detik < 0) {
                detik = 59;
                menit--;
                if (menit < 0) {
                    menit = 59;
                    jam--;
                    if (jam < 0) {
                        clearInterval();
                    }
                }
            }
        }
        });

        function isisoal(soal)
        {
            $('#isisoal').load("/isisoal/"+soal)
        }
    </script>
@endsection