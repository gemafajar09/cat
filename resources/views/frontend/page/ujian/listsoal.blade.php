    <header >
        <a href="javascript:void(0)" class="w3-btn w3-block w3-aqua" onclick="closeNav()"><i style="color:white" class="fa fa-arrow-right"></i></a>
    </header>

    <div class="overlay-content" style="overflow: auto;">
      <div class="container">
          <div class="row">
          <div class="col-md-12" >
            <br>
          <div class="container-fluid">
            <div class="row"  >
                @foreach($soals as $i => $a)
                @php
                  $hasil = DB::table('tb_mulai_ujian_detail')->where('mulai_ujian_id',$mulai_ujian_id)->where('soal_id',$a)->first();
                @endphp
                  @if($hasil == false)
                    <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
                        <a id="{{$a}}" style="background-color:aqua; color:white" class="w3-button w3-round w3-padding-large" role="button" onclick="isisoal('{{$a}}')"><b>{{$i+1}}</b></a><span class="w3-badge badge-style w3-white" ><b id="jawabanSoal{{$a}}"></b></span>
                    </div>
                  @else
                    <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
                        <a id="{{$a}}" style="background-color:<?= $hasil->mulai_ujian_detail_ragu_ragu == 1 ? 'yellow':'blue'?>; color:white" class="w3-button w3-round w3-padding-large" role="button" onclick="isisoal('{{$a}}')"><b>{{$i+1}}</b></a>
                        <span class="w3-badge badge-style w3-white" >
                          <b id="jawabanSoal{{$a}}">
                            {{$hasil->mulai_ujian_detail_jawaban}}
                          </b>
                        </span>
                    </div>
                  @endif
                @endforeach
          </div>   
          </div>
          <br><br>
          </div>

        </div>
      </div>
    </div>