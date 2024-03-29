<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $projectId = $request->query('project_id');

        $project = Project::find($projectId);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }

        $files = $project->files;

        return response()->json($files);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ],[]);

        //$user=Auth::user();
        $file= new File();
        $file->name=$request->name;
        $file->project_id=$request->project_id;

        $file->save();

        $response = [
            "message" => "File well created!!",
            "file"=>$file
        ];
        return response($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_file)
    {
        $file = File::find($id_file);

        $response = [
            "message"=>"File Found!!",
            "file"=>$file
        ];
        return response($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $validated = Validator::make([ 'name'=>'required | unique'],[]);
        if($validated->fails()){
            return response("It was an error while updating the file",Response::HTTP_BAD_REQUEST);
        }else{
            if($request->name){
                $file->name = $request['name'];}
            if($request['content']){
                $file->content = $request['content'];}
        }
        $file->save();
        $response=[
            "message"=>"File well updated",
            "file"=>$file
        ];
        return response($response);
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function destroy($id_file)
    {
        $file = File::find($id_file);
        $response =[
            "message"=>"file well deleted",
            "file"=>$file
        ];
        $file->delete();
        return response($response);
    }
}
