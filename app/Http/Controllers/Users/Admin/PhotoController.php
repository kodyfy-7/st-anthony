<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Models\Photo;

class PhotoController extends Controller
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
        $photos = Photo::all();
        return view('admin.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photo = new Photo;
        return view('admin.photo.create', compact('photo'));
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
            'caption' => ['required', 'string'],
            'image' => ['required', 'image', 'max:1999']
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        /*$imagePath = request('image')->store('images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();*/

        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        $photo = Photo::create([
            'caption' => $data['caption'],
            'photo_path' => $response,
            'admin_id' => auth()->user()->id,
            'photo_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(photo $photo)
    {
        return view('admin.photo.edit', compact('photo'));
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
            'caption' => ['required', 'string'],
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        $photo = Photo::whereId($id)->update([
            'caption' => $data['name'],
            'photo_slug' => $slug

        ]);

        if($request->hasFile('image')){
            /*$imagePath = request('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();*/

            $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

            $photo = Photo::whereId($id)->update([
                'photo_path' => $response
            ]);
        }

        return view('admin.photo.index')->with('success', 'Data saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Photo::findOrFail($id);
        //Storage::delete('public/'.$data->photo_path);
        $data->delete();
        return redirect()->back()->with('success', 'Data saved.');
    }
}
