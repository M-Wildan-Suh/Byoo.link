<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    public function webType()
    {
        return $this->belongsTo(WebType::class);
    }
    public function access()
    {
        return $this->hasMany(Access::class);
    }
    public function content()
    {
        return $this->hasOne(Content::class);
    }
    public function banner()
    {
        return $this->hasMany(Banner::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
    public function link()
    {
        return $this->hasMany(Link::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
    public function template()
    {
        return $this->hasOne(Template::class);
    }
    public function templatecolor()
    {
        return $this->hasOne(TemplateColor::class);
    }
}
