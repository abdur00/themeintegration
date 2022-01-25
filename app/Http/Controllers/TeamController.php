<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
       $search = $request['search'] ?? "";
       if($search != "")
       {
           $teams = Team::where('name','LIKE','%',$search,'%')->paginate(5);
       }
       else{
        $teams = Team::paginate(5);
       }

        $i=1;
        return view('admin.team.index',compact('teams','search','i'));
    }
    public function create()
    {
        return view('admin.team.addTeam');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'designation'=>'required',
            'facebook'=>'required|url',
            'twitter'=>'required|url',
            'linkedin'=>'required|url',
            'youtube'=>'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $team = new Team;
        $team->name=$request->name;
        $team->description=$request->description;
        $team->designation=$request->designation;
        $team->facebook=$request->facebook;
        $team->twitter=$request->twitter;
        $team->linkedin=$request->linkedin;
        $team->youtube=$request->youtube;
        $image="assets/images/".$request->image->getClientOriginalName();
        $team->image=$image;
        $request->image->move("assets/images/",$image);

        $team->save();

        return redirect()->route('team.index');

    }

    public function destroy($id)
    {
        Team::where('id',$id)->delete();
        return redirect()->route('team.index');

    }

    public function edit($id)
    {
        $team = Team::where('id',$id)->first();
        return view('admin.team.editTeam',compact('team'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'designation'=>'required',
            'facebook'=>'required|url',
            'twitter'=>'required|url',
            'linkedin'=>'required|url',
            'youtube'=>'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $team = Team::where('id',$id)->first();

        $team->name=$request->name;
        $team->description=$request->description;
        $team->designation=$request->designation;
        $team->facebook=$request->facebook;
        $team->twitter=$request->twitter;
        $team->linkedin=$request->linkedin;
        $team->youtube=$request->youtube;
        $image="assets/images/".$request->image->getClientOriginalName();
        $team->image=$image;
        $request->image->move("assets/images/",$image);
        $team->update();

        return redirect()->route('team.index');

    }
}
