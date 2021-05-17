<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Community;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all();
        return view('admin.community.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $community = new Community;
        return view('admin.community.create', compact('community'));
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

        $community = Community::create([
            'user_id' => $data['president'],
            'community_title' => $data['title'],
            'community_description' => $data['description'],
            'community_motto' => $data['motto'],
            'community_time_meeting' => $data['time'],
            'community_profile_photo_path' => $response,
            'community_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(community $community)
    {
        return view('admin.community.edit', compact('community'));
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

        $community = Community::whereId($id)->update([
            'user_id' => $data['president'],
            'community_title' => $data['title'],
            'community_description' => $data['description'],
            'community_motto' => $data['motto'],
            'community_time_meeting' => $data['time']
        ]);

        if($request->hasFile('image')){
            /*$imagePath = request('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();*/

            $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

            $community = Community::whereId($id)->update([
                'community_profile_photo_path' => $response
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
        $data = Community::findOrFail($id);
        //Storage::delete('storage/'.$data->community_profile_photo_path);
        $data->delete();
        return redirect()->back()->with('success', 'Data saved.');
    }
}
