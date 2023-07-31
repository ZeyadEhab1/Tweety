<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiProfilesController extends Controller
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
