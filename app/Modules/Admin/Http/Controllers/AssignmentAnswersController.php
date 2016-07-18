<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\AssignmentAnswerRequest;
use App\Models\Assignment;
use App\Models\AssignmentAnswer;
use App\Models\Assignment;
use App\User;

class AssignmentAnswersController extends Controller
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
    public function store(AssignmentAnswerRequest $request)
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
        $assignment_id = \Input::get('assignment_id');
        $students = User::whereUser_type(3)->get();
        return view('admin::sections.assignment_answers.index', compact('id', 'students', 'assignment_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = AssignmentAnswer::find($id);

        return view('admin::sections.assignment_answers.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssignmentAnswerRequest $request, $id)
    {
        $assignment = AssignmentAnswer::find($id);
        $assignment->mark = $request->get('mark');
        $assignment->save();

        return redirect()->route('admin.assignmentAnswers.show', ['id' => $assignment->assignment_id])->with('message', 'Assignment corrected!');
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
