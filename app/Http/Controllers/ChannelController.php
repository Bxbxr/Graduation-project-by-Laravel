<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = User::where('type', 'university')->orderBy('created_at', 'desc')->get();
        $title = 'احدث الجامعات';

        return view('channels',compact('title','channels'));
    }
    public function search(Request $request)
    {
        $channels = User::where('name', 'like', "%{$request->term}%")->paginate(12);
        $title = ' عرض نتائج البحث عن: '. $request->term;
        return view('channels', compact('channels', 'title'));
        
    }
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.channels.index',compact('users'));
    }
    public function adminUpdate(Request $request,User $user)
    {
        
        $user->administration_level = $request->administration_level;
        $user->save();
       
        Session()->flash('flash_message', 'تم تعديل صلاحيات حساب هذا المستخدم  بنجاح');
         
        return redirect(route('channels.index'));
    }
    public function adminDelete(User $user)
    {
        $user->delete();

        session()->flash('flash_message','تم حذف حساب هذا المستخدم بنجاح');

        return redirect(route('channels.index'));
    }
    public function adminBlock(Request $request, User $user)
    {
        $user->block = 1;
        $user->save();

        session()->flash('flash_message','تم حظر حساب هذا المستخدم  بنجاح');
        return back();

    }
    public function blockedChannels()
    {
        $channels = User::where('block', 1)->get();
        return view('admin.channels.blocked-channels',compact('channels'));
    }
    public function openBlock(Request $request, User $user)
    {
        $user->block = 0;
        $user->save();

        session()->flash('flash_message','تم فك الحظر عن حساب هذا المستخدم  بنجاح');

        return redirect(route('channels.blocked'));
    }
    public function allChannels()
    {
        $channels = User::where('type', 'university')->orderBy('created_at', 'desc')->get();
        return view('admin.channels.all', compact('channels'));
    }
    public function allUsers()
    {
        $users = User::where('type', 'student')->orderBy('created_at', 'desc')->get();

        return view('admin.users.all', compact('users'));
    }
}
