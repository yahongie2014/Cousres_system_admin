<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\PageDescRequest;
use App\Models\Slider;

class SlidersController extends Controller
{

	public function index()
	{
        $sliders = Slider::all();
        return view('admin::sections.sliders.index', compact('sliders'));
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::sections.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageDescRequest $request)
    {
        $image = null;
        if(\Input::hasFile('img')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('img');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image = $file->move($destinationPath,$filename);
        }

        $slider = new Slider();

        $slider->img = $image;
        $slider->arrange = $request->get('arrange');
        $slider->status = $request->get('status') != '' ? 1 : 0;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('message', 'Slider created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin::sections.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageDescRequest $request, $id)
    {
        $slider = Slider::find($id);

        $remove = \Input::get('remove');
        $file = \Input::file('img');
        if(\Input::hasFile('img')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('img');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image = $file->move($destinationPath,$filename);
        }

        if(!empty($file)){
            $slider->img = $image;
        }
        elseif (empty($file) && $remove == 1) {
            $slider->img = null;
        }
        $slider->arrange = $request->get('arrange');
        $slider->status = $request->get('status') != '' ? 1 : 0;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('message', 'Slider updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return back()->with('message', 'Slider deleted!');
    }

}
