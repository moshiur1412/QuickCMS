<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requestes;
use App\User;
use Validator;
use Response;
use Auth;
use Image;


class UsersController extends Controller
{

    public function index()
    {
        if(Auth::user()->role != 'super admin'){
            return redirect('/dashboard');
        }
        $users = User::orderBy('updated_at', 'desc')->paginate(5);
        return view('backend.users.index', compact('users'));
    }


    public function addUser(Request $req)
    {

        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'
            );

        $validator = Validator::make(Input::all (), $rules);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt('password');
            $user->role = $req->role;
            $user->save();
            return response()->json($user);


        }
    }




    public function editUser(Request $req)  
    {
        if(!empty($req->name) && !empty($req->email)){
            $user = User::find($req->id);

            $user->name = $req->name;
            $user->email = $req->email;
            $user->role = $req->role;
            $user->save();
            return response()->json($user);
        }else{
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
    }



    public function deleteUser(Request $req)
    {
        User::find($req->id)->delete();
        return response()->json();
    }



    public function editProfile()
    {
        return view('backend.users.editProfile', array('user' => Auth::user()));
    }



    public function updateProfile(Request $input)
    {

       $this->validate($input, [
        'name' => 'required|max:255',
        'password' => 'min:6|confirmed'        
        ]);

       $user = User::find(Auth::user()->id);
       $user->name = $input["name"];
       if ($input->has('password'))
        $user->password = bcrypt($input['password']);

    if ($input->hasFile('avatar')) 
    {
        $image_old =$user->avatar;
        if ( $image_old != 'default.jpg') {
            unlink(public_path('upload/avatars/'.$image_old));
        }
        $avatar = $input->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/upload/avatars/'.$filename));
        $user->avatar=$filename;

    }
    $user->save();

    return view('backend.users.editProfile', compact('user'));
   

}
}




