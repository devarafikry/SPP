@extends('layouts.app_form')


@section('content')
<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-backdrop {
  z-index: -1;
}
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
/* Modal Content */
.modal-content {

    position: relative;
    background-color: #fefefe;
    margin: auto;
    margin-top: 100px;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
/* Add Animation */
@-webkit-keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}

@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}
</style>
<style>
p{
  color:black;
}
.glyphicon{
  color:white;
    font-size: 50px;
}
.plan{

    font-size: 50px;
}
.mySlides{

}
</style>
<section class=" col-xs-3" id="status">


                  <center>
                    <h3> Budget Tersisa </h3>
                    <h4 id="budget"> {{$plan->budget}} </h4>
                  </center>

</section>
<section class="bg-primary col-xs-9" id="create">
    <div class="container">
        <?php

            ?>
            @foreach($planplace as $planplace)
            <div class="col-md-2">
              <div class="crop">
                    <img class="place_thumbnail" src="{{ asset('img/blank.png') }}" id="img_{{$planplace->id}}" alt="Chania" height="400" width="150">
              </div>

                  <center>

                    <h4 style="color:white;"><b>
                      <?php
                        $time=strtotime($plan->waktu_tiba);
                        $day=date("d",$time);
                        $month=date("F",$time);
                        $year=date("Y",$time);
                    ?>
                    {{$planplace->waktu_plan}}
                  </b></h4>
                                        <br><br>
                      <span class="glyphicon glyphicon-plus" id="add_{{$planplace->id}}" aria-hidden="true"></span>
                  </center>

            </div>

<script>
  var span = document.getElementsByClassName("close")[0];
  var modal1 = document.getElementById('placeModal');
  var modal1txt = document.getElementById("modal1txt");
  var modalHeader1 = document.getElementById("modalHeader1");
  var btnAdd = new Array();
  var placeModal = new Array();

  $('#add_{{$planplace->id}}').on('click',function(){
      $('#placeModal').modal('show');
      $("#modalHeader").val("{{$planplace->id}}");
      $('#modalHeader').html("Perjalanan  tanggal"+ " {{$planplace->waktu_plan}}");
      return false;
  });


    $('#closeModal_{{$planplace->id}}').onclick = function() {
      console.log("closeModal_{{$planplace->id}} clicked");

      $('#placeModal_{{$planplace->id}}').modal('hide');
  };



  function btnClose() {
      console.log("closeclicked");
      $('#placeModal_{{$planplace->id}}').modal('show');
      currentIndex = $('div.active').index() + 1;
      console.log(currentIndex);
  }

   $('#placeModal').on('show', function () {
   // do something…
   console.log('place modal showed.')
 })

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal1) {
                $('#placeModal_{{$planplace->id}}').modal('hide');
            }
        }

  </script>
  @endforeach

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <div id="placeModal" class="modal">

    <!-- Modal content -->
    <!-- Modal content -->

        <div class="modal-content">
          <div class="modal-header">
            <span id="closeModal" class="close">×</span>
            <h4 style="color:black" id=modalHeader>Modal Header</h4>
          </div>
          <div class="modal-body">
                        <div class="w3-content w3-display-container">

              <a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
              <a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)">&#10095;</a>
              @foreach($places as $place)
              <div  class="w3-display-container mySlides" value="asdf">
                <img src="http:\\localhost\spp\public\uploads{{$place->photolink}}" style="width:100%">
                <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
                <center>  <p style="color:white;"><b>{{$place->nama_tempat}} </b><br>
                    {{$place->deskripsi_tempat}} <br>
                    {{$place->nama_tempat}} <br>
                    <b>{{$place->durasi_wisata}} menit <br>
                    Rp {{$place->estimasi_biaya}} <br></b>
                  </p>
                </center>
                </div>
              </div>
              @endforeach
              </div>
          </div>
          <div class="modal-footer">

                <button type="button" id="clos"  onclick="btnClose()" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="pilih"  onclick="btnPilih()" class="btn btn-default" data-dismiss="modal">Pilih</button>
          </div>
        </div>

  </div>


</div>
</section>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function btnPilih(){
 console.log("ini button pilih");
  console.log('planplace id ke '+'{{$planplace->id}}')
 console.log("dipiilh "+window.selectedIndex);
 var planplace_id = $("#modalHeader").val();
  console.log('planplace id ke '+planplace_id)
var selected = window.selectedIndex-1;
 $.ajax({
     type: "GET",
     url: '{{ url('/planplace')}}/'+selected+'/'+'{{$plan->id}}'+'/'+planplace_id,
     data: {selectedid : selected, plan_id : '{{$plan->id}}',planplace_id : planplace_id  },
     success:function(data){
        console.log("select success");
        console.log(data);
        if(data['error'] == "true"){
          alert("Budget anda tidak cukup !")
        }
        else{
          $('#img_'+planplace_id).attr("src","uploads"+data['photolink']);
          console.log("new budget "+data['budget']);
          $('#budget').html(data['budget']);
        }

     }
   })
     };



var selectedIndex;
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");

  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  window.selectedIndex = slideIndex;
  x[slideIndex-1].style.display = "block";
}
</script>

@endsection
