<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
 


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
