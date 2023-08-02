<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;


use App\User;

class ExploreController extends Controller
{
    public function __invoke()
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}
