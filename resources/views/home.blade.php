@extends('layouts.app')

@section('content')
<script>
$(document).ready(function(){
  if("{{Session::get('message')}}"==1){
    alert("Request tempat wisata baru diterima!");
  }
});

</script>
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

/* Modal Content */
.modal-content {

    position: relative;
    background-color: #fefefe;
    margin: auto;
    margin-top: 100px;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
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

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Indonesia Tour Planner</h1>
                <hr>
                <p>TourPlanner akan memudahkanmu untuk membuat perencanaan wisata di seluruh kota di Indonesia</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Selengkapnya</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Optimalkan waktu dan dana yang kamu punya!</h2>
                    <hr class="light">
                    <p class="text-faded">TourPlanner dapat melakukan optimasi terhadap waktu dan dana yang kamu miliki untuk melakukan perjalanan liburan yang tak terlupakan!</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Mulai Sekarang!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="services">
      <aside class="container-fluid">
          <div class="container text-center">
                  <h2>Pilih kota tujuan wisata mu!</h2>

          </div>
      </aside>
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                  <div id="tbMlg">
                    <a class="portfolio-box">
                        <img src="img/portfolio/thumbnails/a.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-name">
                                    Malang
                                </div>
                            </div>
                        </div>
                    </a>
                        </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div id="tbSby">
                      <a  class="portfolio-box">
                        <img src="img/portfolio/thumbnails/b.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-name">
                                    Surabaya
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div id="tbBali">
                    <a class="portfolio-box">
                        <img src="img/portfolio/thumbnails/c.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-name">
                                    Bali
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div id="tbYogya">
                    <a  class="portfolio-box">
                        <img src="img/portfolio/thumbnails/d.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-name">
                                    Yogyakarta
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div id="tbLombok">
                      <a  class="portfolio-box">
                        <img src="img/portfolio/thumbnails/e.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">

                                <div class="project-name">
                                    Lombok
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div id="tbBandung">
                    <a class="portfolio-box">
                        <img src="img/portfolio/thumbnails/f.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-name">
                                    Bandung
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn" style="hidden">Open Modal</button>

    <!-- The Modal -->

    <!-- <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
            </div>
        </div>
    </aside> -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Kamu menemukan tempat wisata baru?</h2>
                    <hr class="primary">
                    <p>Bantu kami memperluas informasi tempat wisata dengan mengusulkan tempat wisata baru!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="#" onclick="request();">Request Tempat Wisata Baru</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="modal " id="myModalRequest" >
        <div class="modal-dialog">
            <div class="modal-content" style="  width: 100%">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Request Tempat Baru</h4>
                </div>
                <div class="modal-body">
                      {!! Form::open(['action'=>'PlaceController@request', 'files'=>true]) !!}

                        <div class="form-group error">
                          {!! Form::label('image', 'Choose Photo') !!}
                          {!! Form::file('image') !!}
                        </div>
                        <div class="form-group error">
                          {!! Form::label('kota', 'Pilih Kota') !!} <br>
                          {!! Form::select('kota', array('0' => 'Malang', '1' => 'Surabaya')); !!}
                        </div>
                        <div class="form-group error">
                          {!! Form::label('nama', 'Nama:') !!}
                          {!! Form::text('nama', null, ['class'=>'form-control', 'rows'=>1] ) !!}
                        </div>
                        <div class="form-group error">
                          {!! Form::label('deskripsi', 'Deskripsi:') !!}
                          {!! Form::textarea('deskripsi', null, ['class'=>'form-control', 'rows'=>5] ) !!}
                        </div>
                        <div class="form-group error">
                          {!! Form::label('estimasi_biaya', 'Estimasi Biaya(IDR):') !!}
                          {!! Form::number('estimasi_biaya', null, ['class'=>'form-control', 'rows'=>1] ) !!}
                        </div>
                        <div class="form-group error">
                          {!! Form::label('durasi', 'Durasi(menit):') !!}
                          {!! Form::number('durasi', null, ['class'=>'form-control', 'rows'=>1] ) !!}
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save" value="add">Tambah</button>
                </div>
                        {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">×</span>
              <h2 id="modalHeader">Modal Header</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/createplan') }}">
              {!! csrf_field() !!}
                  <input type="hidden" id="place_id" name="place_id" value="a">

              <div class="form-group">
                  <div class="col-md-12">Waktu Tiba :
                      <input type="date" class="form-control" name="waktutiba" value="{{ old('waktutiba') }}" placeholder="Waktu Tiba">

                      @if ($errors->has('waktutiba'))
                          <span class="help-block">
                              <strong>{{ $errors->first('waktutiba') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">

                  <div class="col-md-12">Waktu Pulang :
                      <input type="date" class="form-control" name="waktupulang" value="{{ old('waktupulang') }}" placeholder="Waktu Pulang">

                      @if ($errors->has('waktupulang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('waktupulang') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">

                  <div class="col-md-12">
                      <input type="number" class="form-control" name="budget" placeholder="Budget">

                      @if ($errors->has('budget'))
                          <span class="help-block">
                              <strong>{{ $errors->first('budget') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>



              <div class="form-group">
                  <div class="col-md-12 ">
                      <button type="submit" class="btn btn-primary col-md-12">
                          Mulai
                      </button>
                  </div>
              </div>
          </form>
        </div>

  </div>

    </div>

    <!-- The Modal -->
<div id="notReadyModal" class="modal">

  <!-- Modal content -->
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2 id=modalHeader1>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p id="modal1txt">Some text in the Modal Body</p>

    </div>

  </div>

</div>
    <script>
  // Get the modal
  var modal = document.getElementById('myModal');
  var modal1 = document.getElementById('notReadyModal');
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  var tbMlg = document.getElementById("tbMlg");
  var tbSby = document.getElementById("tbSby");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  var modalHeader = document.getElementById("modalHeader");
  var tbBali = document.getElementById("tbBali");
    var tbYogya = document.getElementById("tbYogya");
      var tbLombok = document.getElementById("tbLombok");
        var tbBandung = document.getElementById("tbBandung");
var modal1txt = document.getElementById("modal1txt");
  var modalHeader1 = document.getElementById("modalHeader1");

  // When the user clicks the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
  }
  function request() {
      $('#myModalRequest').modal('show');
  }
  tbMlg.onclick = function() {
      modal.style.display = "block";
      document.getElementById("place_id").value = "0";
      console.log(  document.getElementById("place_id").value);
      modalHeader.innerHTML="Perjalanan ke Malang"
      return false;
  }
  tbSby.onclick = function() {
      modal.style.display = "block";
      document.getElementById("place_id").value = "1";
      console.log(  document.getElementById("place_id").value);
      modalHeader.innerHTML="Perjalanan ke Surabaya"
      return false;
  }
  tbBali.onclick = function() {
      modal1.style.display = "block";
      modalHeader1.innerHTML="Perjalanan ke Bali"
      modal1txt.innerHTML="Mohon maaf, kami masih mempersiapkan informasi tentang tempat wisata di Bali demi kenyamanan anda."
      return false;
  }
  tbYogya.onclick = function() {
      modal1.style.display = "block";
      modalHeader1.innerHTML="Perjalanan ke Yogya"
      modal1txt.innerHTML="Mohon maaf, kami masih mempersiapkan informasi tentang tempat wisata di Yogya demi kenyamanan anda."
      return false;
  }
  tbLombok.onclick = function() {
      modal1.style.display = "block";
      modalHeader1.innerHTML="Perjalanan ke Lombok"
      modal1txt.innerHTML="Mohon maaf, kami masih mempersiapkan informasi tentang tempat wisata di Lombok demi kenyamanan anda."
      return false;
  }
  tbBali.onclick = function() {
      modal1.style.display = "block";
      modalHeader1.innerHTML="Perjalanan ke Bali"
      modal1txt.innerHTML="Mohon maaf, kami masih mempersiapkan informasi tentang tempat wisata di Bali demi kenyamanan anda."
      return false;
  }
  tbBandung.onclick = function() {
      modal1.style.display = "block";
      modalHeader1.innerHTML="Perjalanan ke Bandung"
      modal1txt.innerHTML="Mohon maaf, kami masih mempersiapkan informasi tentang tempat wisata di Bandung demi kenyamanan anda."
      return false;
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
      modal1.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
      else if (event.target == modal1) {
          modal1.style.display = "none";
      }
  }
  </script>
@endsection
