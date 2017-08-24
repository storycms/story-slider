<?php

namespace Story\Slider\Backend\Controllers;

use Illuminate\Http\Request;
use Story\Slider\Backend\Requests\SliderRequest;
use Story\Slider\Models\Repositories\SliderRepository;
use Story\Slider\Models\Repositories\SliderRepositoryItem;

class SliderItemController extends Controller
{
    protected $sliders;
    protected $items;

    public function __construct(SliderRepository $sliders, SliderRepositoryItem $items)
    {
        $this->sliders = $sliders;
        $this->items = $items;
    }

    public function index($id)
    {
        $sliders = $this->sliders
            ->findById($id)
            ->load('item', 'user');

        return $this->view('slider-item.index', compact('sliders'));
    }

    /**
     * Create new slider item
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $slider = $this->sliders->findById($id);

        if ($this->items->create($request, $slider)) {
            session()->flash('info', 'Slider item created.');
        } else {
            session()->flash('error', 'Unable to create slider item.');
        }

        return redirect()->back();
    }

    public function get($id)
    {

    }

    /**
     * Display html form to edit slider
     *
     * @param Request $request
     * @param int $id
     * @param int $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, $item)
    {
        $slider = $this->sliders->findById($id);
        $item  = $this->items->findById($item);

        return $this->view('slider-item.edit', compact('item'));
    }

    /**
     * Handle update request from user
     *
     * @param Request $request
     * @param int $id
     * @param int $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $item)
    {
        $item  = $this->items->findById($item);

        if ($this->items->update($request, $item)) {
            session()->flash('info', 'Slider item is updated.');
        } else {
            session()->flash('info', 'Unable to update slider item.');
        }

        return redirect()->back();
    }

    /**
     * Handle delete request from user
     *
     * @param  Request $request
     * @param  int  $id
     * @param  int $item
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $item = $this->items->findById($id);

        if ($this->items->delete($request, $item)) {
            session()->flash('info', 'Deleted Slider item.');
        } else {
            session()->flash('info', 'Unable to delete slider item.');
        }

        return redirect()->back();
    }
}
