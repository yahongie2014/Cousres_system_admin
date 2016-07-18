<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Exam;

class QuestionsController extends Controller
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
        $exams = Exam::all();
        $type = \Input::get('type');
        if ($type == 1) {
            return view('admin::sections.questions.create_single', compact('type', 'exams'));
        } elseif ($type == 2) {
            return view('admin::sections.questions.create_multi', compact('type', 'exams'));
        } else {
            return view('admin::sections.questions.create_essay', compact('type', 'exams'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $image1 = null;
        if(\Input::hasFile('file')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image1 = $file->move($destinationPath,$filename);
        }
        $image2 = null;
        if(\Input::hasFile('file_answer')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('file_answer');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image2 = $file->move($destinationPath,$filename);
        }
        $question = new Question();

        $question->exam_id = $request->get('exam');
        $question->question = $request->get('question');
        $question->question_type = $request->get('question_type');
        $question->question_answer = $request->get('question_answer');
        if ($request->get('question_type') == 3) {
            $question->file = $image1;
            $question->file_answer = $image2;
        } else {
            $question->file = null;
            $question->file_answer = null;
        }
        $question->save();

        if ($request->get('question_type') == 1) {
            foreach ($request->get('choices') as $key => $value) {
                $choice = new Choice();
                $choice->question_id = $question->id;
                $choice->choice = $value;
                if ($key == 0) {
                    $choice->is_correct = 1;
                } else {
                    $choice->is_correct = 0;
                }
                $choice->save();
            }
        }

        if ($request->get('question_type') == 2) {
            foreach ($request->get('correct_choices') as $key => $value) {
                $choice = new Choice();
                $choice->question_id = $question->id;
                $choice->choice = $value;
                $choice->is_correct = 1;
                $choice->save();
            }

            foreach ($request->get('wrong_choices') as $key => $value) {
                $choice = new Choice();
                $choice->question_id = $question->id;
                $choice->choice = $value;
                $choice->is_correct = 0;
                $choice->save();
            }
        }

        return back()->with('message', 'Question created!');
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
        $questions = Question::whereExam_id($id)->get();
        return view('admin::sections.questions.index', compact('questions', 'user_per'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->choices()->delete();
        $question->delete();

        return back()->with('message', 'Question deleted!');
    }

}
