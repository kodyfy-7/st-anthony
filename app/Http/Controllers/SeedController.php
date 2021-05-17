<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Setting;
use App\Models\User;
use App\Models\Station;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seed');
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
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$ld.IBy52/UhtZwuCpNs3neM4Yz1GU5Kvyfo5pk48J0M/kjYAK.P7W',
            'super_admin' => 1
        ]);

        /*$setting = Setting::create([
            'history' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem autem libero fugiat natus! Mollitia expedita obcaecati odio sequi, facere libero alias sapiente tenetur veritatis, error nemo repudiandae eligendi laudantium iure.',
        ]);*/

        $station = Station::create([
            'station_name' => 'St. Anthony',
            'station_type' => '0',
            'station_address' => 'Itele',
        ]);

        $station = Station::create([
            'station_name' => 'St. Bernadette',
            'station_type' => '1',
            'station_address' => 'Itele',
        ]);

        $user = User::create([
            'username' => 'test',
            'email' => 'test@email.com',
            'password' => '$2y$10$ld.IBy52/UhtZwuCpNs3neM4Yz1GU5Kvyfo5pk48J0M/kjYAK.P7W',
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
