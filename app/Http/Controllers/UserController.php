<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Lib\Image;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();

        return view('setting', [
            'user' => $user[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $name = $request->name;
        $file = $request->file;

        $image = (isset($file) === true) ? Image::imageUpload($request) : '';

        $res = User::updateData($id, $name, $image);

        if ($res !== false) {
            echo 'ok';
        }
    }

}
