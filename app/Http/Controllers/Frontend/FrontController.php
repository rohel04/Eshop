<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
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
            
            $products=Product::where('slug',$prod_slug)->first();
            $ratings=Rating::where('prod_id',$products->id)->get();
            $ratings_sum=Rating::where('prod_id',$products->id)->sum('stars_rated');
            if($ratings->count()> 0)
            {
                $ratings_value=$ratings_sum/$ratings->count();
            }
            else
            {
                $ratings_value=0;
            }

            
            $cate_id=$products->cate_id;
            $rel_products=Product::where('cate_id',$cate_id)->take(4)->get();
            return view('frontend.viewproduct',compact('products','rel_products','ratings','ratings_value'));
            
        
    }
    public function search_product()
    {
        $products=Product::select('name')->where('status','1')->get();
        $data=[];
        foreach($products as $item)
        {
            $data[]=$item['name'];
        }
        return $data;
    }
    public function product_page(Request $request)
    {
        $prod_name=$request->input('search');
        if($prod_name!=null)
        {
            // $product=Product::where("name",$prod_name)->first();
        $product=Product::where("name","LIKE","%$prod_name%")->first();
        if($product)
        {
            return redirect('category/'.$product->category->slug.'/'.$product->slug);
        }
        else
        {
            return redirect()->back()->with('search_error',"No such product found");
        }
    }
    else
    {
        return redirect()->back();
    }
    }
}
