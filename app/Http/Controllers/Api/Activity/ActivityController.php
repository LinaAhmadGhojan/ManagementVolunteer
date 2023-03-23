<?php

namespace App\Http\Controllers\Api\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ReviewRequestVolunteers;
use App\Models\ActivtyCommentVolunteer;
use App\Http\Requests\RequestActivity;
class ActivityController extends Controller
{


#####################################  register Volnteer In Activity  ###########################
   public function registerVolnteerInActivity(Request $request)
   {
     $user =  auth('sanctum')->user();
     $request->validate(['id_activity' => 'required']);
     $RequestVolunteers=new ReviewRequestVolunteers();
     $RequestVolunteers->id_activity=$request->id_activity;
     $RequestVolunteers->id_volunteer=$user->id;
      $RequestVolunteers->save();
      return response()->json(['message'=>'تم تسجيلك في الفعالية بنجاح سيتم أخبارك لاحقاً إن كنت من المقبولين'], 200,);

   }



#####################################  Activty Comment Volunteer  ###########################
public function commentVolnteerToActivity(Request $request)
{
  $user =  auth('sanctum')->user();
  $request->validate(['comment' => 'required']);
  $RequestVolunteers=new ActivtyCommentVolunteer();
  $RequestVolunteers->id_activity=$request->id_activity;
  $RequestVolunteers->comment=$request->comment;
  $RequestVolunteers->id_volunteer=$user->id;
   $RequestVolunteers->save();
   $activity=Activity::find($request->id_activity);
   $activity->number_comment+=1;
   $activity->save();

   return response()->json(['message'=>'تم التعليق على الفعالية بنجاح'], 200,);

}


#####################################  like Volnteer Activity  ###########################
public function likeVolnteerActivity(Request $request)
{
  $user =  auth('sanctum')->user();
  $request->validate(['id_activity' => 'required']);

   $activity=Activity::find($request->id_activity);
   $activity->number_like+=1;
   $activity->save();

   return response()->json(['message'=>'تم الاعجاب  للفعالية بنجاح'], 200,);

}


#####################################  note admin to Activity  ###########################
public function noteAdminVolnteerActivity(Request $request)
{
    $user =  auth('sanctum')->user();
    $request->validate(['id_activity' => 'required','note'=>'required']);

   $activity=Activity::find($request->id_activity);
   $activity->note_admin=$request->note;
   $activity->save();
   return response()->json(['message'=>'تم إضافة ملاحظات مشرف الفعالية'], 200,);
}



#####################################  end activity  ###########################
public function endVolnteerActivity(Request $request)
{
    $user =  auth('sanctum')->user();
  $request->validate(['id_activity' => 'required']);

   $activity=Activity::find($request->id_activity);
   $activity->state=3;
   $activity->save();

   return response()->json(['message'=>'تم إنهاء الفعالية بنجاح'], 200,);

}


}
