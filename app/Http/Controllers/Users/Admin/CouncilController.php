<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Council;

class CouncilController extends Controller
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
    public function index()
    {
        $councils = Council::all();
        return view('admin.council.index', compact('councils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $council = new Council;
        return view('admin.council.create', compact('council'));
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
            'member' => ['required', 'string'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string']
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        $council = Council::create([
            'user_id' => $data['member'],
            'council_role' => $data['role'],
            'council_status' => $data['status'],
            'admin_id' => auth()->user()->id,
            'council_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(council $council)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(council $council)
    {
        return view('admin.council.edit', compact('council'));
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
        $data = request()->validate([
            'member' => ['required', 'string'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string']
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        $council = Council::whereId($id)->update([
            'user_id' => $data['member'],
            'council_role' => $data['role'],
            'council_status' => $data['status'],
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Council::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data saved.');
    }
}
