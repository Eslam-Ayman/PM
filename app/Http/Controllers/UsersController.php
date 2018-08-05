<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 1) {
            return redirect('/projects');
        }
        $users = User::all();
        $users = $users->filter(function($item) {
                    return $item->type != 0;
                });
        return view('admin.pages.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'string',
            'image_name' => 'image',
        ]);

        $fileToStore = '../../dist/img/user2-160x160.jpg';
        if ($request->hasFile('image_name')) {
            $path = $request->file('image_name')->store('public/user_images');
            $fileToStore = $this->getUrl($path);
        }
        $user = new User();

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        $user->name = $request->name;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->image_path = $fileToStore;
        $user->save();

        return redirect('/home');
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
        $user = User::find($id);
        return view('admin.pages.users.update')->with('user' , $user);
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'phone' => 'string',
            'image_name' => 'image',
        ]);

        // $fileToStore = '../../dist/img/user2-160x160.jpg';
        $user = User::find($id);
        if ($request->hasFile('image_name')) {
            $path = $request->file('image_name')->store('public/user_images');
            $user->image_path = $this->getUrl($path);
        }

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->has('password')) {
            $user->password = \Hash::make($request->password);
            
        }

        $user->name = $request->name;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->image_path != '../../dist/img/user2-160x160.jpg') {
            // $this->getUrl($user->image_name) is equal to /public/posts_images/dsadad.jpg
            \Storage::delete($this->getUrl($user->image_path));
        }
        $user->delete();
        return back();
    }
}
