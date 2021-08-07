<div>
    <p>
        <h3>TIU <hr></h3>
        <h5>
            {!!$soal->soal_ujian!!}
        </h5>
    </p>
    <input type="radio" value="a" name="pilihan"> A. {!! $soal->soal_a !!}
    <input type="radio" value="b" name="pilihan"> B. {!! $soal->soal_b !!}
    <input type="radio" value="c" name="pilihan"> C. {!! $soal->soal_c !!}
    <input type="radio" value="d" name="pilihan"> D. {!! $soal->soal_d !!}
    <input type="radio" value="e" name="pilihan"> E. {!! $soal->soal_e !!}
    <br><br><br>
</div>
<div class="raguragu" style="margin-bottom:1em;">
    <input id="ragu" value="1" type="checkbox"> Ragu-Ragu
</div>