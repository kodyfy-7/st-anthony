<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin;
use App\Models\Profile;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function members()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.user.member', compact('users'));
    }

    public function administrators()
    {
        $admins = Admin::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.user.administrator', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin;
        return view('admin.user.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'role' => ['required', 'string']
        ]); 

        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => '$2y$10$ld.IBy52/UhtZwuCpNs3neM4Yz1GU5Kvyfo5pk48J0M/kjYAK.P7W',
            'super_admin' => $data['role']
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        return view('admin.user.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
