<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != ""){
            $categories = Category::where('name','LIKE','%'.$search.'%')->paginate(5);
        }
        else{

            $categories = Category::paginate(5);
        }

        $i=1;
        $category=null;
        return view('admin.categories.index',compact('category','categories','search','i'));
    }
     public function create()
     {
        $category= null;
        return response()->json([
            'status' => 200,
            'category' => $category

        ]);
     }
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required'
        ]);
        $category = new Category;
        $category->name=$request->name;
        $category->description=$request->description;

        $category->save();

        return redirect()->route('category.index');

    }
    public function edit(Request $request)
    {
        $category= Category::where('id',$request->id)->first();
        return response()->json([
            'status' => 200,
            'category' => $category

        ]);
    }
    public function update(Request $request , $id )
    {

        $request->validate([
            'name'=>'required|min:8',
            'description'=>'required'
        ]);

        $category= Category::where('id',$id)->first();

        $category->name=$request->name;
        $category->description=$request->description;

        $category->update();

        return redirect()->route('category.index');

    }
    public function destroy($id)
    {

         Category::where('id',$id)->delete();
         return redirect()->route('category.index');
    }
}
