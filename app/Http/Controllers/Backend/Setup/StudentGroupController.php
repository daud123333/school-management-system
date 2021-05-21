<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function viewGroup(){

        $allData= StudentGroup::all();

        return view('backend.setup.group.view_group',compact('allData'));


     }


     public function studentGroupAdd(){
        return view('backend.setup.group.add_group');
    }


    public function studentGroupdStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',

         ]);
      $data = new StudentGroup;

      $data->name = $request->name;



     $data->save();


      $notification = array(
        'message' => 'Class Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.group.view')->with($notification);

    }

public function studentGroupEdit($id){

    $editData = StudentGroup::find($id);
     return view('backend.setup.group.edit_group',compact('editData'));

}





public function studentGroupdUpdate(Request $request,$id){
    $updateData = StudentGroup::find($id);

    $validateData = $request->validate([
        'name' => 'required|unique:student_groups,name,'.$updateData->id

     ]);
    $updateData->name = $request->name;

    $updateData->save();

    $notification = array(
        'message' => 'Student Group Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.group.view')->with($notification);
}


public function studentGroupdDelete($id){
    $data = StudentGroup::find($id);
    $data->delete();

    $notification = array(
        'message' => 'Student Year Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('student.group.view')->with($notification);
}

}
