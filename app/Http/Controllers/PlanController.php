<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Place;
use App\Plan;
use App\Kota;
use App\PlanPlace;
class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function addPlace($selectedid,$plan_id,$planplace_id){
           $plan = Plan::find($plan_id);
           $places = Place::where('kota_id',$plan->kota_id)->get();
           //   $date=date_create("2013-03-15");
           //
           $planplace = PlanPlace::find($planplace_id);
       $error = "false";

           if($planplace->place_id == 0){
             $planplace->place_id=$places[$selectedid]->id;


             $plan->total_biaya = $plan->total_biaya + $places[$selectedid]->estimasi_biaya;
             $plan->budget = $plan->budget - $places[$selectedid]->estimasi_biaya;
             if($plan->budget >0){
                       $plan->save();
                         $planplace->save();
             }
             else{
               $error = "true";
             }
             $link = Place::find($planplace->place_id)->photolink;
           }
           else{
             $currentplace = Place::find($planplace->place_id);

             $plan->total_biaya = $plan->total_biaya - $currentplace->estimasi_biaya;
             $plan->budget = $plan->budget + $currentplace->estimasi_biaya;

             $plan->save();

             $planplace->place_id=$places[$selectedid]->id;
             $planplace->save();

             $plan->total_biaya = $plan->total_biaya + $places[$selectedid]->estimasi_biaya;
             $plan->budget = $plan->budget - $places[$selectedid]->estimasi_biaya;

             if($plan->budget >0){
               $plan->save();
             }
             else{
               $error = "true";
             }

             $link = Place::find($planplace->place_id)->photolink;
           }

           $budget = $plan->budget;
           $data =  array('photolink'=>$link,
                      'budget'=>$budget,'error'=>$error);

           return $data ;
     }

    public function create(Request $request){
      $plan = new Plan();
      $plan->kota_id=$request->place_id;
      $plan->budget=$request->budget;
      $plan->total_biaya=0;
      $plan->waktu_tiba=$request->waktutiba;
      $plan->waktu_pulang=$request->waktupulang;
      $plan->save();
    $inserted_id = $plan->id;

      $date1 = date_create($plan->waktu_tiba);
      $date2 = date_create($plan->waktu_pulang);
      $diff=date_diff($date2,$date1,true);
      $days = $diff->format("%a");



      $time=strtotime($plan->waktu_tiba);
      $day=date("d",$time);
      $month=date("F",$time);
      $year=date("Y",$time);

      for ($i=0; $i<$days ; $i++){
        $planplace = new PlanPlace();
        $planplace->plan_id=$inserted_id;
        $planplace->place_id=0;
        $newdate = date('Y-m-d', strtotime($plan->waktu_tiba. " + {$i} days"));
        $planplace->waktu_plan=$newdate;
        $planplace->save();
      }


      $places = Place::where('kota_id',$request->place_id)->where('status',1)->get();
      $planplace = PlanPlace::where('plan_id',$inserted_id)->get();
      $plan = Plan::find($inserted_id);
        // $messages = Message::where('user_id',Auth::user()->id)->where('status','unread')->get();
      return view('createplan', compact('places','planplace'))->with('plan',$plan);
    }
    public function submit(Request $request)
    {
      $plan = Plan::find($request->plan_id);
      $place = Place::All();
      $planplace = PlanPlace::where('plan_id',$request->plan_id)->get();
      $kota = Kota::find($plan->kota_id);
      
      return view('completeplanpage', compact('planplace','place'))->with('plan',$plan)->with('kota',$kota);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
