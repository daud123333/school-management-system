<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function userView(){

        $data['allData'] = User::all();

        return view('backend.user.view_user',$data);
    }

    public function addUser(){

        return view('backend.user.add_user');
    }

    public function storeUser(Request $request){
        $validateData = $request->validate([
           'email' => 'required|unique:users',
           'name' => 'required'
        ]);

        $data = new User;
         $data->usertype = $request->usertype;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->password = bcrypt($request->password);

         $data->save();

         $notification = array(
             'message' => 'User Inserted Successfully',
             'alert-type' => 'success'
         );

         return redirect()->route('user.view')->with($notification);

    }

    public function editUser($id){
        $user =  User::find($id);

        return view('backend.user.edit_user',compact('user'));
    }

    public function updateUser(Request $request, $id){

         $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
      //  $data->password = bcrypt($request->password);

        $data->update();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);



    }


    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('user.view')->with($notification);
    }

}
