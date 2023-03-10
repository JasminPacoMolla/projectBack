<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response(User::with('projects')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
//        return view('profile',compact('user'));
        return response($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function update(Request $request, User $user) {

        $validated = Validator::make([ 'telefono'=>'digits|maxDigits:12'],
            ['email'=>'email|unique:users'],
            ['password'=>'min:8']
        );

        if($validated->fails()){
            return response("It was an error while updating the user",Response::HTTP_BAD_REQUEST);
        }else {
            if($request->name)
                $user->name = $request['name'];
            if($request->email)
                $user->email = $request['email'];
            if($request->password)
                $user->password = Hash::make($request['password']);
           if($request->phoneNumber)
                $user->phoneNumber = $request['phoneNumber'];
           if($request->photo)
                $user->photo = $request['photo'];
           if($request->address)
                $user->address = $request['address'];
           if($request->country)
                $user->country = $request['country'];
            if($request->user_type)
                $user->user_type = $request['user_type'];
            $user->save();

            $response = [
                "message" => 'User {{$user->name}} well updated',
                "user" => $user
            ];

            return response($response);
        }
      }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $respuesta =[
            "message"=>"User well deleted"
        ];
        return response($respuesta);
    }
}


