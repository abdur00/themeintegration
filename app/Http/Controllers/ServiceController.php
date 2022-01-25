<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $services = Service::where('name','LIKE','%'.$search.'%')->paginate(5);
        }
        else
        {
            $services= Service::paginate(5);
        }
        $i=1;
        return view('admin.service.index',compact('services','search','i'));
    }

    public function create()
    {
        return view('admin.service.addService');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $service = new Service;
        $service->name=$request->name;
        $service->description=$request->description;
        $image="assets/images/".$request->image->getClientOriginalName();
        $service->image=$image;
        $request->image->move("assets/images/",$image);
        $icon="assets/images/".$request->icon->getClientOriginalName();
        $service->icon=$icon;
        $request->icon->move("assets/images/",$icon);

        $service->save();

        return redirect()->route('service.index');

    }

    public function destroy($id)
    {
        Service::where('id',$id)->delete();
        return redirect()->route('service.index');
    }

    public function edit($id)
    {
       $service = Service::where('id',$id)->first();
       return view('admin.service.editService',compact('service'));

    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $service = Service::where('id',$id)->first();

        $service->name=$request->name;
        $service->description=$request->description;
        $image="assets/images/".$request->image->getClientOriginalName();
        $service->image=$image;
        $request->image->move("assets/images/",$image);
        $icon="assets/images/".$request->icon->getClientOriginalName();
        $service->icon=$icon;
        $request->icon->move("assets/images/",$icon);
        $service->update();

        return redirect()->route('service.index');
    }
}
