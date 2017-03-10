<?php

namespace Story\Slider;

use Story\Models\Repositories\SliderRepository;

class Slider
{
    protected $sliders;

    public function __construct(SliderRepository $sliders)
    {
        $this->sliders = $sliders;
    }

    public function display($name)
    {
        $slider = $this->slider->findByName($name);

        return view('slider::display', compact('slider'));
    }
}
