<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $clients = Client::where('name','LIKE','%'.$search.'%')->paginate(5);
            
        }
        else
        {
            $clients= Client::paginate(5);
        }
        $i=1;
        return view('admin.client.index',compact('clients','search','i'));
    }

    public function create()
    {
        return view('admin.client.addClient');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:8',
            'notes'=>'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $client = new Client;
        $client->name=$request->name;
        $client->notes=$request->notes;
        $logo="assets/images/".$request->logo->getClientOriginalName();
        $client->logo=$logo;
        $request->logo->move("assets/images/",$logo);



        $client->save();

        return redirect()->route('client.index');
    }
    public function destroy($id)
    {
        Client::where('id',$id)->delete();
        return redirect()->route('client.index');
    }
    public function edit($id)
    {
        $client= Client::where('id',$id)->first();
        return view('admin.client.editClient',compact('client'));
    }
    public function update(Request $request , $id )
    {
        $request->validate([
            'name'=>'required|min:8',
            'notes'=>'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $client= Client::where('id',$id)->first();

        $client->name=$request->name;
        $client->notes=$request->notes;
        $logo="assets/images/".$request->logo->getClientOriginalName();
        $client->logo=$logo;
        $request->logo->move("assets/images/",$logo);

        $client->update();

        return redirect()->route('client.index');

    }
}
