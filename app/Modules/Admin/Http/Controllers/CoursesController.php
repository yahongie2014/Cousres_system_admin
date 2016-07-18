<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Module;

class CoursesController extends Controller
{

	public function index()
	{
        //
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin::sections.courses.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
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

        $course = new Course();

        $course->module_id = $request->get('module');
        $course->title = $request->get('title');
        $course->description = $request->get('description');
        $course->learn = $request->get('learn');
        $course->start_date = $request->get('start_date');
        $course->end_date = $request->get('end_date');
        $course->img = $image;
        $course->status = $request->get('status') != '' ? 1 : 0;
        $course->save();

        return redirect()->route('admin.courses.show', $course->module_id)->with('message', 'Cousre created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::whereModule_id($id)->get();
        return view('admin::sections.courses.index', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Module::all();
        $course = Course::find($id);
        return view('admin::sections.courses.edit', compact('course', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);

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

        $course->module_id = $request->get('module');
        $course->title = $request->get('title');
        $course->description = $request->get('description');
        $course->learn = $request->get('learn');
        $course->start_date = $request->get('start_date');
        $course->end_date = $request->get('end_date');
        if(!empty($file)){
            $course->img = $image;
        }
        elseif (empty($file) && $remove == 1) {
            $course->img = null;
        }
        $course->status = $request->get('status') != '' ? 1 : 0;
        $course->save();

        return redirect()->route('admin.courses.show', $course->module_id)->with('message', 'Cousre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return back()->with('message', 'Cousre deleted!');
    }

}
