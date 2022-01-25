<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $contactsUs = ContactUs::where('name','LIKE','%'.$search.'%')->paginate(5);
        }
        else{
            $contactsUs = ContactUs::paginate(5);
        }

        $i=1;
        return view('admin.contactUs.index',compact('contactsUs','search','i'));
    }

    public function create()
    {
        return view('admin.contactUs.addContactUs');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:6',
            'email'=>'required|email',
            'description'=>'required|min:6',
            'subject'=>'required|min:6'
        ]);

        $contactUs = new ContactUs;
        $contactUs->name=$request->name;
        $contactUs->email=$request->email;
        $contactUs->subject=$request->subject;
        $contactUs->description=$request->description;

        $contactUs->save();

        return redirect()->route('contactUs.index');
    }

    public function destroy($id)
    {
        ContactUs::where('id',$id)->delete();
        return redirect()->route('contactUs.index');
    }

    public function edit($id)
    {
        $contactUs = ContactUs::where('id',$id)->first();
        return view('admin.contactUs.editContactUs',compact('contactUs'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required|min:6',
            'email'=>'required|email',
            'subject'=>'required|min:6',
            'description'=>'required|min:6',
        ]);

        $contactUs = ContactUs::where('id',$id)->first();

        $contactUs->name=$request->name;
        $contactUs->email=$request->email;
        $contactUs->subject=$request->subject;
        $contactUs->description=$request->description;
        $contactUs->update();

        return redirect()->route('contactUs.index');

    }
}
