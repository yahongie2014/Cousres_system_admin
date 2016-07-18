<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Modules\Admin\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\User;

class ModulesController extends Controller
{

    public function index()
    {
        $user = \Auth::user();
        $head_module = $user->instructor_modules;
        $head_modules = [];

        if ($head_modules) {
            foreach ($head_module as $module) {
                $head_modules[] = $module->id;
            }
        }
        
        $question_module = $user->question_invites;
        $question_modules = [];

        if ($question_modules) {
            foreach ($question_module as $module) {
                $question_modules[] = $module->id;
            }
        }
        
        $exam_module = $user->exam_invites;
        $exam_modules = [];

        if ($exam_modules) {
            foreach ($exam_module as $module) {
                $exam_modules[] = $module->id;
            }
        }

        $create_per = 0;
        $access_per = 0;

        if ($user->hasRole('admin')) {
            $modules = Module::all();
            $create_per = 1;
            $access_per = 1;
            $user_per = 1;
        } elseif (count($head_module) > 0) {
            $modules = Module::whereIn('id', $head_modules)->get();
            $create_per = 1;
            $access_per = 1;
            $user_per = 1;
        } elseif (count($question_module) > 0) {
            $modules = Module::whereIn('id', $question_modules)->get();
            $create_per = 0;
            $access_per = 0;
            $user_per = 2;
        } elseif (count($exam_module) > 0) {
            $modules = Module::whereIn('id', $exam_modules)->get();
            $create_per = 0;
            $access_per = 0;
            $user_per = 3;
        } else {
            $modules = [];
        }
        
        return view('admin::sections.modules.index', compact('modules', 'create_per', 'access_per', 'user_per'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::sections.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $module = new Module();

        $module->title = $request->get('title');
        $module->attendance = $request->get('attendance');
        $module->assignment = $request->get('assignment');
        $module->exam = $request->get('exam');
        $module->pass = $request->get('pass');
        $module->description = $request->get('description');
        $module->start_date = $request->get('start_date');
        $module->end_date = $request->get('end_date');
        $module->status = $request->get('status') != '' ? 1 : 0;
        $module->save();

        return redirect()->route('admin.modules.index')->with('message', 'Module created!');
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
        $module = Module::find($id);
        return view('admin::sections.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, $id)
    {
        $module = Module::find($id);
        $module->title = $request->get('title');
        $module->attendance = $request->get('attendance');
        $module->assignment = $request->get('assignment');
        $module->exam = $request->get('exam');
        $module->pass = $request->get('pass');
        $module->description = $request->get('description');
        $module->start_date = $request->get('start_date');
        $module->end_date = $request->get('end_date');
        $module->status = $request->get('status') != '' ? 1 : 0;
        
        $module->save();

        return redirect()->route('admin.modules.index')->with('message', 'Module updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        return back()->with('message', 'Module deleted!');
    }


    public function studentsResult($id)
    {

        $module = Module::find($id);
        $attendance_per = $module->attendance;
        $assignment_per = $module->assignment;
        $exam_per = $module->exam;
        $module_pass = $module->pass;

        $users_answers = User::whereUser_type(3)->whereStatus(1)->get();

        $user_answered = [];
        foreach ($users_answers as $user) {
            if ($user->question_answers) {
                $user_answered[] = $user->id;
            }
        }

        $users = User::whereIn('id', $user_answered)->whereStatus(1)->get();


        $users_attendance = [];
        $users_assignment = [];
        $users_exam = [];
        $users_result = [];

        foreach ($users as $user) {
            $courses = $module->courses;
            $exam = $module->exams()->first();
            $assignments_mark = [];
            $module_session = [];
            $exams_mark = [];
            $user_exams_result = [];
            foreach ($courses as $course) {
                // total assignment for the module
                foreach ($course->assignments as $assignment) {
                    $assignments_mark[$assignment->id] = $assignment->mark;
                }

                // total assignment for the module
                foreach ($course->sessions as $session) {
                    $module_session[$session->id] = $session->id;
                }
            }

                $exam_total = $exam->scq_mark * $exam->scq_count + $exam->mcq_mark * $exam->mcq_count + $exam->essay_mark * $exam->essay_count;
                $exams_mark[$exam->id] = $exam_total;

                foreach ($exam->questions as $question) {
                    if (count($user->question_answers) == count($exam->questions)) {
                        $user_answers = DB::table('exam_questions')->whereUser_id($user->id)->whereExam_id($exam->id)->whereQuestion_id($question->id)->first();
                        // dd($question->id);
                        $user_exams_result[] = $user_answers->mark;
                    } else {
                        $user_exams_result[] = 0;
                    }
                }
            // dd(count($module_session));

            // total assignment answer
            $user_assigments = $user->assignments;
            $assignments_answer = [];
            if (count($user_assigments)) {
                foreach ($user_assigments as $answer) {
                    $assignments_answer[$answer->id] = $answer->mark; 
                }
            } else {
                $assignments_answer[] = 0;
            }

            // total user attendance
            $user_attendance = $user->sessions;
            $attendances = [];
            foreach ($user_attendance as $attendance) {
                $attendances[$attendance->id] = $attendance->id; 
            }


            // dd(count($attendances));
            // dd(array_sum($user_exams_result));

            $assignment_degree = array_sum($assignments_answer) / array_sum($assignments_mark);
            $final_assignment = $assignment_degree * $assignment_per;

            $attendance_degree = array_sum($attendances) / array_sum($module_session);
            $final_attendance = $attendance_degree * $attendance_per;

            $exam_degree = array_sum($user_exams_result) / array_sum($exams_mark);
            $final_exam = $exam_degree * $exam_per;

            $final_module = $final_assignment + $final_attendance + $final_exam;

            $users_attendance[$user->id] = $final_attendance;
            $users_assignment[$user->id] = $final_assignment;
            $users_exam[$user->id] = $final_exam;
            $users_result[$user->id] = $final_module;

            // dd($user_exams_result);


        }

        return view('admin::sections.modules.students_result', compact(
            'users', 'users_attendance', 'users_assignment', 
            'users_exam', 'users_result', 'module_pass'
        ));
    }

    public function sendResult($id)
    {
        $data = [
            'users_attendance' => \Input::get('user_attendance'),
            'users_assignment' => \Input::get('user_assignment'),
            'users_exam' => \Input::get('user_exam'),
            'users_result' => \Input::get('user_result'),
            'final' => \Input::get('final'),
        ];

        $user = User::find($id);

        $data['fullname'] = $user->fullname;

        \Mail::send('admin::sections.modules.result_message', $data, function($message) use ($user)
        {
            
            $message->to($user->email, 'al amal ')
                    ->subject('Confrimation');
        });

        return back()->with('message', 'User Results Sended!');
    }

    public function sendFailed()
    {

        $users_answers = User::whereUser_type(3)->whereStatus(1)->get();

        $user_answered = [];
        foreach ($users_answers as $user) {
            if ($user->question_answers) {
                $user_answered[] = $user->id;
            }
        }

        $users = User::whereNotIn('id', $user_answered)->whereStatus(1)->get();

        foreach ($users as $user) {
            $data = [
                'users_attendance' => "0",
                'users_assignment' => "0",
                'users_exam' => "0",
                'users_result' => "0",
                'final' => "0 not attended" ,
            ];

            $data['fullname'] = $user->fullname;

            \Mail::send('admin::sections.modules.result_message', $data, function($message) use ($user) 
            {
                
                $message->to($user->email, 'al amal ')
                        ->subject('Confrimation');
            });
        }

        return back()->with('message', 'User Results Sended!');
    }

    public function getInstructors($id)
    {
        $module_instructors = Module::find($id)->module_instructors;
        $instructors = User::whereUser_type(2)->get();
        if ($module_instructors) {
            $sel = [];
            foreach ($module_instructors as $instructor) {
                $sel[] = $instructor->id;
            }
            return view('admin::sections.instructors.assign_instructor', compact('id', 'instructors', 'sel'));            
        } else {
            return view('admin::sections.instructors.assign_instructor', compact('id', 'instructors'));
        }
    }

    public function assignInstructors(Request $request, $id)
    {
        $module = Module::find($id);
        $module_instructors = empty($request->get('module_instructors')) ? [] : $request->get('module_instructors');
        $module->module_instructors()->sync($module_instructors);
        return redirect()->route('admin.modules.index')->with('message', 'Instructors assigned!');
    }

    public function getInvites($id)
    {
        $mod_instructors = Module::find($id)->module_instructors;
        $head_instructor = [];
        foreach ($mod_instructors as $instructor) {
            $head_instructor[] = $instructor->id;
        }
        $instructors = User::whereUser_type(2)->whereNotIn('id', [$head_instructor])->get();
        $permission = \Input::get('permission');
        if ($permission == 1) {
            $module_instructors = Module::find($id)->question_invites;
        } else {
            $module_instructors = Module::find($id)->exam_invites;
        }
        if ($module_instructors) {
            $sel = [];
            foreach ($module_instructors as $instructor) {
                $sel[] = $instructor->id;
            }
            return view('admin::sections.instructors.assign_invites', compact('id', 'instructors', 'permission', 'sel'));            
        } else {
            return view('admin::sections.instructors.assign_invites', compact('id', 'instructors', 'permission'));
        }
    }

    public function assignInvites(Request $request, $id)
    {
        $permission = $request->get('permission');
        $module = Module::find($id);
        $module_instructors = empty($request->get('module_instructors')) ? [] : $request->get('module_instructors');
        if ($permission == 1) {
            $module->question_invites()->sync($module_instructors);
        } else {
            $module->exam_invites()->sync($module_instructors);
        }
        return redirect()->route('admin.modules.index')->with('message', 'Instructors assigned!');
    }

}
