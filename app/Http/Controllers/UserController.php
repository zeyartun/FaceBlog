<?php

namespace App\Http\Controllers;
use App\User;
use App\role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::paginate(9);
        return view('Back.members',compact('users'));
    }
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        // dd($user);
        $roles = role::all();
        return view('Back.UserEdit',compact('user','roles'));
    }

    public function update(Request $req, $id)
    {
        $Uname = $req->name;
        $Uemail = $req->email;

        $user = User::find($id);

        $image = $req->file('file');
        if($image != null){
            $img_name = time() . $image->GetClientOriginalName();
            $img_path = public_path('img/userImage');
            $image->move($img_path,$img_name);

            $old_img = $user->image;
            if($old_img != null){
                unlink(public_path().'/'.$old_img);
            }

            $image_path = 'img/userImage/'.$img_name;
            
        }else{
            $image_path = $user->image;
        }        
                
        $user->update([
            'name' => $Uname,
            'email' => $Uemail,
            'image' => $image_path,

        ]);

        Return redirect('adminHome/members')->with('success','User Edit Successfull...');
    }

}
