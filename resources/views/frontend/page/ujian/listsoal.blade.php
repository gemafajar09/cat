<div id="myNav" class="overlay w3-card-4">

<header >
  <a href="javascript:void(0)" class="w3-btn w3-block w3-red" onclick="closeNav()"><i class="fa fa-arrow-right"></i> Back</a>
</header>

  <div class="overlay-content" >
  <div class="container">
      <div class="row">
      <div class="col-md-12" >
        <br>
      <div class="container-fluid">
        <div class="row"  >
            @foreach($soal as $i => $a)
                <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
                  <a class="w3-button w3-red w3-border w3-border-red w3-round w3-padding-large" role="button" onclick="isisoal('{{$a->soal_id, $a->soal_id}}')"><b>{{$i+1}}</b></a><span class="w3-badge badge-style  w3-white" ><b>b</b></span>
                </div>
            @endforeach

      </div>   
      </div>
      <br><br>
      </div>

    </div>
  </div>
  </div>
</div>