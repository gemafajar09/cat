
<div class="card-bod">
    <p>
        <h3>{{$soal->kategori_soal}} <hr></h3>
        <b id="mySoal">
            {!!$soal->soal_ujian!!}
        </b>
    </p>
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