<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Tweet extends Model
{
    use Likable;
    // TODO: Use fillable instead of guarded
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        // TODO: Fix Styling, in PHPStorm use Ctrl + Alt + L for each file or search php cs fixer
        return $this ->hasMany (Like :: class);
    }
}
