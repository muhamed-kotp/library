<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable =[
        'content','user_id'
    ];

    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }
}
