<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Place;
use DB;
class PlaceController extends Controller
{
    //

    public function store(Request $request){

      $place = new Place();

     $place->kota_id=$request->kota;
     $place->nama_tempat = $request->nama;
     $place->deskripsi_tempat = $request->deskripsi;
     $place->photolink = $request->nama;
     $place->estimasi_biaya = $request->estimasi_biaya;
     $place->durasi_wisata = $request->durasi;
     $place->status = 1;


     if($request->hasFile('image')) {
         $file = Input::file('image');

         //getting timestamp
         $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

         $name = $timestamp. '-' .$file->getClientOriginalName();
         $place->photolink ="/images/$name";
         $file->move(base_path().'/public/uploads/images', $name);

     }
     $place->save();
     return redirect('admin')->with('message', '1');
    }

    public function request(Request $request){
      $place = new Place();

     $place->kota_id=$request->kota;
     $place->nama_tempat = $request->nama;
     $place->deskripsi_tempat = $request->deskripsi;
     $place->photolink = $request->nama;
     $place->estimasi_biaya = $request->estimasi_biaya;
     $place->durasi_wisata = $request->durasi;
     $place->status = 0;


 if($request->hasFile('image')) {
         $file = Input::file('image');

         //getting timestamp
         $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

         $name = $timestamp. '-' .$file->getClientOriginalName();
         $place->photolink ="/images/$name";
         $file->move(base_path().'/public/uploads/images', $name);

     }
     $place->save();

       return redirect('home')->with('message', '1');;
    }

    public function edit(Request $request)
    {

      $place = Place::find($request->place_id);

      $place->kota_id=$request->editkota;
      $place->nama_tempat = $request->editnama;
      $place->deskripsi_tempat = $request->editdeskripsi;
      $place->photolink = $request->nama;
      $place->estimasi_biaya = $request->editbiaya;
      $place->durasi_wisata = $request->editdurasi;
      $place->status = 1;
      if($request->hasFile('image')) {
              $file = Input::file('image');

              //getting timestamp
              $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

              $name = $timestamp. '-' .$file->getClientOriginalName();
              $place->photolink ="/images/$name";
              $file->move(base_path().'/public/uploads/images', $name);

          }
      else{
          $place->photolink =$request->photolink;
      }

        $place->save();

        return redirect('admin')->with('message', '2');
        }

        public function delete($place_id){

            // if(Auth::user()->type=="admin"){
            //   $username = Photo::find($photo_id)->username;
            // }
            // else{
            //   $username = Auth::user()->username;
            // }
              $place = Place::find($place_id);
              $place->delete();

                  return redirect('admin')->with('message', '3');
          }

          public function verify($place_id){
                $place = Place::find($place_id);
                $place->status = 1;
                $place->save();
          }

}
