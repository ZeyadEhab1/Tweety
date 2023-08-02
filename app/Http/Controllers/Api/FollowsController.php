<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store (User $user)
    {

        auth()
            ->user()
            ->toggleFollow($user);

        return response()->json(['follow' => 'You followed'], 201);
    }
}
