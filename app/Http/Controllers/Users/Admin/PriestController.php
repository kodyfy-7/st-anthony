<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Models\Priest;

class PriestController extends Controller
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
        $priests = Priest::all();
        return view('admin.priest.index', compact('priests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priest = new Priest;
        return view('admin.priest.create', compact('priest'));
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
            'number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string'],
            'image' => ['required', 'image', 'max:1999']
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        /*$imagePath = request('image')->store('images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();*/
        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        $priest = Priest::create([
            'priest_name' => $data['name'],
            'priest_number' => $data['number'],
            'priest_email' => $data['email'],
            'priest_role' => $data['role'],
            'priest_status' => $data['status'],
            'priest_profile_photo_path' => $response,
            'admin_id' => auth()->user()->id,
            'priest_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(priest $priest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(priest $priest)
    {
        return view('admin.priest.edit', compact('priest'));
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
            'name' => ['required', 'string'],
            'number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]); 

        $rand = mt_rand(0,100);
        $slug = $rand.'-'.time();

        $priest = Priest::whereId($id)->update([
            'priest_name' => $data['name'],
            'priest_number' => $data['number'],
            'priest_email' => $data['email'],
            'priest_role' => $data['role'],
            'priest_status' => $data['status'],
            'priest_slug' => $slug

        ]);

        if($request->hasFile('image')){
            /*$imagePath = request('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();*/

            $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

            $priest = Priest::whereId($id)->update([
                'priest_profile_photo_path' => $response
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
        $data = Priest::findOrFail($id);
        //Storage::delete('storage/'.$data->priest_profile_photo_path);
        $data->delete();
        return redirect()->back()->with('success', 'Data saved.');
    }
}
