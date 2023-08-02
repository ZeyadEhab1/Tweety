<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like(current_user());

        return response()->json(['data'=>'success'], 201);

    }


    public function destroy(Tweet $tweet)
    {
        $tweet->dislike(current_user());

        return response()->json(['data'=>'disliked'], 201);

    }

}
