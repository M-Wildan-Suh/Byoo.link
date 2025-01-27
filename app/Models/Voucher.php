<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function webType()
    {
        return $this->belongsTo(WebType::class);
    }
}
