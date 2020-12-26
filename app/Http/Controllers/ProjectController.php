<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function __construct ()
    {
        $this->middleware(['auth', 'digital']);
    }

    public function addProject ()
    {
        return view('projects.add');
    }

    public function post_addProject (Request $request)
    {
        $request->validate([
            'project_name'          => 'required|string',
            'project_desc'          => 'required|max:250',
            'project_url'           => 'required',
            'project_categories'    => 'required',
            'project_cover_img'     => 'required',
            'project_icon'          => 'required'
        ]);

        $project = new Project;
        $project->uuid              = Str::uuid();
        $project->name              = $request->project_name;
        $project->description       = $request->project_desc;
        $project->project_url       = $request->project_url;
        $project->categories        = json_encode($request->project_categories);
        $project->developers        = json_encode([]);
        $project->cover_image       = $request->project_cover_img;
        $project->icon              = $request->project_icon;
        $project->save();

        return redirect("projects/view/$project->uuid");
    }
}
