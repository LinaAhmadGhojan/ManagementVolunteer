<?php

namespace App\Http\Controllers\Dashboard\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use   App\Http\Requests\RequestProject;
use App\Models\Project;
use App\Http\Traits\SaveFile;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
   use SaveFile;
    ##################    all project ###############################3
   public function index()
   {
     return   response()->json(["projects"=>Project::all()], 200);
   }



  ##################    all Initiatives for project ###############################3

   public function allInitiatives($id)
   {


    return   response()->json(["initiatives"=>Project::find($id)->initiatives()], 200);
  }

   #################### add project ##########################3
  public function add(RequestProject $request)
   {
     //  $project=Project::create([$request])  ;
     $project=new Project();
     $project->name=$request->name;
     $project->description=$request->description;
     $project->id_admin=$request->id_admin;
     $project->image=$request->image;
    /*  $image=$this->SaveFile($request,'image',public_path('project'));
     $project->image=$image; */

     $project->save();
    return response()->json(["code"=>200,"message"=>" تم حفظ مشروع"." ".$project->name." " ."بنجاح"], 200);
   }


   ##################    update project ###############################3
   public function update($id,RequestProject $request)
   {
        $project=Project::find($id);
        $project->name=$request->name;
        $project->description=$request->description;
        $project->id_admin=$request->id_admin;
        $project->image=$request->image;
        /* $image=$this->SaveFile($request,'image',public_path('project'));
        $project->image=$image; */

        $project->save();
       return response()->json(["code"=>200,"message"=>" تم تعديل مشروع"." ".$project->name." " ."بنجاح"], 200);

   }


    ##################    delete project ###############################3
    public function delete($id)
    {
         $project=Project::find($id);
         $project->delete();

        return response()->json(["code"=>200,"message"=>" تم حذف مشروع"." ".$project->name." " ."بنجاح"], 200);

    }

}

