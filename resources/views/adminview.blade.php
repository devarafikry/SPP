@extends('layouts.app_admin')


@section('content')
<?php
if(Session::get('message')==null){
  // dd(Session::get('message'));
}

?>
<script>
$(document).ready(function(){
  if("{{Session::get('message')}}"==1){
    alert("Tempat wisata baru berhasil ditambahkan");
  } else if("{{Session::get('message')}}"==2){
    alert("Tempat wisata berhasil diupdate");
  } else if("{{Session::get('message')}}"==3){
    alert("Tempat wisata berhasil dihapus");
  } 
});

</script>
<style>
.btn {
  font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
  border: none;
  border-radius: 5px;
  font-weight: 700;
  text-transform: uppercase;
}

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
    width: 100%;
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
text {
  padding: 0;
  width: 100%;
  display: table;
  font-weight: 0;
  font-size:18px;
  font-family: 'Proxima Nova';
}
</style>
<style>
section{
  padding-top: 0px;
  padding-bottom: 0px;
}
.glyphicon{
  color:white;
    font-size: 50px;
}
.plan{
    background-image: url("{{ asset('img/malang1.jpg') }}");;
    font-size: 50px;
}
th, td {
 padding: 5px; padding-right: 50px;
}
</style>
<section id="create">
  <div class="container">
        <h2>Daftar Lokasi</h2>
        <div class="form-group col-md-3">

        </div> <br><button id="btnTambah" type="button" class="btn btn-primary pull-right">Tambah</button> <br>
       <table class="table table-hover">
          <thead>
            <tr >
              <th>Nama Tempat</th>
              <th>Tanggal Ditambahkan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($places as $place)
            <tr>
              <td>{{$place->nama_tempat}}</td>
              <td>{{$place->created_at}}</td>
              <td  id="status_{{$place->id}}">
                <?php
                  if($place->status==1){
                    echo "Terverifikasi";
                  }
                  else{
                    echo "Belum Terverifikasi";
                  }
                  ?>
              </td>
              <td><button id="details_{{$place->id}}" type="button" class="btn btn-success pull-right">Details</button></td>
              <td>
                <?php
                if($place->status == 0){?>
                    <button id="verify_{{$place->id}}" type="button" class="btn btn-info pull-right">Verifikasi</button></td>
                <?php
              }else {?>
                </td>  <?php
              }?>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Tempat</h4>
            </div>
            <div class="modal-body">
                  {!! Form::open(['action'=>'PlaceController@store', 'files'=>true]) !!}

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
@foreach($places as $place)
<div class="modal fade" id="placeModal_{{$place->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <center><h4 class="modal-title" id="myModalLabel">{{$place->nama_tempat}}</h4></center>

            </div>
            <div class="modal-body">

                        <!-- Left and right controls --><center>
                        <img src="http:\\localhost\spp\public\uploads{{$place->photolink}}" width="400" alt="Chania"></center>
                      <br><center>
                        {!! Form::open(['action'=>'PlaceController@edit', 'files'=>true]) !!}
                        <input type="hidden" id="place_id" name="place_id" value="{{$place->id}}">
                          <input type="hidden" id="photolink" name="photolink" value="{{$place->photolink}}">
                        <button type="button" id="edit_{{$place->id}}" class="btn btn-success"  >Edit Tempat</button>
                        <button type="button" id="delete_{{$place->id}}" class="btn btn-danger " >Hapus Tempat</button>  <br>  <br>
                        <table>
                          <tr>
                            <th> Nama Tempat </th>
                            <td> : </td>
                            <td>

                              {!! Form::text('editnama', $place->nama_tempat, ['class'=>'form-control', 'rows'=>5, 'id'=>'editname_'.$place->id,'readonly'] ) !!}
                          </tr>
                          <tr>
                            <th> Kota </th>
                            <td> : </td>
                            <td>
                              {!! Form::label('kota', 'Pilih Kota') !!} <br>
                              {!! Form::select('editkota', $kotas->pluck('nama_kota'), null, [ 'id'=>'editkota_'.$place->id,'disabled']) !!}
                          </tr>

                          <tr>
                            <th> Deskripsi </th>
                            <td> : </td>
                            <td>   {!! Form::text('editdeskripsi', $place->deskripsi_tempat, ['class'=>'form-control', 'rows'=>5, 'id'=>'editdescription_'.$place->id,'readonly'] ) !!} </td>
                          </tr>
                          <tr>
                            <th> Estimasi Biaya </th>
                            <td> : </td>
                            <td>   {!! Form::number('editbiaya', $place->estimasi_biaya, ['class'=>'form-control', 'rows'=>5, 'id'=>'editbiaya_'.$place->id,'readonly'] ) !!} </td>
                          </tr>
                          <tr>
                            <th> Durasi </th>
                            <td> : </td>
                            <td>   {!! Form::number('editdurasi', $place->durasi_wisata, ['class'=>'form-control', 'rows'=>5, 'id'=>'editdurasi_'.$place->id,'readonly'] ) !!} </td>
                          </tr>
                          <tr>
                            <th> Status </th>
                            <td> : </td>
                            <td><p id="statusmodal_{{$place->id}}">
                              <?php
                                if($place->status == 0){?>
                                <font color="red"><b>Belum Terverifikasi</b></font>  <?php
                                }
                                else{?>
                                <font color="green"><b>Terverifikasi</b></font>  <?php
                                };
                               ?>
                             </p>
                               </td>
                          </tr>


                        </table>
                        <div id="uploadimg_{{$place->id}}" style="visibility:hidden" class="form-group error">
                          {!! Form::label('image', 'Choose Photo') !!}
                          {!! Form::file('image') !!}
                        </div>
                        <input type="submit" type="submit" id="submit_{{$place->id}}" class="btn btn-success col-md-12" style="visibility:hidden" value="submit">
