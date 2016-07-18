<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\UniversityRequest;

use App\Models\University;

class UniversitiesController extends Controller
{

    public function index()
    {
        $universities = University::all();
        return view('admin::sections.universities.index', compact('universities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::sections.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {
        $university = new University();
        $university->name = $request->get('name');
        $university->arrange = $request->get('arrange');
        $university->save();

        return redirect()->route('admin.universities.index')->with('message', 'University created!');
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
        $university = University::find($id);
        return view('admin::sections.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UniversityRequest $request, $id)
    {
        $university = University::find($id);
        $university->name = $request->get('name');
        $university->arrange = $request->get('arrange');
        $university->save();

        return redirect()->route('admin.universities.index')->with('message', 'University updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::find($id);
        $university->delete();

        return back()->with('message', 'University deleted!');
    }

}
