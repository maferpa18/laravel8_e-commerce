<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $trending_category = Category::where('popular','1')->take(15)->get();
        $feautured_products = Product::where('trending','1')->take(15)->get();
        
        return view('frontend.index',compact('trending_category','feautured_products'));
    }

    public function category()
    {
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else
        {
            return redirect('/home')->with('status',"Slug doesn't exist");
        }
    }

    public function productview($cate_slug,$prod_slug)
    {
        if (Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('products'));
            } else {
                return redirect('/home')->with('status','The link was broken');
            }
        } else {
            return redirect('/home')->with('status','No such category found ');
        }
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];
        
        foreach($products as $item)
        {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if ($product)
            {
                return redirect('category/'.$product->Category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with("status","No products matched your search");
            }
        }else{
            return redirect()->back();
        }

    }

}
