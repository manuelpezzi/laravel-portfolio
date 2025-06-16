<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $projects = Project::all();
       
     return view("projects.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $types = Type::all();

          $technologies=Technology::all();

       return view("projects.create", compact("types","technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
      $data = $request->all();
      $newProject = new Project();
      $newProject->name = $data["name"];
      $newProject->client = $data["client"];
      $newProject->period = $data["period"];
      $newProject->summary = $data["summary"];
       $newProject->type_id = $data["type_id"];

       $img_url= Storage::putFile("projects",$data['image']);
       $newProject->image = $img_url;
      $newProject->save();
//controlliamo se riceviamo le tech
if ($request->has("technologies")){ 
      $newProject->technologies()->attach($data['technologies']);
      }
      return redirect()->route("projects.show",$newProject);      
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

       
     return view("projects.show",compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies =Technology::all();
          $types = Type::all();
     return view("projects.edit",compact("project","types","technologies" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->name = $data["name"];
        $project->client = $data["client"];
        $project->period = $data["period"];
        $project->summary = $data["summary"];
         $project->type_id = $data["type_id"];

        if(array_key_exists("image",$data)&& $request->hasFile("image")){

        //elimnare l'immagine precedente se presente
if($project->image){    
    Storage::disk('public')->delete($project->image);

}
        
        //caricare la nuova
        
            $img_url= Storage::putFile("projects",$data['image'],'public');

        //update db

        $project->image = $img_url;

        }

        $project->update();
        //verifichiamo se staimo ricevendo le tech
        if($request->has("technologies")){
               $project->technologies()->sync( $data['technologies']);
        }else{
            //se non riceviamo delle tech,allora eliminiamo titti quelli collegati al post attuale dalla tab
            $project->technologies()->detach();
        }
        //sincroniziamo le teclonlogie della nostra tabella pivot

       

        return redirect()->route("projects.show",$project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Elimina l'immagine, se esiste
    if ($project->image) {
        Storage::disk('public')->delete($project->image);
    }

    // Rimuovi tutte le associazioni nella tabella pivot project_technology
    $project->technologies()->detach();

    // Elimina il progetto
    $project->delete();

    return redirect()->route("projects.index");
    }
}
