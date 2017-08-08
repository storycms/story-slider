<?php

namespace Story\Slider\Models\Repositories;

use Storage;
use Illuminate\Http\Request;
use Story\Slider\Models\Slider;
use Story\Slider\Models\SliderItem;

class SliderRepositoryItem
{
    /**
     * Find slider item by given id
     *
     * @param int $id
     * @return \Story\Slider\Models\SliderItem
     */
    public function findById($id)
    {
        return SliderItem::find($id);
    }

    /**
     * Create new slider item
     *
     * @param Request $request
     * @param Slider $slider
     * @return boolean
     */
    public function create(Request $request, Slider $slider)
    {
        $locales = config()->get('translatable.locales');
        $data = [];
        $media = $media_mobile = '';

        foreach ($locales as $locale) {
            $data[$locale] = [
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content')
            ];
        }
        if ($request->hasFile('media')) {
            $media = $request->media->store('public/slider');
            $media = Storage::url($media);
        }

        if ($request->hasFile('media_mobile')) {
            $media_mobile = $request->media_mobile->store('public/slider');
            $media_mobile = Storage::url($media_mobile);
        }

        return SliderItem::create(
            array_merge($data, [
                'slider_id' => $slider->id,
                'image' => $media,
                'image_mobile' => $media_mobile
            ])
        );
    }

    /**
     * Perform update slider item
     *
     * @param Request $request
     * @param SliderItem $item
     * @return boolean
     */
    public function update(Request $request, SliderItem $item)
    {
        $media = $item->image;
        $media_mobile = $item->image_mobile;

        if ($request->hasFile('media')) {
            $media = $request->media->store('public/slider');
            $media = Storage::url($media);
        }

        if ($request->hasFile('media_mobile')) {
            $media_mobile = $request->media_mobile->store('public/slider');
            $media_mobile = Storage::url($media_mobile);
        }

        $item->image = $media;
        $item->image_mobile = $media_mobile;
        $item->title = $request->input('title');
        $item->subtitle = $request->input('subtitle');
        $item->content = $request->input('content');

        return $item->save();
    }
}
