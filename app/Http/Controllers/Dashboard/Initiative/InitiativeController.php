<?php

namespace App\Http\Controllers\Dashboard\Initiative;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;
use App\Http\Traits\SaveFile;

class InitiativeController extends Controller
{
    use SaveFile;
    ##################    all Initiative ###############################3
   public function index()
   {
     return   response()->json(["initiatives"=>Initiative::index()], 200);
   }


   #################### add Initiative ##########################3
  public function add(Request $request)
   {
     //  $Initiative=Initiative::create([$request])  ;
     $initiative=new Initiative();
     $initiative->name=$request->name;
     $initiative->description=$request->description;
     $initiative->id_admin=$request->id_admin;
     $initiative->id_project=$request->id_project;
     $initiative->image=$request->image;
    /*  $image=$this->SaveFile($request,'image',public_path('initiative'));
     $initiative->image=$image; */

     $initiative->save();
    return response()->json(["code"=>200,"message"=>" تم حفظ المبادرة"." ".$initiative->name." " ."بنجاح"], 200);
   }


   ##################    update Initiative ###############################3
   public function update($id,Request $request)
   {
        $initiative=Initiative::find($id);
        $initiative->name=$request->name;
        $initiative->description=$request->description;
        $initiative->id_admin=$request->id_admin;
        $initiative->image=$request->image;
     /*    $image=$this->SaveFile($request,'image',public_path('initiative'));
        $initiative->image=$image; */

        $initiative->save();
       return response()->json(["code"=>200,"message"=>" تم تعديل المبادرة"." ".$initiative->name." " ."بنجاح"], 200);

   }


    ##################    delete Initiative ###############################3
    public function delete($id)
    {
         $initiative=Initiative::find($id);
         $initiative->delete();

        return response()->json(["code"=>200,"message"=>" تم حذف المبادرة"." ".$initiative->name." " ."بنجاح"], 200);

    }
}
