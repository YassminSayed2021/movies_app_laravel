<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //view categories
    public function viewCategory(){
        $cats = Category::all();
        if($cats -> count()>0){
            return response()->json([
                'code'=>'200',
                'categories'=>$cats
                ],200);
        }else{
            return response()->json([
                'code'=>'404',
                "categories"=>"No data found"
                ],404);
        }
    }


//create category
public function createCategory(Request $request){
    $validator = Validator::make($request->all(),[
        'ctitle'=>'required|string|Max:191',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'=>'422',
            'errors'=>$validator->messages()
        ], 422);
    }else{
        $cat = Category::create([
            'ctitle'=> $request->ctitle,
            // 'user_id'=>$request->user_id,
        ]);

        if($cat){
            return response()->json([
                'status'=>'200',
                'message'=>'Category created successfully!'
                ],200);
        }else{
            return response()->json([
                'status'=>'500',
                'message'=>'something went wrong'
                ],500);
        }
    }

}

//update category
public function edit($id){
    $cat = Category::find($id);

    if($cat){
        return response()->json([
            'status'=>'200',
            'categories'=> $cat
            ],200);
    }else{
        return response()->json([
            'status'=>'404',
            'message'=>'no such Category found'
            ],404);
    }


}
public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'ctitle'=>'required|string|Max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'422',
                'errors'=>$validator->messages()
            ], 422);
        }else{
            $cat = Category::find($id);

            if($cat){

                $cat-> update([
                    'ctitle'=> $request->ctitle,
                    // 'user_id'=>$request->user_id,
        
                ]);

                return response()->json([
                    'status'=>'200',
                    'message'=>'Category updated successfully!'
                    ],200);
            }else{
                return response()->json([
                    'status'=>'404',
                    'message'=>'something went wrong'
                    ],404);
            }

        }

    }

    public function deleteCat($id){
        $cat = Category::find($id);
    
        if($cat){
            $cat->delete();
            return response()->json([
                'status'=>'200',
                'message'=>'Category deleted'
                ],200);
        }else{
            return response()->json([
                'status'=>'404',
                'message'=>'no such Category found'
                ],404);
        }
        }


}
