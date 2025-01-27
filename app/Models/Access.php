<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function web()
    {
        return $this->belongsTo(Web::class);
    }
}
