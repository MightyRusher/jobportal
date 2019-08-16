<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    //
    protected $fillable = [
        'employer_id', 'title', 'description',
    ];
}
