<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('js/jquery.min.js') }}"> </script>
    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
  <link href="{{ asset('css/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" >
    <!-- Theme CSS -->
      <link href="{{ asset('css/creative.min.css') }}" rel="stylesheet" type="text/css" >

<style>
.navbar-default {
  background-color: white;

  font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
  -webkit-transition: all 0.35s;
  -moz-transition: all 0.35s;
  transition: all 0.35s;
}

.navbar-default .navbar-header .navbar-brand {
  color: #F05F40;
  font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
  font-weight: 700;
  text-transform: uppercase;
}
.navbar-default .navbar-header .navbar-brand:hover,
.navbar-default .navbar-header .navbar-brand:focus {
  color: #eb3812;
}
.navbar-default .navbar-header .navbar-toggle {
  font-weight: 700;
  font-size: 12px;
  color: #222222;
  text-transform: uppercase;
}
.navbar-default .nav > li > a,
.navbar-default .nav > li > a:focus {
  text-transform: uppercase;
  font-weight: 700;
  font-size: 13px;
  color: #222222;
}
.navbar-default .nav > li > a:hover,
.navbar-default .nav > li > a:focus:hover {
  color: #F05F40;
}
.navbar-default .nav > li.active > a,
.navbar-default .nav > li.active > a:focus {
  color: #F05F40 !important;
  background-color: transparent;
}
.navbar-default .nav > li.active > a:hover,
.navbar-default .nav > li.active > a:focus:hover {
  background-color: transparent;
}
.btn {
  font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
  border: none;
  border-radius: 5px;
  font-weight: 700;
    margin: 10px 20px 10px 10px;
  text-transform: uppercase;
}

</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body id="page-top">
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" href="{{ url('/home') }}">TourPlanner</a>

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/submitplan') }}">
  {!! csrf_field() !!}

                    </form>

  <button onclick="fprint()" class="btn btn-info -top pull-right">Print</button>

              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>
  <br><br><br>
<div class="row col-md-offset-0">

@yield('content')
</div>

  <!-- jQuery -->
  <script>
  var myHTMLDoc = "<html><head><title>mydoc</title></head><body>This is a test page</body></html>";
var uri = "data:application/octet-stream;base64,"+btoa(myHTMLDoc);



    function fprint(){
        window.print();

    }
    function fsave(){
        document.location = uri;
    }


  </script>


<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- Bootstrap Core JavaScript -->
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/scrollreveal.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

  <!-- Theme JavaScript -->
  <script type="text/javascript" src="{{ asset('js/creative.min.js') }}"></script>

  </body>

  </html>
