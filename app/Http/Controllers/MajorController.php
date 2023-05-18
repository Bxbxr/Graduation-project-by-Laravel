<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public $major;

    public function __construct(Major $major)
    {
        $this->middleware(['accepted'])->except(['allPosts','channelLastPosts','show']);

        $this->major = $major;
    }
 
        public function create()
    {
        $title = 'اضافة تخصص جديد';
        return view('admin.majors.create', compact('title'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'description'=>'required',
            'goals'=>'required',
            'jobs_in_future'=>'required',
        ]);
        
        $major = Major::create([
            'name' => $request->name,
            'description' => $request->description,
            'goals' => $request->goals,
            'jobs_in_future' => $request->jobs_in_future
        ]);

        $request->user()->majors()->attach($major->id);
        $userMajors = $request->user()->majors;
        return back()->with('success', 'تم الحفظ بنجاح');
    }



    public function getByUniversityId($id)
{
    $major = DB::table('university_majors')
                ->join('majors', 'university_majors.major_id', '=', 'majors.id')
                ->where('university_majors.user_id', '=', $id)
                ->pluck('majors.name', 'majors.id');
                
                
    return response()->json($major);
}
public function show($id)
{
    $major = Major::select('majors.name', 'majors.description', 'majors.goals','majors.jobs_in_future')->findOrFail($id);

    return view('majors.show', compact('major'));
}

public function all()
{
    $majors = Major::all();

    return view('layouts.show-majors', compact('majors'));
}


}
