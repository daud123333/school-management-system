<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function viewYear(){

        $allData= StudentYear::all();



     return view('backend.setup.year.view_year',compact('allData'));


     }


     public function studentYearAdd(){
        return view('backend.setup.year.add_year');
    }


    public function studentYearStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',

         ]);
      $data = new StudentYear();

      $data->name = $request->name;

     $data->save();


      $notification = array(
        'message' => 'Student Year Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.year.view')->with($notification);





}

public function studentYearEdit($id){

    $editData = StudentYear::find($id);
     return view('backend.setup.year.edit_year',compact('editData'));

}





public function studentYearUpdate(Request $request,$id){
    $updateData = StudentYear::find($id);

    $validateData = $request->validate([
        'name' => 'required|unique:student_years,name,'.$updateData->id

     ]);
    $updateData->name = $request->name;

    $updateData->save();

    $notification = array(
        'message' => 'Student Year Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('student.year.view')->with($notification);
}


public function studentYearDelete($id){
    $data = StudentYear::find($id);
    $data->delete();

    $notification = array(
        'message' => 'Student Year Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('student.year.view')->with($notification);
}



}
