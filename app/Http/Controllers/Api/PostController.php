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
}
