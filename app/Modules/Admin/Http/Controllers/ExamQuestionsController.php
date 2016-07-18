<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\ExamQuestionRequest;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\User;

class ExamQuestionsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamQuestionRequest $request)
    {
        //
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam_id = \Input::get('exam_id');
        // $question_answers = ExamQuestion::whereExam_id($exam_id)->whereQuestion_id($id)->whereQuestion_type(3)->get();
        $students = User::whereUser_type(3)->get();
        return view('admin::sections.exam_questions.index', compact('exam_id', 'id', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = ExamQuestion::find($id);

        // return $id;

        return view('admin::sections.exam_questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamQuestionRequest $request, $id)
    {
        $question = ExamQuestion::find($id);
        $question->mark = $request->get('mark');
        $question->save();

        return redirect()->route('admin.examQuestions.show', ['id' => $question->question_id,  'exam_id' => $question->exam_id])->with('message', 'Question corrected!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
