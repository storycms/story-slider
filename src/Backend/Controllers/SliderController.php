<?php

namespace Story\Slider\Backend\Controllers;

use Story\Slider\Backend\Requests\SliderRequest;
use Story\Slider\Models\Repositories\SliderRepository;

class SliderController extends Controller
{
    protected $sliders;

    public function __construct(SliderRepository $sliders)
    {
        $this->sliders = $sliders;
    }

    public function index()
    {
        $this->data['sliders'] = $this->sliders->all();

        return $this->view('slider.index');
    }

    public function store(SliderRequest $request)
    {
        $slider = $this->sliders->create($request);

        if ($slider) {
            session()->flash('info', 'Unable to create category');
        } else {
            session()->flash('message', 'Unable to create category');
        }

        return redirect()->back();
    }

    public function get($id)
    {
        $this->data['slider'] = $this->sliders->findById($id);

        return $this->view('slider.display');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
