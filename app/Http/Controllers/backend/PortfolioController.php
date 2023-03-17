<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::all();
        return view('backend.portfolio.index',compact('portfolios'));
    }
    public function create(){
        $categories = Category::all();
        return view('backend.portfolio.create',compact('categories'));
    }
    public function store(Request $request){
        // return $request;
        // die();
        $image = $request->file('image');
        $request->validate([
            'name'=>['required',Rule::unique('portfolios','name')],
            'category_id'=>'required',
            'desctiption' =>'nullable',
            'image' =>'required|mimes:png,jpg,jpeg|max:1024',
        ]);
        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,250)->save(public_path('storage/portfolios/'.$image_name));


            Portfolio::create([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>$image_name,
            ]);


        }
        return redirect(route('portfolio.index'))->with('success','New Portfolio Create Successfully');

       
    }

    public function show(Portfolio $portfolio){
        return view('backend.portfolio.show',compact('portfolio'));
    }

    public function edit(Portfolio $portfolio){
        $categories = Category::all();
        return view('backend.portfolio.edit',compact('portfolio',"categories"));
    }

    public function update(Portfolio $portfolio,Request $request){
        $image = $request->file('image');
        $request->validate([
            'name'=>['required',Rule::unique('portfolios','name')->ignore($portfolio->id)],
            'category_id'=>'required',
            'desctiption' =>'nullable',
            'image' =>'nullable|mimes:png,jpg,jpeg|max:1024',
        ]);
        if($image){

            $path = public_path('storage/portfolios/'.$portfolio->image);
            if(file_exists($path)){
                unlink($path);
            }

            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,250)->save(public_path('storage/portfolios/'.$image_name));



        }else{
            $image_name=$portfolio->image;
        }
        $portfolio->update([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image_name,
        ]);
        return redirect(route('portfolio.index'))->with('success','Portfolio Updated Successfully!');
    }

    public function delete(Portfolio $portfolio){
        $portfolio->delete();
        return redirect(route('portfolio.index'))->with('success','Portfolio Deleted Successfully!');
    }

    public function trash(){
        $trash = Portfolio::onlyTrashed()->get();
        
        return view('backend.portfolio.trash',compact('trash'));
    }

    public function restore($id){
        $trashed = Portfolio::onlyTrashed()->find($id);
        $trashed->restore();
        return back()->with('success','Portfolio Restore Successfully!');
    }
    public function permanentdelete($id){
        $trashed_data = Portfolio::onlyTrashed()->find($id);
        $trashed_data->forceDelete();
        return back()->with('success','Portfolio Permanently Deleted Successfully!');
    }
}
