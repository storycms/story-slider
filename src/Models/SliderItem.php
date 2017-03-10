<?php

namespace Story\Slider\Models;

use Story\Core\Model;
use Dimsav\Translatable\Translatable;

class SliderItem extends Model
{
    use Translatable;

    protected $table    = 'sliders_items';
    protected $fillable = ['slider_id', 'order', 'status', 'media'];

    public $translationModel = 'Story\Slider\Models\Translatable\SliderItemTranslation';
    public $translatedAttributes = [
        'slug', 'title', 'body', 'meta_title', 'meta_description', 'meta_keyword',
        'image_thumbnail', 'summary', 'link',
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
