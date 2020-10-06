<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(\App\User $user){
        return view('profiles.show', [
            'profileUser' => $user,
            'threads'     => $user->threads()->paginate(30)
        ]);
    }
}
