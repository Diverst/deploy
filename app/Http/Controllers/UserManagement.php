<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    //
    public function index(){
        $filter = auth()->user()->role;
        $users = User::where('role','!=',$filter)->orderBy('created_at', 'desc')->get();
        return view('UserManagement', compact('users'));
        
    }

    public function addView(){

        return view('userForm');
    }

    public function add(Request $request){

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = bcrypt($data->password);
        $data->save();

        return redirect('/UserManagement');
    }

    public function editView($id){
        $user = User::find($id);
        return view('userForm', compact('user'));
    }

    public function edit($id, Request $request){

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->update();
        return redirect('/UserManagement');


    }

    public function delete ($id){

        $data = User::find($id);
        $data->delete();
        return redirect('/UserManagement');

    }

    public function indexProfile(){
        $id = auth()->user()->id;
        $data = User::find($id);
        // dd($data);
        return view('UserProfile',['data'=>$data]);
    }

    public function editProfileView($id){
        $data = User::find($id);

        return view('editProfile',['data'=>$data]);
    }

    public function editProfile($id,Request $request){
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        $data->update();

        return redirect('/UserProfile');
    }
}
