<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;



class UserController extends Controller
{
    
    public function view(){
    	$data['allData'] = User::all();
    	return view('backend.user.view-user', $data);
    	//$allData = User::all();
    	//dd($allData->toArray());
    	//dd('0k');
    	//return view('backend.user.view-user', compact('allData'));
    }
    public function add(){
        //$data['allData'] = User::all();
       // dd($data);
    	return view('backend.user.add-user');
    }
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'usertype' => 'required',
            'name' => 'required',
			'email' => 'required|unique:users,email',
			'password' => 'required',
			'password2' => 'required|same:password',

    	]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
		// $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Inserted Successfully.');;

    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = User::find($id);
        //dd($editData);
        return view('backend.user.edit-user', compact('editData'));
    }
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
		// $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success', 'Updated Successfully.');

    
    }
    public function destroy($id){
        $user = User::find($id);
        if(file_exists('public/upload/user_images/'. $user->image) AND !empty($user->image)){
            unlink('public/upload/user_images/'.$user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success', 'Data Deleted Successfully.');


    }

}
