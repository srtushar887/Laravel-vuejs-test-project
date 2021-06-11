<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function get_category()
    {
        $all_data = category::latest()->get();
        return response()->json($all_data,200);
    }


    public function create_category(Request $request)
    {
        $this->validate($request,[
           'category_name'=>'required'
        ]);

        $new_cat = new category();
        $new_cat->category_name = $request->category_name;
        $new_cat->slug = Str::slug($request->category_name);
        $new_cat->save();

        return response()->json('success',200);

    }


    public function get_signle_cat($id)
    {
        $cat = category::where('slug',$id)->first();
        if ($cat) {
            return response()->json($cat,200);
        }else{
            return response()->json('error',400);
        }

    }


    public function update_category(Request $request,$id)
    {

        $this->validate($request,[
            'category_name'=>'required'
        ]);

        $new_cat = category::where('slug',$id)->first();
        $new_cat->category_name = $request->category_name;
        $new_cat->slug = Str::slug($request->category_name);
        $new_cat->save();

        return response()->json($new_cat,200);
    }


    public function delete_category(Request $request,$id)
    {
        $new_cat = category::where('id',$id)->first();
        $new_cat->delete();
        return response()->json('success',200);
    }




}
