
<div class="card-bod">
    <p>
        <h3>{{$soal->kategori_soal}} <hr></h3>
        <h5>
            {!!$soal->soal_ujian!!}
        </h5>
    </p>
    <div>
        <input id="a" type="radio" class="radio-custom-a" value="a" name="pilihan">
        <label class="radio-custom-label-a" for="a" > {!! $soal->soal_a !!} </label>
    </div>
    <div>
        <input id="b" type="radio" class="radio-custom-b" value="b" name="pilihan">
        <label class="radio-custom-label-b" for="b" > {!! $soal->soal_b !!} </label>
    </div>
    <div>
        <input id="c" type="radio" class="radio-custom-c" value="c" name="pilihan">
        <label class="radio-custom-label-c" for="c" > {!! $soal->soal_c !!} </label>
    </div>
    <div>
        <input id="d" type="radio" class="radio-custom-d" value="d" name="pilihan">
        <label class="radio-custom-label-d" for="d" > {!! $soal->soal_d !!} </label>
    </div>
    <div>
        <input id="e" type="radio" class="radio-custom-e" value="e" name="pilihan">
        <label class="radio-custom-label-e" for="e" > {!! $soal->soal_e !!} </label>
    </div>
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