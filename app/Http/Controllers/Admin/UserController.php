<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function user(){

        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list',$data);
    }

    /**
     * Show users information
     */
    public function add_users(){

        return view('backend.user.add-users-form');
    }

    /**
     * Store Users Information
     */
    public function store_users_data(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'passowrd' => 'required'
        ]);

        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->status = trim($request->status);
        dd($save);
        $save->save();

        return redirect('panel/user/list')->with('Sucess','User sucessfully created');
    }

    /**
     * Edit users Data
     */
    public function edit_user(Request $request, $id='')
    {

        $getUersData = User::getSingle($id);
        return view('backend.user.edit-users-form', compact(['getUersData']));
    }

    /**
     * Update user information
     */
    public function update_users_data(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8',
        ]);
        

        // Find the user by ID  
        $update = User::find($id);
        
        // Check if the user exists
        if (!$update) {
            return redirect('panel/user/list')->with('error', 'User not found');
        }

        // Update user data
        $update->name = trim($request->name);
        $update->email = trim($request->email);

        if (!empty($request->password)) {
            $update->password = Hash::make($request->password);
        }

        $update->status = trim($request->status);
        $update->save();
        // Redirect with success message
        return redirect()->back()->with('success', 'User successfully updated');
    }

    /**
     * Delete users
     */
    public function delete_user($id){

        // $user = User::select('*')->where('id','=',$id)->delete();
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('panel/user/list')->with('Sucess','User Deleted');
    }
}
