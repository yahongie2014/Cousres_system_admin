<?php
namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Admin\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\Lecture;

class MaterialsController extends Controller
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
        $sessions = Lecture::all();
        return view('admin::sections.materials.create', compact('sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
        $pdf = null;
        if(\Input::hasFile('url_file')) 
        {
            $destinationPath = 'uploads/files';
            $file = \Input::file('url_file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $pdf = $file->move($destinationPath,$filename);
        }
        $material = new Material();

        $material->session_id = $request->get('session');
        $material->title = $request->get('title');
        $material->type = $request->get('type');
        if ($request->get('type') == 'link') {
            $material->url = $request->get('url_link');
        } elseif ($request->get('type') == 'file') {
            $material->url = $pdf;
        }
        $material->save();

        return redirect()->route('admin.materials.show', $material->session_id)->with('message', 'Material created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materials = Material::whereSession_id($id)->get();
        return view('admin::sections.materials.index', compact('materials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sessions = Lecture::all();
        $material = Material::find($id);
        return view('admin::sections.materials.edit', compact('material', 'sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialRequest $request, $id)
    {
        $material = Material::find($id);

        $remove = \Input::get('remove');
        $file = \Input::file('url_file');
        if(\Input::hasFile('url_file')) 
        {
            $destinationPath = 'uploads/files';
            $file = \Input::file('url_file');
            $originalname = $file->getClientOriginalName();
            $filename = rand(11111, 99999). '_' .$originalname;
            $pdf = $file->move($destinationPath,$filename);
        }

        $material->session_id = $request->get('session');
        $material->title = $request->get('title');
        $material->type = $request->get('type');
        if ($request->get('type') == 'link') {
            $material->url = $request->get('url_link');
        } elseif ($request->get('type') == 'file') {
            if(!empty($file)){
                $material->url = $pdf;
            }
            elseif (empty($file) && $remove == 1) {
                $material->url = null;
            }
        }
        $material->save();

        return redirect()->route('admin.materials.show', $material->session_id)->with('message', 'Material updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return back()->with('message', 'Material deleted!');
    }

}
