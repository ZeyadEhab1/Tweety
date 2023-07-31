<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiFollowsController extends Controller
{
    public function store (User $user)
    {
        auth()
            ->user()
            ->toggleFollow($user);

        return response()->json(['follow' => 'You followed'], 201);
    }
}
