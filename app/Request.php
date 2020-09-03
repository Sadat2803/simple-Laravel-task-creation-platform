<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'description', 'user_id','state','range_id','treated_by'
    ];
    protected $attributes = [
        'state' => 'pending',
        'treated_by'=>null,
    ];
}
