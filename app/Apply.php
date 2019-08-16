<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    //
    protected $fillable = [
        'employer_id', 'seeker_id', 'job_id',
    ];
}
