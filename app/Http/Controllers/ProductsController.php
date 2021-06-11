<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function get_products()
    {
        $all_data = product::latest()->get();
        return response()->json($all_data,200);
    }

    public function create_products(Request $request)
    {
        $this->validate($request,[
           'product_name' =>'required',
           'price' =>'required',
           'image' =>'required|image|max:2048',
           'description' =>'required',
        ]);


        $product = new product();



        if ($request->image) {
            $imageName = time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $name = $request->image->move(public_path('products/'),$imageName);
            $product->image = 'products/'.$imageName;
        }



        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return response()->json($product,200);





    }


    public function update_product(Request $request,$id)
    {
        $this->validate($request,[
            'product_name' =>'required',
            'price' =>'required',
           'image' =>'sometimes|image|max:2048',
            'description' =>'required',
        ]);


        $product = product::where('id',$id)->first();



        if ($request->image) {
            $imageName = time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $name = $request->image->move(public_path('products/'),$imageName);
            $product->image = '/products/'.$imageName;
        }



        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return response()->json($product,200);
    }




    public function get_single_product($id)
    {
        $product = product::where('id',$id)->first();
        return response()->json($product,200);
    }


    public function delete_product(Request $request,$id)
    {
        $product = product::where('id',$id)->first();
        @unlink(public_path($product->image));
        $product->delete();
    }



}
