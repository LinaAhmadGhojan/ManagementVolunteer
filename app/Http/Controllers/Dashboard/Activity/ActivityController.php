<?php

namespace App\Http\Controllers\Dashboard\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ReviewRequestVolunteers;
use App\Http\Requests\RequestActivity;
class ActivityController extends Controller
{
    public function index()
   {

    return   response()->json(["activity"=>Activity::all()], 200);

   }



    #################### add Activity ##########################3
    public function add(RequestActivity $request)
    {
      //  $Initiative=Initiative::create([$request])  ;
      $activity=new Activity();
      $activity->time=$request->time;
      $activity->date=$request->date;
      $activity->place=$request->place;
      $activity->start_register=$request->start_register;
      $activity->end_register=$request->end_register;
      $activity->number_volunteer=$request->number_volunteer;
      $activity->id_admin=$request->id_admin;
      $activity->id_initiative=$request->id_initiative;
      $activity->save();
     return response()->json(["code"=>200,"message"=>" تم حفظ الفعالية الجديدة"." ".$activity->name." " ."بنجاح"], 200);
    }



     ##################    update Activity ###############################3
   public function update($id,RequestActivity $request)
   {
        $activity=Activity::find($id);
        $activity->time=$request->time;
        $activity->date=$request->date;
        $activity->place=$request->place;
        $activity->start_register=$request->start_register;
        $activity->end_register=$request->end_register;
        $activity->number_volunteer=$request->number_volunteer;
        $activity->id_admin=$request->id_admin;
        $activity->id_initiative=$request->id_initiative;
        $activity->save();

       return response()->json(["code"=>200,"message"=>" تم تعديل الفعالية"." ".$activity->name." " ."بنجاح"], 200);

   }


   ##################    delete Activity ###############################3
   public function delete($id)
   {
        $project=Activity::find($id);
        $project->delete();

       return response()->json(["code"=>200,"message"=>" تم حذف الفعالية"." ".$project->name." " ."بنجاح"], 200);

   }


 ##################  Accept Volnteer In Activity ###############################3
   public function acceptVolnteerInActivity($id)
   {
    $request_volunteer= ReviewRequestVolunteers::find($id);
    $request_volunteer->state='مقبول';
    $request_volunteer->save();
    return response()->json(['message'=>'تم قبول هذا الطلب'], 200);
   }



}
