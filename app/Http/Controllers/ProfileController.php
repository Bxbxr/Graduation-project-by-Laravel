<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('accepted')->except('getId');
    }
    public function index()
    {
        $user = auth()->user();
        $videos = Video::join('views', 'videos.id', '=', 'views.video_id')
                ->where('videos.user_id', $user->id)
                ->orderBy('views.views_number','Desc')
                // ->where('videos.created_at', '>=', $date)
                ->take(16)
                ->get('videos.*');
        $majors = [];
        $users = [];
        
        $user = User::findOrFail($user->id);
        
        if ($user->type == 'university') {
                $users = $user->users;
                $majors = DB::table('university_majors')
                            ->join('majors', 'university_majors.major_id', '=', 'majors.id')
                            ->where('university_majors.user_id', '=', $user->id)
                            ->pluck('majors.name', 'majors.id');   
            }
        return view('profiles.show', [
            'profile' => $user,
            'majors' => $majors,
            'users' => $users,
            'videos' => $videos,
        ]);
    }
    
    public function videos()
    {
        $date = \Carbon\Carbon::today()->subDays(150);
        $title = 'الفيديوهات الأكثر مشاهدة خلال هذا الأسبوع';
        $videos = Video::join('views', 'videos.id', '=', 'views.video_id')
                        ->orderBy('views.views_number','Desc')
                        ->where('videos.created_at', '>=', $date)
                        ->take(16)
                        ->get('videos.*');
    
        return view('profiles.show', compact('videos', 'title'));
    }

    public function getId(int $id)
    {
        $majors = [];
        $users = [];
        $videos = Video::where('videos.user_id', $id)
        ->take(16)
        ->get('videos.*');
        
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
            'videos' => $videos
        ]);
    }
}
