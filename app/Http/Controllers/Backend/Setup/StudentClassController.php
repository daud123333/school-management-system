<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{

     public function viewClass(){

        $data['allData'] = StudentClass::all();

        return view('backend.setup.student_class.view_class',$data);


     }

     public function studentClassAdd(){
         return view('backend.setup.student_class.add_class');
     }


     public function studentClassStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',

         ]);
      $data = new StudentClass;

      $data->name = $request->name;

      $data->save();


      $notification = array(
        'message' => 'Class Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.class.view')->with($notification);


}


public function studentClassEdit($id){

    $editData = StudentClass::find($id);
     return view('backend.setup.student_class.edit_class',compact('editData'));

}



public function studentClassUpdate(Request $request,$id){
    $updateData = StudentClass::find($id);

    $validateData = $request->validate([
        'name' => 'required|unique:student_classes,name,'.$updateData->id

     ]);
    $updateData->name = $request->name;

    $updateData->save();

    $notification = array(
        'message' => 'Class Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.class.view')->with($notification);
}


public function studentClassDelete($id){
    $data = StudentClass::find($id);
    $data->delete();

    $notification = array(
        'message' => 'User Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('student.class.view')->with($notification);
}


}
