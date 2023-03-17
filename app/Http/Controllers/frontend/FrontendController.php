<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        // $porfolios = Portfolio::all();

        return view('frontend.dashboard');
    }

    public static function image($category){
        $images = Portfolio::whereIn('category_id',function($query) use ($category){
            $query->select('id')
            ->from(with(new Category())->getTable())
            ->where('name',$category)
            ->where('status','publish');

        })->get();

        return $images;
    }
}
