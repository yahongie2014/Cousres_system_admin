<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\ExamDateRequest;
use App\Models\ExamDate;
use App\Models\Exam;

class ExamDatesController extends Controller
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
        $p_exams = Exam::all();
        return view('admin::sections.exam_dates.create', compact('p_exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamDateRequest $request)
    {
        $exam = new ExamDate();

        $exam->exam_id = $request->get('exam');
        $exam->start_date = $request->get('start_date');
        $exam->end_date = $request->get('end_date');
        $exam->save();

        return redirect()->route('admin.examDates.show', $exam->exam_id)->with('message', 'Exam Date created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exams = ExamDate::whereExam_id($id)->get();
        return view('admin::sections.exam_dates.index', compact('exams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p_exams = Exam::all();
        $exam = ExamDate::find($id);
        return view('admin::sections.exam_dates.edit', compact('exam', 'p_exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamDateRequest $request, $id)
    {
        $exam = ExamDate::find($id);

        $exam->exam_id = $request->get('exam');
        $exam->start_date = $request->get('start_date');
        $exam->end_date = $request->get('end_date');
        $exam->save();

        return redirect()->route('admin.examDates.show', $exam->exam_id)->with('message', 'Exam Date updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = ExamDate::find($id);
        $exam->delete();

        return back()->with('message', 'Exam Date deleted!');
    }

}
