<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $user = User::findOrFail($id);

        return view('profiles.show', [
            'profile' => $user,
        ]);
    }
}
