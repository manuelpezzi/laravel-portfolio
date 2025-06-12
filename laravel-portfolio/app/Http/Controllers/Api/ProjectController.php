<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        //prendo tutti i progetti dal database

        $projects = Project::with('type')->get();
       
        return response()->json(
            [
                "success"=> true,
                "data"=> $projects
            ]
        );
    }

    public function show(Project $project){
      
        $project->load("Type","technologies");
return response()->json([

    "success"=> true,
    "data"=> $project

]);
    }
}
