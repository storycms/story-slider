<?php

namespace Story\Slider\Models\Repositories;

use Illuminate\Http\Request;
use Story\Slider\Models\Slider;

class SliderRepository
{
    public function all()
    {
        return Slider::all();
    }

    public function create(Request $request)
    {
        return Slider::create([
            'name' => $request->input('name'),
            'user_id' => $request->user()->id
        ]);
    }

    public function findById($id)
    {
        return Slider::findOrFail($id);
    }

    public function findByName($name)
    {
        return Slider::where('name', $name)->firstOrFail();
    }
}
