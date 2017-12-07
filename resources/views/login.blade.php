<!DOCTYPE html>
<html>
<?php
Session::put('login', "true");
 ?>
 <script>
if("{{Session::get('message')}}"==0){
     alert("Jangan coba-coba memasuki sistem kami");
 }
 </script>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    width: 20%;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
    width: 20%;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>
<center>
<h2>SPP Login</h2>

<form method="post" action="{{ url('/auth')}}">
  {!! csrf_field() !!}
  <div class="imgcontainer">
    <img src="http:\\localhost\spp\public\uploads\images\spy.png" alt="Avatar" class="avatar">
  </div>

  <div class="container" >
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">SPP Login</button>
    <a href="{{URL::to('home')}}">Lanjutkan ke Aplikasi SPP</a>
  </div>


</form>

</body>
</html>
