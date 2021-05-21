<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function viewShift(){

        $data['allData'] = StudentShift::all();

        return view('backend.setup.shift.view_shift',$data);


     }


     public function studentShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }


    public function studentShiftStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',

         ]);
      $data = new StudentShift;

      $data->name = $request->name;



     $data->save();


      $notification = array(
        'message' => 'Shift Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.shift.view')->with($notification);

    }

public function studentShiftEdit($id){

    $editData = StudentShift::find($id);
     return view('backend.setup.shift.edit_shift',compact('editData'));

}





public function studentShiftUpdate(Request $request,$id){
    $updateData = StudentShift::find($id);

    $validateData = $request->validate([
        'name' => 'required|unique:student_groups,name,'.$updateData->id

     ]);
    $updateData->name = $request->name;

    $updateData->save();

    $notification = array(
        'message' => 'Student Group Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.shift.view')->with($notification);
}


public function studentShiftDelete($id){
    $data = StudentShift::find($id);
    $data->delete();

    $notification = array(
        'message' => 'Student Year Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('student.shift.view')->with($notification);
}

}
