<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use App\Place;
use Session;
use App\Kota;
use App\Admin;
class AuthController extends Controller
{
    //
    public function login(Request $request){
       if (Session::has('use')){
         $places = Place::all();
      $kotas = Kota::all();
         return view('adminview', compact('places','kotas'));
       }
       else{
         return view('login');
       }
    }

    public function auth(Request $request){

      $admin_uname = "devarafikry";
      $admin_psw = "fikryganteng";

      try {
          $admins = Admin::where('username',$request->uname)->first();

          if(md5($request->psw) == $admins->password)
            {
              $_SESSION['use']=$admin_uname;
              Session::put('use', $admin_uname);
              $places = Place::all();

              $value = Session::get('use');

              return redirect('admin');
            }
          else{
              return redirect('admin')->with("message",0);
          }
      } catch (\Exception $e) {
          return redirect('admin')->with("message",0);
      }

    }

    public function logout(Request $request){
        Session::flush();
        $value = Session::get('login');
    ?>

        <form action="{{ action('Controller@destroy') }}" method="POST">
    <input type="hidden" name="_method" value="DELETE">

</form>
<?php
  return redirect('admin');
    }
}
