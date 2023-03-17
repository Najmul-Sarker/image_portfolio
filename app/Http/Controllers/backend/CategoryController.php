<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    public function create(){
        return view("backend.category.create");
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'nullable'
        ]);

        Category::create([
            "name"=>$request->name,
            "description"=>$request->description,
        ]);

        return redirect( route("category.index") )->with('success',"Category Created Successfully!");

    }
    public function show(Category $category){
        return view('backend.category.show',compact('category'));
    }

    

    public function edit(Category $category){
        return view('backend.category.edit',compact('category'));

    }

    public function update(Category $category,Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'nullable'
        ]);

        $category->update([
            "name"=>$request->name,
            "description"=>$request->description,
        ]);

        return redirect( route("category.index") )->with('success',"Category Updated Successfully!");
    }

    public function delete(Category $category){
        $category->delete();
        return redirect( route("category.index") )->with('success',"Category Deleted Successfully!");

    }
    
}
