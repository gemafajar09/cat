
<div>
    <p>
        <h3>{{$soal->kategori_soal}} <hr></h3>
        <h5>
            {!!$soal->soal_ujian!!}
        </h5>
    </p>
    <input id="a" type="radio" value="a" name="pilihan"> A. {!! $soal->soal_a !!}
    <input id="b" type="radio" value="b" name="pilihan"> B. {!! $soal->soal_b !!}
    <input id="c" type="radio" value="c" name="pilihan"> C. {!! $soal->soal_c !!}
    <input id="d" type="radio" value="d" name="pilihan"> D. {!! $soal->soal_d !!}
    <input id="e" type="radio" value="e" name="pilihan"> E. {!! $soal->soal_e !!}
    <br><br><br>
</div>
<div class="raguragu" style="margin-bottom:1em;">
    <input id="ragu" value="1" type="checkbox"> Ragu-Ragu
</div>

<script>
    $(document).ready(function(){
        document.getElementById('dijawab').innerHTML = '<?= $hasiljawaban['dijawab'] ?>'
        document.getElementById('ragu-ragu').innerHTML = '<?= $hasiljawaban['ragu_ragu'] ?>'
        document.getElementById('belumdijawab').innerHTML = '<?= $hasiljawaban['belumdijawab'] ?>'
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
</script>