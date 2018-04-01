<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        //
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role :: pluck('name','id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(trim($request['password'])==""){

            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }



        if($file = $request->file('avatar_id')){

            $name = time() . $file->getClientOriginalName();

            $file-> move('resources/images/avatar',$name);

            $photo = Avatar::create(['name'=>$name]);

            $input['avatar_id']=$photo->id;
        }


        User::create($input);


        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User ::findOrFail($id);
        $roles = Role :: pluck('name','id')->all();

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User ::findOrFail($id);


        if(trim($request['password'])==""){

            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input ['password'] = bcrypt($request->password);

        }




        if($file=$request->file('avatar_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('resources/images/avatar',$name);

            $photo = Avatar::create(['name'=>$name]);

            $input ['avatar_id'] = $photo->id;

        }

        $user -> update($input);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User ::findOrFail($id);

        unlink(public_path().$user->photo->name);

        $user->delete();

        return redirect('/users');
    }

}
