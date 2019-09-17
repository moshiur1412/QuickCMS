<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Image;

use App\Http\Requests\StoreSliderRequest;

class SlidersController extends Controller
{
    protected $sliders;

    function __construct(Slider $sliders)
    {
        $this->sliders = $sliders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliders->orderBy('updated_at', 'desc')->paginate(4);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Slider $slider)
    {
        return view('backend.sliders.form', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $slider = new Slider;

        $slider->header = $request->header;
        $slider->content= $request->content;
        $slider->order  = $request->order;
        $slider->published = $request->published;

        if ($request->hasFile('image')) {
           $old_img =$slider->image;
           if ( $old_img != null) {
            unlink(public_path('/upload/sliders/'.$old_img));
        }

        $filename = time().'-'.$image->getClientOriginalName();
        Image::make($image->getRealPath())->resize(1600, 450)->save(public_path('upload/sliders/'.$filename));
        $slider->image = $filename;
    }
    $slider->save();

    return redirect(route('sliders.index'))->with('status', 'Slider image has been created!');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->sliders->findOrFail($id);
        
        return view('backend.sliders.form', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = $this->sliders->findOrFail($id);
        $slider->header = $request->header;
        $slider->content= $request->content;
        $slider->order  = $request->order;
        $slider->published = $request->published;


        if ($request->hasFile('image')) {
            $old_image = $slider->logo;

            if ($old_image!=null) {
                unlink(public_path('upload/sliders/'.$old_image));
            }

            $image = $request->file('image');
            $filename = time().'-'.$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(1600, 450)->save(public_path('upload/sliders/'.$filename));
            $slider->image = $filename;
        }

        $slider->save();

        return redirect(route('sliders.edit', $slider->id))->with('status', 'Slider image has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->sliders->findOrFail($id);
        $old_img =$slider->image;
           if ( $old_img != null) {
            unlink(public_path('/upload/sliders/'.$old_img));
        }
        $slider->delete();
        return redirect(route('sliders.index'))->with('status', 'Slider image has been deleted!');
    }
}
