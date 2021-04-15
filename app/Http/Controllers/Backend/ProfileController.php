<?php

namespace App\Http\Controllers\Backend;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function viewProfile(){


        $id = Auth::user()->id;

        $user = User::find($id);

        return view('backend.user.view_profile',compact('user'));

    }


    public function editProfile(){


        $id = Auth::user()->id;

        $editData = User::find($id);

        return view('backend.user.edit_profile',compact('editData'));

    }


    public function updateProfile(Request $request){

        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address= $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');

            @unlink(public_path('upload/user_images'.$data->image));

            $filename = date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/user_images'),$filename);

            $data['image'] = $filename;

        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.profile')->with($notification);

    }


    public function editPassword(){
        return view('backend.user.edit_password');
    }

     public function changePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
         ]);

         $hashPassword = Auth::user()->password;
         if(Hash::check($request->oldpassword, $hashPassword)){
             $user = User::find(Auth::id());

             $user->password = Hash::make($request->password);

             $user->save();
             Auth::logout();

             return redirect()->route('login');
         } else{
             return redirect()->back();
         }
     }  //end Method


}
