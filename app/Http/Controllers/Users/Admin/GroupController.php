<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Group;
use DB;

class GroupController extends Controller
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
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = new Group;
        $members = DB::table('profiles')
                        ->join('users', 'profiles.user_id', '=', 'users.id')
                        ->select('users.*', 'profiles.id as profile_id')
                        ->get();
        return view('admin.group.create', compact('group', 'members'));
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
            'president' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'type' => ['required'],
            'motto' => ['required', 'string'],
            'time' => ['required', 'string'],
            'image' => ['required', 'image', 'max:1999']
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        /*$imagePath = request('image')->store('images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();*/

        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        $group = Group::create([
            'user_id' => $data['president'],
            'group_title' => $data['title'],
            'group_type' => $data['type'],
            'group_description' => $data['description'],
            'group_motto' => $data['motto'],
            'group_time_meeting' => $data['time'],
            'admin_id' => auth()->user()->id,
            'group_profile_photo_path' => $response,
            'group_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
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
            'president' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'motto' => ['required', 'string'],
            'time' => ['required', 'string'],
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        $group = Group::whereId($id)->update([
            'user_id' => $data['president'],
            'group_title' => $data['title'],
            'group_description' => $data['description'],
            'group_motto' => $data['motto'],
            'group_time_meeting' => $data['time']
        ]);

        if($request->hasFile('image')){
            /*$imagePath = request('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();*/

            $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

            $group = Group::whereId($id)->update([
                'group_profile_photo_path' => $response
            ]);
        }

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
        $data = Group::findOrFail($id);
        //Storage::delete('storage/'.$data->group_profile_photo_path);
        $data->delete();
        return redirect()->back()->with('success', 'Data saved.');
    }
}
