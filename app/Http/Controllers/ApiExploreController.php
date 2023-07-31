<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiExploreController extends Controller
{
    public function __invoke()
    {
        return [
            'users' => User::paginate(50),
        ];
    }
}
