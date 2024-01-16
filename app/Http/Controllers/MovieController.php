<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Movie;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    //create movie
    public function createMovie(Request $request){
        $validator = Validator::make($request->all(),[
            'mtitle'=>'required|string|Max:191',
            'desc'=>'required|string|Max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'422',
                'errors'=>$validator->messages()
            ], 422);
        }else{
            $movie = Movie::create([
                'mtitle'=> $request->mtitle,
                'desc'=> $request->desc,
                'rate'=> $request->rate,
                'image'=> $request->image,
                //'category'=>$request->category,
            ]);

            if($movie){
                return response()->json([
                    'status'=>'200',
                    'message'=>'Movie created successfully!'
                    ],200);
            }else{
                return response()->json([
                    'status'=>'500',
                    'message'=>'something went wrong'
                    ],500);
            }
        }

    }
//view movie
    public function viewMovie(){
        $movies = Movie::all();
        if($movies -> count()>0){
            return response()->json([
                'code'=>'200',
                'movies'=>$movies
                ],200);
        }else{
            return response()->json([
                'code'=>'404',
                "movies"=>"No data found"
                ],404);
        }
    }

    //delete movie
    public function deleteMovie($id){
        $mov = Movie::find($id);
    
        if($mov){
            $mov->delete();
            return response()->json([
                'status'=>'200',
                'message'=>'Movie deleted'
                ],200);
        }else{
            return response()->json([
                'status'=>'404',
                'message'=>'no such Movie found'
                ],404);
        }
        }
      //update movie
      public function edit($id){
        $movie = Movie::find($id);

        if($movie){
            return response()->json([
                'status'=>'200',
                'movies'=> $movie
                ],200);
        }else{
            return response()->json([
                'status'=>'404',
                'message'=>'no such Movie found'
                ],404);
        }
    }
    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'mtitle'=>'required|string|Max:191',
            'desc'=>'required|string|Max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'422',
                'errors'=>$validator->messages()
            ], 422);
        }else{
            $movie = Movie::find($id);

            if($movie){

                $movie-> update([
                    'mtitle'=> $request->mtitle,
                'desc'=> $request->desc,
                'rate'=> $request->rate,
                'image'=> $request->image,
                //'category'=>$request->category,
                ]);

                return response()->json([
                    'status'=>'200',
                    'message'=>'Movie updated successfully!'
                    ],200);
            }else{
                return response()->json([
                    'status'=>'404',
                    'message'=>'something went wrong'
                    ],404);
            }

        }

    }
}