</center>
                        {!! Form::close() !!}

                      </div>

                    <div class="modal-footer">

                          <button type="button" id="close"  onclick="btnClose()" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
        </div>
    </div>
</div>


<script>
  var span = document.getElementsByClassName("close")[0];
  var modal1 = document.getElementById('placeModal');
  var modal1txt = document.getElementById("modal1txt");
  var modalHeader1 = document.getElementById("modalHeader1");

  var placeModal = new Array();

      $("#details_{{$place->id}}").click(function(){
          console.log("details_{{$place->id}} clicked");
          $('#placeModal_{{$place->id}}').modal('show');
           $("#modalHeader").val("{{$place->id}}");
          $('#modalHeader').html("Perjalanan  ke"+"{{$place->id}}");
      });


    $('#closeModal_{{$place->id}}').onclick = function() {
      console.log("closeModal_{{$place->id}} clicked");

      $('#placeModal_{{$place->id}}').modal('hide');
  }

  $("#verify_{{$place->id}}").click(function(){
      console.log("verify_{{$place->id}} clicked");
      $.ajax({
          type: "GET",
          url: '{{ url('/verify')}}/{{$place->id}}',
          data: {place_id :'{{$place->id}}'},
          success:function(data){
             console.log("verify success");
             alert("Verifikasi Berhasil !");
             $( "#verify_{{$place->id}}" ).hide();
             $( "#status_{{$place->id}}" ).html("1");
             $( "#statusmodal_{{$place->id}}").html('<font color="green"><b>Terverifikasi</b></font>');

          }
        })
  });

  $('#user_button_{{$place->id}}').click(function(){
    console.log('clicked');
      $('#user_modal_{{$place->id}}').modal('show');

  });
  $('#message_button_{{$place->id}}').click(function(){
    console.log('clicked');
      $('#message_modal_{{$place->id}}').modal('show');

  });
  $('#edit_{{$place->id}}').on('click',function(){
    console.log('Edit {{$place->id}}');
    document.getElementById("editname_{{$place->id}}").readOnly = false;
    document.getElementById("editkota_{{$place->id}}").disabled = false;
    document.getElementById("editdurasi_{{$place->id}}").readOnly = false;
    document.getElementById("editdescription_{{$place->id}}").readOnly = false;

    document.getElementById("editbiaya_{{$place->id}}").readOnly = false;
    document.getElementById("submit_{{$place->id}}").style.visibility="visible";
      document.getElementById("uploadimg_{{$place->id}}").style.visibility="visible";
  });
  $('#delete_{{$place->id}}').on('click',function(){
    console.log('ini loh REK {{$place->id}}');
    window.location.href = '{{url("delete")}}/{{$place->id}}';
  });

  function btnPilih() {
      console.log("pilih");
   }

   $('#btnTambah').click(function(){
     console.log('clicked');


       $('#myModal').modal('show');

});
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal1) {
                $('#placeModal_{{$place->id}}').modal('hide');
            }
        }

  </script>
  @endforeach
@endsection
