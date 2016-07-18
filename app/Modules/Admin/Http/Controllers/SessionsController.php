<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\SessionRequest;
use App\Models\Lecture;
use App\Models\Course;

class SessionsController extends Controller
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
        return view('admin::sections.sessions.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request)
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

        $session = new Lecture();

        $session->course_id = $request->get('course');
        $session->title = $request->get('title');
        $session->description = $request->get('description');
        $session->start_date = $request->get('start_date');
        $session->img = $image;
        $session->video = $request->get('video');
        $session->video_stop = $request->get('video_stop');
        $session->question = $request->get('question');
        $session->choice1 = $request->get('choice1');
        $session->choice2 = $request->get('choice2');
        $session->choice3 = $request->get('choice3');
        $session->correct_answer = $request->get('correct_answer');
        $session->status = $request->get('status') != '' ? 1 : 0;
        $session->save();

        return redirect()->route('admin.sessions.show', $session->course_id)->with('message', 'Cousre created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sessions = Lecture::whereCourse_id($id)->get();
        return view('admin::sections.sessions.index', compact('sessions'));
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
        $session = Lecture::find($id);
        return view('admin::sections.sessions.edit', compact('session', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequest $request, $id)
    {
        $session = Lecture::find($id);

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

        $session->course_id = $request->get('course');
        $session->title = $request->get('title');
        $session->description = $request->get('description');
        $session->start_date = $request->get('start_date');
        if(!empty($file)){
            $session->img = $image;
        }
        elseif (empty($file) && $remove == 1) {
            $session->img = null;
        }
        $session->video = $request->get('video');
        $session->video_stop = $request->get('video_stop');
        $session->question = $request->get('question');
        $session->choice1 = $request->get('choice1');
        $session->choice2 = $request->get('choice2');
        $session->choice3 = $request->get('choice3');
        $session->correct_answer = $request->get('correct_answer');
        $session->status = $request->get('status') != '' ? 1 : 0;
        $session->save();

        return redirect()->route('admin.sessions.show', $session->course_id)->with('message', 'Cousre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Lecture::find($id);
        $session->delete();

        return back()->with('message', 'Cousre deleted!');
    }

}
