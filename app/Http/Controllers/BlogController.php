<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $blogs = Blog::where('title','LIKE',"%".$search."%")->paginate(5);
        }
        else{
            $blogs = Blog::paginate(5);
        }


        $i=1;
        return view('admin.blog.index',compact('blogs','search','i'));
    }

    public function create()
    {
        return view('admin.blog.addBlog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|min:4',
            'author'=> 'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $blog = new Blog;
        $blog->title=$request->title;
        $blog->author=$request->author;
        $blog->description=$request->description;
        $image="assets/images/".$request->image->getClientOriginalName();
        $blog->image=$image;
        $request->image->move("assets/images/",$image);

        $blog->save();

        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        Blog::where('id',$id)->delete();
        return redirect()->route('blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.editBlog',compact('blog'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'title'=> 'required|min:4',
            'author'=> 'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $blog = Blog::where('id',$id)->first();

        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->author=$request->author;
        $image="assets/images/".$request->image->getClientOriginalName();
        $blog->image=$image;
        $request->image->move("assets/images/",$image);
        $blog->update();

        return redirect()->route('blog.index');

    }
}
