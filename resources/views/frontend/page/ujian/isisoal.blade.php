
<div class="card-body">
    <div class="card">
        <div class="card-body">
            <p>
                <h3>{{$soal->kategori_soal}} <hr></h3>
                <b id="mySoal">
                    SOAL : <br><br>
                    {!!$soal->soal_ujian!!}
                </b>
            </p>
            <!-- soal tipe text -->
            @if($soal->soal_ujian_tipe == 'text')
                <div>
                    <input id="a" type="radio" class="radio-custom-a" value="a" name="pilihan">
                    <label id="mySoalA" class="radio-custom-label-a" for="a" > {!! $soal->soal_a !!} </label>
                </div>
                <div>
                    <input id="b" type="radio" class="radio-custom-b" value="b" name="pilihan">
                    <label id="mySoalB" class="radio-custom-label-b" for="b" > {!! $soal->soal_b !!} </label>
                </div>
                <div>
                    <input id="c" type="radio" class="radio-custom-c" value="c" name="pilihan">
                    <label id="mySoalC" class="radio-custom-label-c" for="c" > {!! $soal->soal_c !!} </label>
                </div>
                <div>
                    <input id="d" type="radio" class="radio-custom-d" value="d" name="pilihan">
                    <label id="mySoalD" class="radio-custom-label-d" for="d" > {!! $soal->soal_d !!} </label>
                </div>
                <div>
                    <input id="e" type="radio" class="radio-custom-e" value="e" name="pilihan">
                    <label id="mySoalE" class="radio-custom-label-e" for="e" > {!! $soal->soal_e !!} </label>
                </div>
            @elseif($soal->soal_ujian_tipe == 'audio')
                <div>
                    <input id="a" type="radio" class="radio-custom-a" value="a" name="pilihan">
                    <label id="mySoalA" class="radio-custom-label-a" for="a" >
                        <audio controls>
                            <source src="{{asset('/upload/audio/'.$soal->soal_a)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/audio/'.$soal->soal_a)}}" type="audio/ogg">
                        </audio>
                    </label>
                </div>
                <div>
                    <input id="b" type="radio" class="radio-custom-b" value="b" name="pilihan">
                    <label id="mySoalB" class="radio-custom-label-b" for="b" >
                        <audio controls>
                            <source src="{{asset('/upload/audio/'.$soal->soal_b)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/audio/'.$soal->soal_b)}}" type="audio/ogg">
                        </audio>
                    </label>
                </div>
                <div>
                    <input id="c" type="radio" class="radio-custom-c" value="c" name="pilihan">
                    <label id="mySoalC" class="radio-custom-label-c" for="c" >
                        <audio controls>
                            <source src="{{asset('/upload/audio/'.$soal->soal_c)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/audio/'.$soal->soal_c)}}" type="audio/ogg">
                        </audio>
                    </label>
                </div>
                <div>
                    <input id="d" type="radio" class="radio-custom-d" value="d" name="pilihan">
                    <label id="mySoalD" class="radio-custom-label-d" for="d" >
                        <audio controls>
                            <source src="{{asset('/upload/audio/'.$soal->soal_d)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/audio/'.$soal->soal_d)}}" type="audio/ogg">
                        </audio>
                    </label>
                </div>
                <div>
                    <input id="e" type="radio" class="radio-custom-e" value="e" name="pilihan">
                    <label id="mySoalE" class="radio-custom-label-e" for="e" >
                        <audio controls>
                            <source src="{{asset('/upload/audio/'.$soal->soal_e)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/audio/'.$soal->soal_e)}}" type="audio/ogg">
                        </audio>
                    </label>
                </div>
            @elseif($soal->soal_ujian_tipe == 'file')
                <div>
                    <input id="a" type="radio" class="radio-custom-a" value="a" name="pilihan">
                    <label id="mySoalA" class="radio-custom-label-a" for="a" >
                        <img src="{{asset('/upload/gambar/'.$soal->soal_a)}}" style="max-height: 80px" id="imgsoala">
                    </label>
                </div>
                <div>
                    <input id="b" type="radio" class="radio-custom-b" value="b" name="pilihan">
                    <label id="mySoalB" class="radio-custom-label-b" for="b" >
                        <img src="{{asset('/upload/gambar/'.$soal->soal_b)}}" style="max-height: 80px" id="imgsoalb">
                    </label>
                </div>
                <div>
                    <input id="c" type="radio" class="radio-custom-c" value="c" name="pilihan">
                    <label id="mySoalC" class="radio-custom-label-c" for="c" >
                        <img src="{{asset('/upload/gambar/'.$soal->soal_c)}}" style="max-height: 80px" id="imgsoalc">
                    </label>
                </div>
                <div>
                    <input id="d" type="radio" class="radio-custom-d" value="d" name="pilihan">
                    <label id="mySoalD" class="radio-custom-label-d" for="d" >
                        <img src="{{asset('/upload/gambar/'.$soal->soal_d)}}" style="max-height: 80px" id="imgsoald">
                    </label>
                </div>
                <div>
                    <input id="e" type="radio" class="radio-custom-e" value="e" name="pilihan">
                    <label id="mySoalE" class="radio-custom-label-e" for="e" >
                        <img src="{{asset('/upload/gambar/'.$soal->soal_e)}}" style="max-height: 80px" id="imgsoale">
                    </label>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var jawaban = '<?= $cekisian['mulai_ujian_detail_jawaban'] ?>'
        var ragu_ragu = '<?= $cekisian['mulai_ujian_detail_ragu_ragu'] ?>'
        if(jawaban != '')
        {
            document.getElementById(jawaban).checked = true;
        }
        if(ragu_ragu == 1)
        {
            document.getElementById('ragu').checked = true;
        }
    })

    function myFunction30() {
            document.getElementById("mySoal").style.fontSize = "15px";
            document.getElementById("mySoalA").style.fontSize = "15px";
            document.getElementById("mySoalB").style.fontSize = "15px";
            document.getElementById("mySoalC").style.fontSize = "15px";
            document.getElementById("mySoalD").style.fontSize = "15px";
            document.getElementById("mySoalE").style.fontSize = "15px";
        }
        function myFunction70() {
            document.getElementById("mySoal").style.fontSize = "20px";
            document.getElementById("mySoalA").style.fontSize = "20px";
            document.getElementById("mySoalB").style.fontSize = "20px";
            document.getElementById("mySoalC").style.fontSize = "20px";
            document.getElementById("mySoalD").style.fontSize = "20px";
            document.getElementById("mySoalE").style.fontSize = "20px";
        }
        function myFunction85() {
            document.getElementById("mySoal").style.fontSize = "25px";
            document.getElementById("mySoalA").style.fontSize = "25px";
            document.getElementById("mySoalB").style.fontSize = "25px";
            document.getElementById("mySoalC").style.fontSize = "25px";
            document.getElementById("mySoalD").style.fontSize = "25px";
            document.getElementById("mySoalE").style.fontSize = "25px";
        }
        function myFunction100() {
            document.getElementById("mySoal").style.fontSize = "30px";
            document.getElementById("mySoalA").style.fontSize = "30px";
            document.getElementById("mySoalB").style.fontSize = "30px";
            document.getElementById("mySoalC").style.fontSize = "30px";
            document.getElementById("mySoalD").style.fontSize = "30px";
            document.getElementById("mySoalE").style.fontSize = "30px";
        }
</script>