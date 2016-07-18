<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\PageDescRequest;
use App\Models\Page;
use App\Models\PageDesc;
use App\Models\PageDescTranslation;

class PageDescsController extends Controller
{

	public function index()
	{
        $descs = PageDesc::all();
        return view('admin::sections.page_descs.index', compact('descs'));
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('admin::sections.page_descs.create', compact('pages'));
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

        $desc = new PageDesc();

        $desc->page_id = $request->get('page');
        $desc->img = $image;
        $desc->arrange = $request->get('arrange');
        $desc->status = $request->get('status') != '' ? 1 : 0;
        $desc->save();

        $desc->translateOrNew('en')->title = $request->get('en_title') ;
        $desc->translateOrNew('ar')->title = $request->get('ar_title') ;
        $desc->translateOrNew('en')->description = $request->get('en_description') ;
        $desc->translateOrNew('ar')->description = $request->get('ar_description') ;
        $desc->save();

        return redirect()->route('admin.pageDescs.show', $desc->page_id)->with('message', 'Page Description created!');
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
        $pages = Page::all();
        $desc = PageDesc::find($id);
        return view('admin::sections.page_descs.edit', compact('desc', 'pages'));
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
        $desc = PageDesc::find($id);

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
            $desc->img = $image;
        }
        elseif (empty($file) && $remove == 1) {
            $desc->img = null;
        }
        $desc->page_id = $request->get('page');
        $desc->arrange = $request->get('arrange');
        $desc->status = $request->get('status') != '' ? 1 : 0;
        $desc->save();

        $desc->translateOrNew('en')->title = $request->get('en_title') ;
        $desc->translateOrNew('ar')->title = $request->get('ar_title') ;
        $desc->translateOrNew('en')->description = $request->get('en_description') ;
        $desc->translateOrNew('ar')->description = $request->get('ar_description') ;
        $desc->save();

        return redirect()->route('admin.pageDescs.show', $desc->page_id)->with('message', 'Page Description updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desc = PageDesc::find($id);
        PageDescTranslation::wherePage_desc_id($id)->delete();
        $desc->delete();

        return back()->with('message', 'Page Description deleted!');
    }

}
