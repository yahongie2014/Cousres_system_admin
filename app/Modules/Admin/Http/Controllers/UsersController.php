<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\UserRequest;
use App\User;

class UsersController extends Controller
{

	public function index()
	{
        $user_type =  \Input::get('type');
        $users = User::whereUser_type($user_type)->get();
        // return $user_type;
        return view('admin::sections.users.index', compact('users', 'user_type'));
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_type =  \Input::get('type');
        return view('admin::sections.users.create', compact('user_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
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

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->fullname = $request->get('fullname');
        $user->bio = $request->get('bio');
        $user->img = $image;
        $user->user_type = $request->get('user_type');
        $user->status = $request->get('status') != '' ? 1 : 0;
        $user->save();

        if (in_array($request->get('user_type'), [1, 2]) && $user->save()) {

            $data = [
                'username' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ];

            \Mail::send('admin::sections.users.instructor_info', $data, function($message) use ($user)
            {
                
                $message->to($user->email, 'al amal ')
                        ->subject('Registration Info');
            });
        }

        $user->attachRole($request->get('user_type'));

        return redirect()->route('admin.users.index', ['type' => $user->user_type])->with('message', 'User created!');
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
        $user_type =  \Input::get('type');
        $user = User::find($id);
        return view('admin::sections.users.edit', compact('user', 'user_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
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
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password')) {
        	$user->password = bcrypt($request->get('password'));
        }
        $user->fullname = $request->get('fullname');
        $user->bio = $request->get('bio');
        if(!empty($file)){
            $user->img = $image;
        }
        elseif (empty($file) && $remove == 1) {
            $user->img = null;
        }
        $user->user_type = $request->get('user_type');
        $user->status = $request->get('status') != '' ? 1 : 0;
        $user->save();

        return redirect()->route('admin.users.index', ['type' => $user->user_type])->with('message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('message', 'User deleted!');
    }

    public function usersConfirm()
    {
        $users = User::whereUser_type(3)->get();

        return view('admin::sections.users.students', compact('users'));
    }

    public function confirmUser($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        $data = ['fullname', $user->fullname];

        \Mail::send('admin::sections.users.confirm', $data, function($message) use ($user)
        {
            
            $message->to($user->email, 'al amal ')
                    ->subject('Confrimation');
        });

        return back()->with('message', 'User Confirmed!');
    }

    public function confirmUsers(Request $request)
    {
    	$all = $request->get('check_user');
    	if ($all) {
    		foreach ($all as $id) {
		        $user = User::find($id);
		        if ($user->status != 1) {
			        $user->status = 1;
			        $user->save();
			        $data = ['fullname', $user->fullname];

			        \Mail::send('admin::sections.users.confirm', $data, function($message) use ($user)
			        {
			            
			            $message->to($user->email, 'al amal ')
			                    ->subject('Confrimation');
			        });
			    }
		    }
	    }

        return back()->with('message', 'Users Confirmed!');
    }

}
