<?php

namespace Story\Slider\Models\Translatable;

use Story\Core\Model;
use Store\Slider\Models\SliderItem;

class SliderItemTranslation extends Model
{
    public $timestamps = false;

    protected $table    = 'trans_sliders_items';
    protected $fillable = ['slider_item_id', 'title', 'subtitle', 'content'];

    public function sliderItem()
    {
        return $this->belongsTo(SliderItem::class);
    }
}
