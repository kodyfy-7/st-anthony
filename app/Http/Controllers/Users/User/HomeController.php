<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Intervention\Image\Facades\Image;

use App\Models\Profile;
use App\Models\User;
use App\Models\Council;
use App\Models\Priest;
use App\Models\Photo;
use App\Models\Ministry;
use App\Models\Community;
use App\Models\Liturgical;
use App\Models\Group;
use App\Models\MemberGroup;
use App\Models\GroupSummary;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'laity', 'gallery', 'organization', 'society', 'community', 'liturgical', 'group']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('user.welcome');
    }

    public function laity()
    {
        $priests = Priest::wherePriestStatus(1)->get();
        $councils = Council::whereCouncilStatus(1)->get();
        return view('user.laity', compact('priests', 'councils'));
    } 

    public function gallery()
    {
        $photos = Photo::all();
        return view('user.gallery', compact('photos'));
    } 

    public function organization()
    {
        $groups = Group::whereGroupType(1)->get();
        $groupName = 'Organizations';
        return view('user.group.index', compact('groups', 'groupName'));
    } 

    public function society()
    {
        $groups = Group::whereGroupType(2)->get();
        $groupName = 'Societies';
        return view('user.group.index', compact('groups', 'groupName'));
    } 

    public function liturgical()
    {
        $groups = Group::whereGroupType(3)->get();
        $groupName = 'Liturgical Societies';
        return view('user.group.index', compact('groups', 'groupName'));
    } 

    public function community()
    {
        $groups = Group::whereGroupType(4)->get();
        $groupName = 'Basic Christian Communities';
        return view('user.group.index', compact('groups', 'groupName'));
    }     
    
    public function group(Group $group)
    {
      $gt =$group->group_type;
      switch ($gt) {
        case $gt == 1:
          $groupName = 'Organizations';
          break;
        case $gt == 2:
          $groupName = 'Societies';
          break;
        case $gt == 3:
          $groupName = 'Liturgical Groups';;
          break;
        default:
          $groupName = 'Organization';
      }
      
      $meetingSummary = GroupSummary::whereGroupId($group->id)->latest()->first();
      
        return view('user.group.show', compact('group', 'groupName', 'meetingSummary'));
    }     
    
    public function group_summary_save(Request $request)
    {
      $data = request()->validate([
            'group_id' => ['required', 'string'],
            'summary' => ['required', 'string']
        ]); 
        
        $slug = 'asgdu';
        
        $oldSummary = GroupSummary::whereGroupId($data['group_id'])->latest()->first();
        
        if($oldSummary)
        {
          groupSummary::whereId($oldSummary->id)->update([
              'summary_status' => 1
            ]);
        }
        
      $summary = GroupSummary::create([
            'group_id' => $data['group_id'],
            'summary' => $data['summary'],
            'summary_slug' => $slug
            
        ]);
        
      return redirect()->back()->with('success', 'Data saved.');
      
    }
    
    public function index()
    {
        $profile = Profile::whereUserId(auth()->user()->id)->first();
        $mem = MemberGroup::whereUserId(auth()->user()->id)->get();
        /*if($memck)
            $mem = MemberGroup::whereUserId(auth()->user()->id)->get();
        else{
            $mem = '';
        }*/
        $groups = Group::orderBy('group_title', 'asc')->get();
        $groups1 = Group::whereGroupType(1)->orderBy('created_at', 'desc')->get();
        $groups2 = Group::whereGroupType(2)->orderBy('created_at', 'desc')->get();
        $groups3 = Group::whereGroupType(3)->orderBy('created_at', 'desc')->get();
        $groups4 = Group::whereGroupType(4)->orderBy('created_at', 'desc')->get();

        return view('user.dashboard', compact('profile', 'groups', 'groups1','groups2','groups3','groups4', 'mem'));
    }

    public function save_profile(Request $request)
    {
        $id = auth()->user()->id;
        $imageStatus = auth()->user()->profile->profile_photo_path;
        $response = '';
        
        $data = request()->validate([
            'full_name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'home_address' => ['required', 'string'],
            'birthday' => ['required', 'string'],
        ]); 
        
        if (empty($imageStatus)) {
            $this->validate($request, [
                
            'image' => ['required', 'image', 'max:1999']
            ]);

            $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        /*if($request->hasFile('image')){
            $imagePath = request('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }*/

        $profile = Profile::whereUserId($id)->update([
            'title' => $data['title'],
            'full_name' => $data['full_name'],
            'gender' => $data['gender'],
            'home_address' => $data['home_address'],
            'mobile_number' => $data['mobile_number'],
            'birthday' => $data['birthday'],
            'station_id' => $request->input('station'),
            'baptism_place' => $request->input('baptism_place'),
            'baptism_date' => $request->input('baptism_date'),
            'baptism_minister' => $request->input('baptism_minister'),
            'baptism_number' => $request->input('baptism_number'),
            'communion_place' => $request->input('communion_place'),
            'communion_date' => $request->input('communion_date'),
            'communion_minister' => $request->input('communion_minister'),
            'confirmation_name' => $request->input('confirmation_name'),
            'confirmation_place' => $request->input('confirmation_place'),
            'confirmation_date' => $request->input('confirmation_date'),
            'confirmation_minister' => $request->input('confirmation_minister'),
            'marriage_spouse' => $request->input('marriage_spouse'),
            'marriage_place' => $request->input('marriage_place'),
            'marriage_date' => $request->input('marriage_date'),
            'marriage_minister' => $request->input('marriage_minister'),
            'maiden_name' => $request->input('maiden_name'),
            'profile_photo_path' => $response,
            'profile_status' => 1,
        ]);

        if($request->groups)
        {
            for($i = 0; $i < count($request->groups); $i++)
            {
                MemberGroup::create([
                    'user_id' => $id,
                    'group_id' => $request->groups[$i],
                    
                ]);
            }
        }
        
        return redirect()->back()->with('success', 'Data saved.');
    }

    public function profile()
    {
        $groups = Group::orderBy('created_at', 'desc')->get();
        return view('user.profile', compact('groups'));
    }
}
