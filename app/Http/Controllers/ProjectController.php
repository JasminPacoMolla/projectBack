<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{//Seeder-tests-phpdocumentor;
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Project::with('files')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        //$user=Auth::user();
        $project= new Project();
        $project->name=$request->name;
        $project->user_id=$request->user_id;

        $project->save();

        $response = [
            "message" => "Project well created!!",
            "project"=>$project
        ];
        return response($response);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id_project)
    {
//        return response(Project::with('user')->find(3));
        //return response();

        $project = Project::find($id_project);

        $response = [
            "message"=>"Project Found!!",
            "project"=>$project
        ];
       return response($response);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project)
    {
        $project = Project::find($id_project);
        $validated = Validator::make([ 'name'=>'required'],[]);
        if($validated->fails()){
            return response("It was an error while updating the project",Response::HTTP_BAD_REQUEST);
        }else{
            if($request->name)
                $project->name = $request['name'];
        }
        $project->save();


         $response=[
            "message"=>"Project well updated",
            "project"=>$project
        ];
        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project)
    {
        $project = Project::find($id_project);
        $response =[
            "message"=>"Project well deleted",
            "project"=>$project
        ];
        $project->delete();
        return response($response);
    }



    /**/
}
