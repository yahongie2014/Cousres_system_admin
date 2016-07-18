<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Module;
use App\User;
use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use Input;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageDesc;
use App\Models\PageTranslation ;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Material;
use App\Models\Assignment;
use Carbon\Carbon;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $page = Page::find('1');
        $pages = PageDesc::where('page_id','=',$page->id)->get();
// return $pages;
        return view('sections.index', compact('pages'));
    }
  public function module($id)
    {
        $module = Module::find($id);
        $courses = Course::where('module_id', $id)->where('status', '1')->get();
       
        return view('sections.module', compact('courses', 'module'));
    }
    public function course($id)
    {

        $course = Course::find($id);
         $module = Module::find($course->module_id);
         $inst = $module->module_instructors;
         $lessons = Lesson::where('course_id', $id)->get();
        return view('sections.course', compact('course', 'inst', 'lessons'));
    }  
    public function session($id)
    {

      $lesson = Lesson::find($id);
      $module = $lesson->course->module;
      $inst = $module->module_instructors;
      $links = DB::table('materials')->where('session_id', $lesson->id)->where('type', 'link')->get();
       $files = DB::table('materials')->where('session_id', $lesson->id)->where('type', 'file')->get();
      // return $links;

        return view('sections.session', compact('lesson', 'links', 'files', 'inst'));

    }
      public function assignments()
    {

        $now = Carbon::now();
        $module = Module::where('start_date', '<', $now)->where('end_date', '>', $now)->first();
        $inst = $module->module_instructors;
        $courses = Course::where('module_id', $module->id)->get();

        return view('sections.assignments', compact('courses', 'inst'));

    }    
        public function assignment($id)
    {
        $assignment = Assignment::find($id);

        return view('sections.assignment', compact('id', 'assignment'));       
    }

        public function assignmentPost()
    {
        $assignment_id = Input::get('assignment_id');
        $answer = Input::get('answer');
        $image = null;

         if(\Input::hasFile('file')) 
        {
            $destinationPath = 'uploads/images';
            $file = \Input::file('file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $image = $file->move($destinationPath,$filename);
            // return $image;  
        }

        if (Input::has('edit')) {
          DB::table('assignment_answer')->whereAssignment_id($assignment_id)->whereUser_id(\Auth::user()->id)->update(
              array('answer' => $answer
                  , 'mark' => '0'
                  , 'file' => $image)
          );
        } else{
          DB::table('assignment_answer')->insert(
              array('user_id' => \Auth::user()->id
                  , 'assignment_id' => $assignment_id 
                  , 'answer' => $answer
                  , 'mark' => '0'
                  , 'file' => $image)
          );
        }
               

    return redirect()->back()->with('message', 'Assignment answer have been submitted successflly');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {

        $universities = DB::table('university')->get();

        return view('sections.register', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->fullname = $request->get('fullname');
        $user->birth_date = $request->get('birth_date');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->major = $request->get('major');
        $user->university_id = $request->get('university_id');
        $user->user_type = 3;
        $user->academic_year = $request->get('academic_year');
        $user->status = 0;

        $user->save();

        $data = ['serial' => 'amal'. $user->id];

        $placement = DB::table('placements')->first();

        \Mail::send('emails.registration', $data, function($message)  use ($user)
        {
            
            $message->to($user->email, 'al amal ')
                    ->subject('Registration');
        });

        return back()->with('status', 'Registered Successflly');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:6',
      ]);

      $email = $request->get('email');
      $password = $request->get('password');
      $remember = $request->get('remember') == 1 ? true : false ;

      if (\Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1], $remember)) {
          return redirect()->route('profileHome');
      } else {
        return back()->with('message', 'These credentials do not match our records.');
      }
    }
    
    public function profileHome()
    {
        $user = \Auth::user();
        return view('sections.profile_home', compact('user'));   
    }

    public function profileCourses()
    {
        $user = \Auth::user();
        $now = Carbon::now();
        $module = Module::where('start_date', '<', $now)->where('end_date', '>', $now)->first();
        $courses = $module->courses;
        return view('sections.profile_courses', compact('user', 'module', 'courses'));
    }

    public function sessionpost()
    {
        return view('sections.close');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function discussion()
    {
      $modules = Module::where('status', '1')->get();
      return view('sections.discussion', compact('modules'));
    }
    public function DiscussionCourses($id)
    {  
        $posts = Post::where('parent_type', 'module')->where('parent_id', $id)->orderby('created_at', 'Desc')->get();
        $courses  = Course::where('module_id', $id)->get();
        $module = Module::find($id);
        // return $courses;
        return view('sections.discussioncourse', compact('courses','module', 'posts'));

    } 
    public function DiscussionSessions($id)
    {
        $posts = Post::where('parent_type', 'course')->where('parent_id', $id)->orderby('created_at', 'Desc')->get();
        $sessions = Lesson::where('course_id', $id)->get();
        $course  = Course::find($id);
        $module = Module::find($course->module_id);

        // return $courses;
        return view('sections.discussionsessions', compact('course','module', 'sessions', 'posts'));

    }
     public function DiscussionSession($id)
    {   
        $posts = Post::where('parent_type', 'session')->where('parent_id', $id)->orderby('created_at', 'Desc')->get();
        $sessions = Lesson::where('course_id', $id)->get();
        $session  = Lesson::find($id);
        $course  = Course::find($session->course_id);
        $module = Module::find($course->module_id);

    
        return view('sections.session_posts', compact('course','module', 'session', 'posts'));

    }
        public function PostSingle($id)
    {   
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->simplePaginate(10);
        // $sessions = Lesson::where('course_id', $id)->get();
        // $session  = Lesson::find($id);
        // $course  = Course::find($session->course_id);
        // $module = Module::find($course->module_id);
 

        // return $courses;
        return view('sections.session_post', compact( 'post', 'comments'));

    }        
    public function PostPostSingle($id)
    {   
      $post_id =  Input::get('post_id');
      $reply =  Input::get('comment');
      $user_id =  \Auth::user()->id;
      if ($reply != '') {
        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->comment = $reply;
        $comment->user_id = $user_id;
        $comment->save();
      }
      
      return back();

    }
    public function PostNewPost($id)
    {   

      $parent_id =  Input::get('parent_id');
      $parent_type =  Input::get('parent_type');
      $newpost =  Input::get('post');
      $title =  Input::get('title');
      $user_id =  \Auth::user()->id;

      $post = new Post();
      $post->parent_id = $parent_id;
      $post->user_id = $user_id;
      $post->parent_type = $parent_type;
      $post->post = $newpost;
      $post->title = $title;
      $post->save();
      return back();

    }
}
