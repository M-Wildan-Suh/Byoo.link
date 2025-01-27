<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function web()
    {
        return $this->belongsTo(Web::class);
    }
}
