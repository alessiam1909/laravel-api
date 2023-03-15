<?php

namespace App\Http\Controllers\Api;

 use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
            $posts = Project::with( 'technologies', 'type')->paginate(6);
            return response()->json([
                'success' => true,
                'results' => $posts,
            ]);
        }

    public function show($slug){
        $posts = Project::with('technologies', 'type')->where('slug', $slug)->first();

        if($posts){
            return response()->json([
                'success' => true,
                'results' => $posts
    
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'error' => 'nessun post trovato'
            ]);
        }
    }
}
