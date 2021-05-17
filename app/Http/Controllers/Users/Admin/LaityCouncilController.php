<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\LaityCouncil;

class LaityCouncilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function index()
    {
        $laity = LaityCouncil::all();
        return view('admin.laity.index', compact('laity'));
    }

    public function create()
    {
        $laity = new LaityCouncil;
        return view('admin.laity.create', compact('laity'));
    }

    public function show(LaityCouncil $laity)
    {

    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'user_member' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]); 

        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = "!@$#*%";
        $chars = $alpha . $alpha_upper . $numeric . $special;
        $length = 5;
        $chars = str_shuffle($chars);
        $slug = $chars.'-'.time();

        $laity = LaityCouncil::create([
            'user_id' => $data['user_member'],
            'laity_role' => $data['role'],
            'laity_slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data saved.');
    }

    public function edit(LaityCouncil $laity)
    {
        dd($laity);
        return view('admin.laity.edit', compact('laity'));
    }
}
