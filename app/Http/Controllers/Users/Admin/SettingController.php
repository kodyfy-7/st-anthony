<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\MassDetails;
use App\Models\Station;
use App\Models\Contact;

class SettingController extends Controller
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
        $setting = Setting::latest()->first();
        //dd($setting);
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $setting = Setting::whereId($id)->update([
            'about' => $request->about,
            'history' => $request->history,
            'infant_baptism' => $request->infant_baptism,
            'benediction' => $request->benediction,
            'confession' => $request->confession,
            'catechism' => $request->catechism
        ]);

        $contact = Contact::whereId($id)->update([
            'setting_id' => $id,
            'email_address' => $request->email,
            'number_1' => $request->number_1,
            'number_2' => $request->number_2,
        ]);

        /*for($i = 0; $i < count($request->subject); $i++)
        {
            ClassroomSubject::create([
                'classroom_id' => $classroom->id,
                'subject_id' => $request->subject[$i]
            ]);
        }

        for($i = 0; $i < count($request->input('day')); $i++)
        {
            MassDetails::create([
                'setting_id' => $id,
                'day' => $request->input('day')[$i],
                'time' => $request->input('time')[$i]
                
            ]);
        }*/

        for($i = 0; $i < count($request->station); $i++)
        {
            Station::create([
                'setting_id' => $id,
                'station_name' => $request->station[$i],
                'station_address' => $request->address[$i]
                
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
        //
    }
}
