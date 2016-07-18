<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Models\Choice;
use App\Models\Question;
use App\Models\ExamQuestions;
use App\Models\Module;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Input;
use Auth;
use DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user_id = Auth::user()->id;
        $now = Carbon::now();
        $module = Module::where('start_date', '<', $now)->where('end_date', '>', $now)->first();
     $exam = Exam::where('module_id' , $module->id)->first();

     $total_mcq = $exam->mcq_mark * $exam->mcq_count;
     $total_scq = $exam->scq_mark * $exam->scq_count;
     $total_essay = $exam->essay_mark * $exam->essay_count;
     $total = $total_essay + $total_scq + $total_mcq;
     $module = Module::find($exam->module_id);
     $dates = DB::table('exam_dates')->where('exam_id', $exam->id)->get();

     $picked_date = DB::table('student_exam')->where('user_id', '=', $user_id)->where('exam_id', '=', $exam->id)->first();
     if (empty($picked_date)) {
        return view('sections.exams', compact('exam', 'total', 'module', 'dates', 'picked_date'));
         
     }
     else 
     {
     $date = DB::table('exam_dates')->where('exam_id', $exam->id)->where('id', $picked_date->date_id)->first();

        return view('sections.exams', compact('exam','date', 'total', 'module', 'dates', 'picked_date'));

     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user_id = Auth::user()->id;
        
        $exam = Exam::find($id);
        $exam_count = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->get();
        $exam_counter = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->count();
        $exam_questions = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->where('is_answered', NULL)->first();
        if (!empty($exam_questions)) {
            
        $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', NULL)->where('id', '>', $exam_questions->id )->first();
                             }
     
         $total_mcq = $exam->mcq_mark * $exam->mcq_count;
         $total_scq = $exam->scq_mark * $exam->scq_count;
         $total_essay = $exam->essay_mark * $exam->essay_count;
         $total = $total_essay + $total_scq + $total_mcq;

        if (empty($exam_questions)) {
         
        $mcq_questions   = Question::where('exam_id', $exam->id)->where('question_type', '2')->take($exam->mcq_count)->orderByRaw("RAND()")->get();
        $essay_questions =Question::where('exam_id', $exam->id)->where('question_type', '3')->take($exam->essay_count)->orderByRaw("RAND()")->get();
        $scq_questions   =Question::where('exam_id', $exam->id)->where('question_type', '1')->take($exam->scq_count)->orderByRaw("RAND()")->get();
        // insert generated 
      

        foreach ($mcq_questions as $mcq_question) 
        {   

         DB::table('exam_questions')
                     ->insert([
                        'user_id' => $user_id,
                        'exam_id' => $exam->id,
                        'question_id' => $mcq_question->id,
                        'question_type' => $mcq_question->question_type,
                        'created_at'=> Carbon::now()]);
        }
       

        foreach ($essay_questions as $essay_question) 
        {           
         DB::table('exam_questions')
                     ->insert([
                        'user_id' => $user_id,
                        'exam_id' => $exam->id,
                        'question_id' => $essay_question->id,
                        'created_at'=> Carbon::now(), 
                        'question_type' => $essay_question->question_type]);
        }
       

        foreach ($scq_questions as $scq_question) 
        {    
         DB::table('exam_questions')
                     ->insert([
                        'user_id' => $user_id,
                        'exam_id' => $exam->id,
                        'question_id' => $scq_question->id,
                        'created_at'=> Carbon::now(), 
                        'question_type' => $scq_question->question_type]);
        }


        return Redirect::refresh();
        $exam_count = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->count();
        $ans_count= ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->where('is_answered', '1')->count();

        $exam_questions = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->where('is_answered', NULL)
                                            ->orderBy('id')->first();

        $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', NULL)->where('id', '>', $exam_questions->id )->first();


    }  


        return view('sections.exam', compact('exam', 'exam_questions', 'total', 'exam_count','ans_count', 'exam_counter', 'next_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function question($id)
    {
        $question_type = Input::get('type');
        $user_id = Auth::user()->id;



        if ($question_type=='scq') 
        {
        $answers = Input::get('answer');
        $question_id= Input::get('question_id');
        $exam_question = ExamQuestions::where('question_id', $question_id)->first();
        $exam = Exam::where('id', $exam_question->exam_id)->first();
        $question_mark = $exam->scq_mark;

            //check the mark
        $mark = '0';
        $choice = Choice::find($answers);

          if ($choice->is_correct == '1')

                    { 
                        $mark = $question_mark;
                        // echo $mark;
                    }
                elseif($choice->is_correct == '0')
                    {
                        $mark = '0';
                     // echo $mark;
                
                    }

            $exam_insert = ExamQuestions::where('question_id', $question_id)->first();
         
            $exam_insert->is_answered = '1';
            $exam_insert->mark = $mark;
            $exam_insert->save();


        }
        elseif ($question_type=='mcq') 
        {
            //select quesries
        $answers = Input::get('answer');
        $question_id= Input::get('question_id');
        $exam_question = ExamQuestions::where('question_id', $question_id)->first();
        $exam = Exam::where('id', $exam_question->exam_id)->first();
        $question_mark = $exam->scq_mark;
            //check the mark
        $mark = '0';

            foreach ($answers as $answer)
             {
                $choice = Choice::find($answer);

                if ($choice->is_correct == '1')

                    { 
                        $mark = $question_mark;
                        // echo $mark;
                    }
                elseif($choice->is_correct == '0')
                    {
                        $mark = '0';
                     // echo $mark;
                    break;
                    }

                   

              }

            $exam_insert = ExamQuestions::where('question_id', $question_id)->first();
         
            $exam_insert->is_answered = '1';
            $exam_insert->mark = $mark;
            $exam_insert->save();
        }
        elseif ($question_type=='essay') 
        {
                  if(\Input::hasFile('file')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image = $file->move($destinationPath,$filename);
           
        }
        $answer = Input::get('answer');
        $question_id= Input::get('question_id');
        $exam_question = ExamQuestions::where('question_id', $question_id)->first();
        $exam = Exam::where('id', $exam_question->exam_id)->first();

            $exam_insert = ExamQuestions::where('question_id', $question_id)->first();
         
            $exam_insert->is_answered = '1';
            $exam_insert->file = $image;
            $exam_insert->essay_answer = $answer;
            $exam_insert->save();


        }
        else
            { return "error";}

          $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', NULL)->where('id', '>', $id )->first();
            if (empty($next_id))
            {
                $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', 0)->where('id', '>', $id )->first();
            if (empty($next_id))
            {
                   $next_id = "done";
                 }
            }

            $exam_count = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->get();
            $exam_counter = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->count();
        $ans_count= ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->where('is_answered', '1')->count();


             $total_mcq = $exam->mcq_mark * $exam->mcq_count;
             $total_scq = $exam->scq_mark * $exam->scq_count;
             $total_essay = $exam->essay_mark * $exam->essay_count;
             $total = $total_essay + $total_scq + $total_mcq;
             if ($id != '{id}') {
                
            $exam_questions = ExamQuestions::where('id', $id)->first();
            // return $exam_questions;
            $generated =  $exam_question = ExamQuestions::where('id', $id)->first();
            $generated = $generated->created_at;
            $last_online =$exam_question = ExamQuestions::where('exam_id', $exam_question->exam_id)
                                                        ->orderBy('updated_at', 'Desc')->first();
            $duration = Exam::where('id', $exam_question->exam_id)->first();
            $duration = $duration->duration;

                 $last_online= $last_online->updated_at;
                 $time_spent=$last_online->diffInMinutes($generated);
                 $timeleft= $duration - $time_spent;

 
    }elseif ($id == '{id}') {
      return view('sections.done');
       
    }

      return view('sections.question', compact('id', 'next_id', 'timeleft', 'exam_count', 'exam_counter','ans_count', 'exam', 'total','exam_questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function skip($id)
    {
        $pid =  Input::get('pid');
        $user_id = Auth::user()->id;

        $generated =  $exam_question = ExamQuestions::where('id', $id)->first();


        $exam_questions = ExamQuestions::where('id', $id)->first();

        $exam = Exam::where('id', $exam_questions->exam_id)->first();
        $total_mcq = $exam->mcq_mark * $exam->mcq_count;
        $total_scq = $exam->scq_mark * $exam->scq_count;
        $total_essay = $exam->essay_mark * $exam->essay_count;
        $total = $total_essay + $total_scq + $total_mcq;

        $exam_insert = ExamQuestions::where('id', $pid)->first(); 

        $exam_insert->is_answered = '0';
        $exam_insert->save();


          $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', NULL)-> where('id', '>', $id)->first();
                      
     

            if (empty($next_id))
            {
                $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                 ->where('is_answered', 0)-> where('id', '>', $id)->first();  
                if (empty($next_id))
                {
                    $next_id =  ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)
                                     ->where('is_answered', 0)->where('id', '!=', $id)->first();
                      
                    if (empty($next_id))
                    {
                           $next_id = "done";
                              
                         }
            }}
            // return $next_id;

            $exam_count = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->get();
            $exam_counter = ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->count();
        $ans_count= ExamQuestions::where('user_id', $user_id)->where('exam_id', $exam->id)->where('is_answered', '1')->count();
          $generated =  $exam_question = ExamQuestions::where('id', $id)->first();
            $generated = $generated->created_at;
            $last_online =$exam_question = ExamQuestions::where('exam_id', $exam_question->exam_id)
                                                        ->orderBy('updated_at', 'Desc')->first();
            $duration = Exam::where('id', $exam_question->exam_id)->first();
            $duration = $duration->duration;

                 $last_online= $last_online->updated_at;
                 $time_spent=$last_online->diffInMinutes($generated);
                 $timeleft= $duration - $time_spent;
                
// return $next_id;
      return view('sections.question', compact('id', 'next_id','timeleft', 'exam_count', 'exam_counter','ans_count', 'exam', 'total','exam_questions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DatePost()
    {   
        $user_id = Auth::user()->id;
        $exam_id = Input::get('exam_id');
        $date_id = Input::get('date');


        DB::table('student_exam')
        ->insert(
            array('user_id' => $user_id,
                  'exam_id' => $exam_id,
                  'date_id' => $date_id) 
                );
    return back();
    }


}
