<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Models\Module;

class ExamsController extends Controller
{

    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin::sections.exams.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $exam = new Exam();

        $exam->module_id = $request->get('module');
        $exam->duration = $request->get('duration');
        $exam->title = $request->get('title');
        $exam->scq_count = $request->get('scq_count');
        $exam->mcq_count = $request->get('mcq_count');
        $exam->essay_count = $request->get('essay_count');
        $exam->scq_mark = $request->get('scq_mark');
        $exam->mcq_mark = $request->get('mcq_mark');
        $exam->essay_mark = $request->get('essay_mark');
        $exam->save();

        return redirect()->route('admin.exams.show', $exam->module_id)->with('message', 'Exam created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_per = \Input::get('user_per');
        $exams = Exam::whereModule_id($id)->get();
        return view('admin::sections.exams.index', compact('exams', 'user_per'));
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
        $exam = Exam::find($id);
        return view('admin::sections.exams.edit', compact('exam', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, $id)
    {
        $exam = Exam::find($id);

        $exam->module_id = $request->get('module');
        $exam->duration = $request->get('duration');
        $exam->title = $request->get('title');
        $exam->scq_count = $request->get('scq_count');
        $exam->mcq_count = $request->get('mcq_count');
        $exam->essay_count = $request->get('essay_count');
        $exam->scq_mark = $request->get('scq_mark');
        $exam->mcq_mark = $request->get('mcq_mark');
        $exam->essay_mark = $request->get('essay_mark');
        $exam->save();

        return redirect()->route('admin.exams.show', $exam->module_id)->with('message', 'Exam updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return back()->with('message', 'Exam deleted!');
    }

}
