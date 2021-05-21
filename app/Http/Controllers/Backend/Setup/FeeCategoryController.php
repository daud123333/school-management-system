<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function viewCategory(){

        $allData= FeeCategory::all();

        return view('backend.setup.category.view_category')->with('allData',$allData);


     }


     public function feeCategoryAdd(){
        return view('backend.setup.category.add_category');
    }


    public function feeCategoryStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',

         ]);
      $data = new FeeCategory;

      $data->name = $request->name;



     $data->save();


      $notification = array(
        'message' => 'Class Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('fee.category.view')->with($notification);

    }

public function feeCategoryEdit($id){

    $editData = FeeCategory::find($id);
     return view('backend.setup.category.edit_category',compact('editData'));

}





public function feeCategoryUpdate(Request $request,$id){
    $updateData = FeeCategory::find($id);

    $validateData = $request->validate([
        'name' => 'required|unique:student_groups,name,'.$updateData->id

     ]);
    $updateData->name = $request->name;

    $updateData->save();

    $notification = array(
        'message' => 'Fee Category Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('fee.category.view')->with($notification);
}


public function feeCategoryDelete($id){
    $data = FeeCategory::find($id);
    $data->delete();

    $notification = array(
        'message' => 'Fee Category Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('fee.category.view')->with($notification);
}

}
