<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profiles.show', [
            'profile' => auth()->user()
        ]);
    }

    public function getId(int $id)
    {
        $majors = [];
        $users = [];
        
        $user = User::findOrFail($id);
        
        if ($user->type == 'university') {
                $users = $user->users;
                $majors = DB::table('university_majors')
                            ->join('majors', 'university_majors.major_id', '=', 'majors.id')
                            ->where('university_majors.user_id', '=', $id)
                            ->pluck('majors.name', 'majors.id');   
            }

        return view('profiles.show', [
            'profile' => $user,
            'majors' => $majors,
            'users' => $users,
        ]);
    }
}
