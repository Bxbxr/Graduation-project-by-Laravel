<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user;
    
    public function __construct(User $user)
    {
        $this->user = $user ;
    }
    public function index()
    {
        $users= $this->user::where('active_status',false)->paginate(10);
        return view('admin.users.users-requests.accept-request', compact('users'));
    }
   public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->active_status = $request->has('active_status') ? 1 : 0;
    $user->save();
    return redirect()->back();
}


}
