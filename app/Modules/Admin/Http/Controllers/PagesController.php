<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Models\PageDesc;
use App\Models\PageDescTranslation;

class PagesController extends Controller
{

	public function index()
	{
        $pages = Page::all();
		return view('admin::sections.pages.index', compact('pages'));
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::sections.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page();
        $page->status = $request->get('status') != '' ? 1 : 0;
        $page->save();

        $page->translateOrNew('en')->title = $request->get('en_title') ;
        $page->translateOrNew('ar')->title = $request->get('ar_title') ;
        $page->translateOrNew('en')->meta_title = $request->get('en_meta_title') ;
        $page->translateOrNew('ar')->meta_title = $request->get('ar_meta_title') ;
        $page->translateOrNew('en')->meta_keyword = $request->get('en_meta_keyword') ;
        $page->translateOrNew('ar')->meta_keyword = $request->get('ar_meta_keyword') ;
        $page->translateOrNew('en')->meta_description = $request->get('en_meta_description') ;
        $page->translateOrNew('ar')->meta_description = $request->get('ar_meta_description') ;
        $page->save();

        return redirect()->route('admin.pages.index')->with('message', 'Page created!');
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
        $page = Page::find($id);
        return view('admin::sections.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->status = $request->get('status') != '' ? 1 : 0;
        $page->save();

        $page->translateOrNew('en')->title = $request->get('en_title') ;
        $page->translateOrNew('ar')->title = $request->get('ar_title') ;
        $page->translateOrNew('en')->meta_title = $request->get('en_meta_title') ;
        $page->translateOrNew('ar')->meta_title = $request->get('ar_meta_title') ;
        $page->translateOrNew('en')->meta_keyword = $request->get('en_meta_keyword') ;
        $page->translateOrNew('ar')->meta_keyword = $request->get('ar_meta_keyword') ;
        $page->translateOrNew('en')->meta_description = $request->get('en_meta_description') ;
        $page->translateOrNew('ar')->meta_description = $request->get('ar_meta_description') ;
        $page->save();

        return redirect()->route('admin.pages.index')->with('message', 'Page updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        PageTranslation::wherePage_id($id)->delete();
        $descs = PageDesc::wherePage_id($id)->get();
        foreach ($descs as $desc) {
            PageDescTranslation::wherePage_desc_id($desc->id)->delete();
            $desc->delete();
        }
        $page->delete();

        return back()->with('message', 'Page deleted!');
    }

}
