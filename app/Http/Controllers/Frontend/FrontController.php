<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $featured_products=Product::where('trending','1')->take(15)->get();
        $trending_cat=Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_cat'));
    }

    public function category()
    {
        $categories=Category::where('status','1')->get();
        return view('frontend.category',compact('categories'));
    }
    public function view_category($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
        $category=Category::where('slug',$slug)->first();
        $products=Product::where('cate_id',$category->id)->where('status','1')->get();
        return view('frontend.viewcategory',compact('products','category'));
        }
        else
        {
            return redirect('/')->with('status',"Slug does not exists");
        }
    }
    public function view_products($cate_slug,$prod_slug)
    {
            $category=Category::where('slug',$cate_slug);
            $products=Product::where('slug',$prod_slug)->first();
            return view('frontend.viewproduct',compact('products'));
            
        
    }
}
