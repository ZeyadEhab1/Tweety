<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// TODO: Separate The Api and Web Controllers to different namespaces ( folders )
// Then remove the useless prefix
class ApiExploreController extends Controller
{
    public function __invoke()
    {
        // TODO: Use API Resources in all your API Endpoints
        return [
            'users' => User::paginate(50),
        ];
    }
}
