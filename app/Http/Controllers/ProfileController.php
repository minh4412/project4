<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $id = session('id');
        $userinfo = Admin::join("class", "users.class_id", "=" , "class.class_id")
                            ->find($id);
    	return view('profile.profile', [
            "userinfo" => $userinfo,
            "search" => "",
        ]);
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
        $name = $request->get('name');
        $email = $request->get('email');
        $userinfo = Admin::find($id);
        $userinfo->name = $name;
        $userinfo->email = $email;
        $userinfo->save();
        return redirect(route('profile.index'));
    }

}
