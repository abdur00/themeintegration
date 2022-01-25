<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $projects = Project::where('name','Like','%'.$search.'%')->paginate(5);
        }
        else{
            $projects= Project::paginate(5);
        }
        $i=1;
        return view('admin.project.index',compact('projects','search','i'));
    }
    public function create()
    {
        return view('admin.project.addProject');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $project = new Project;
        $project->name=$request->name;
        $project->description=$request->description;
        $image="assets/images/".$request->image->getClientOriginalName();
        $project->image=$image;
        $request->image->move("assets/images/",$image);



        $project->save();

        return redirect()->route('index.home');
    }
    public function destroy($id)
    {
        Project::where('id',$id)->delete();
        return redirect()->route('index.home');

    }
    public function edit($id)
    {
        $project= Project::where('id',$id)->first();
        return view('admin.project.editProject',compact('project'));
    }
    public function update(Request $request , $id )
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $project= Project::where('id',$id)->first();

        $project->name=$request->name;
        $project->description=$request->description;
        $image="assets/images/".$request->image->getClientOriginalName();
        $project->image=$image;
        $request->image->move("assets/images/",$image);

        $project->update();

        return redirect()->route('index.home');

    }
}
