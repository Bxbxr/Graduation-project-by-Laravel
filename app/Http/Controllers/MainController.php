<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $date = \Carbon\Carbon::today()->subDays(150);
        $title = 'الفيديوهات الأكثر مشاهدة خلال هذا الأسبوع';
        $videos = Video::join('views', 'videos.id', '=', 'views.video_id')
                        ->orderBy('views.views_number','Desc')
                        ->where('videos.created_at', '>=', $date)
                        ->take(16)
                        ->get('videos.*');
    
        return view('main', compact('videos', 'title'));
    }
    public function channelsVideos(User $channel)
    {
        $videos = Video::where('user_id',$channel->id)->get();
        $title = 'جميع المنشورات الخاصة بالمستخدم : '.  $channel->name;

        return view('videos.my-videos',compact('videos','title'));
    }
}
