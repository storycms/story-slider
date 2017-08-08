<?php

namespace Story\Slider\Models;

use Story\Core\Model;
use Dimsav\Translatable\Translatable;

class SliderItem extends Model
{
    use Translatable;

    public $timestamps = false;

    protected $table    = 'sliders_items';
    protected $fillable = ['slider_id', 'order', 'status', 'image', 'image_mobile'];

    public $translationModel = 'Story\Slider\Models\Translatable\SliderItemTranslation';
    public $translatedAttributes = [
        'title', 'subtitle', 'content'
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
