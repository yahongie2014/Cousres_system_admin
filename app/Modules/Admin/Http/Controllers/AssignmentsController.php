<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\AssignmentRequest;
use App\Models\Assignment;
use App\Models\Course;

class AssignmentsController extends Controller
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
        $courses = Course::all();
        return view('admin::sections.assignments.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentRequest $request)
    {
        $pdf = null;
        if(\Input::hasFile('file')) 
        {
            $destinationPath = 'uploads/files';
            $file = \Input::file('file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $pdf = $file->move($destinationPath,$filename);
        }

        $assignment = new Assignment();

        $assignment->course_id = $request->get('course');
        $assignment->title = $request->get('title');
        $assignment->question = $request->get('question');
        $assignment->mark = $request->get('mark');
        $assignment->start_date = $request->get('start_date');
        $assignment->end_date = $request->get('end_date');
        $assignment->file = $pdf;
        $assignment->status = $request->get('status') != '' ? 1 : 0;
        $assignment->save();

        return redirect()->route('admin.assignments.show', $assignment->course_id)->with('message', 'Assignment created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignments = Assignment::whereCourse_id($id)->get();
        return view('admin::sections.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $assignment = Assignment::find($id);
        return view('admin::sections.assignments.edit', compact('assignment', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssignmentRequest $request, $id)
    {
        $assignment = Assignment::find($id);

        $remove = \Input::get('remove');
        $file = \Input::file('file');
        if(\Input::hasFile('file')) 
        {
            $destinationPath = 'uploads/files';
            $file = \Input::file('file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $pdf = $file->move($destinationPath,$filename);
        }

        $assignment->course_id = $request->get('course');
        $assignment->title = $request->get('title');
        $assignment->question = $request->get('question');
        $assignment->mark = $request->get('mark');
        $assignment->start_date = $request->get('start_date');
        $assignment->end_date = $request->get('end_date');
        if(!empty($file)){
            $assignment->file = $pdf;
        }
        elseif (empty($file) && $remove == 1) {
            $assignment->file = null;
        }
        $assignment->status = $request->get('status') != '' ? 1 : 0;
        $assignment->save();

        return redirect()->route('admin.assignments.show', $assignment->course_id)->with('message', 'Assignment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();

        return back()->with('message', 'Assignment deleted!');
    }

}
