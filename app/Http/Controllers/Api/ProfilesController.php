<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return [
            'user' => $user,
            'tweets' => $user
                ->tweets()
                ->withLikes()
                ->paginate(50),
        ];
    }
}
