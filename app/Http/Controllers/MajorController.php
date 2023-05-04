<?php

namespace App\Http\Controllers;

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
}
