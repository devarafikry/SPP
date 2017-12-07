@extends('layouts.app_complete')

<?php use App\Place; ?>
@section('content')
<style>
.crop {
    width: 150px;
    height: 450px;
    overflow: hidden;
}

.crop img {
    width: 300px;
    height: 600px;
    margin: -75px 10px 0 -100px;
}

</style>
<link rel="stylesheet"  href="http://www.w3schools.com/lib/w3.css">
                  <center>
                    <h2>Rencana Perjalanan</h2><br>
                    <h3>Perjalanan ke Kota {{$kota->nama_kota}}</h3><br><br>
                    <h4 id="budget">Budget {{$plan->budget + $plan->total_biaya}}</h4>
                    <h4 id="budget">Tiba Tanggal : {{$plan->waktu_tiba}}</h4>
                    <h4 id="budget">Pulang Tanggal : {{$plan->waktu_pulang}}</h4> <br>
                  </center>



                  <table style="width:100%">
                    <tr>
                    @foreach($planplace as $planplace)
                    <?php $place = Place::find($planplace->place_id);?>
                      <center>
                              <div class="w3-card-12" style="width:40%">
                                <div class="w3-container w3-center"><br>
                                  <p>Tanggal : {{$planplace->waktu_plan}}
                                </div>
                                  <img src="http:\\localhost\spp\resources{{$place->photolink}}" alt="Norway" style="width:100%">
                                  <div class="w3-container w3-center"><br>
                                  <h4> <b> {{$place->nama_tempat}} </b> </h4>
                                  <p>{{$place->deskripsi_tempat}}</p>
                                      <h4><span class="label label-danger pull-left">Rp {{$place->estimasi_biaya}}</span></h3>
                                      <h4><span class="label label-success pull-right">{{$place->durasi_wisata}} Menit</span></h3>
                                      <br>
                                  </div>
<br>
                                </div>
                              </div><br><br>
                                      @endforeach
                  </center>
                </tr>

                  </table>




@endsection
