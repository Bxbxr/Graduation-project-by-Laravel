<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($name)
    {
        $profile = User::where('name', $name)->firstOrFail();
        return view('profiles.show', [
            'profile' => $profile
        ]);
    }
}
