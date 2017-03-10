<?php

namespace Story\Slider\Models;

use Story\Core\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['name', 'user_id'];

    public function item()
    {
        return $this->hasMany(SliderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(\Story\Cms\Models\User::class);
    }
}
