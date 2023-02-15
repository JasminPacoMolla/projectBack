<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct(){
//        $this->middleware('guest')->except('destroyLogin');
//        $this->middleware('auth')->only('destroyLogin');
//    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("signup");
    }

    public function createLogin(){
        return view('login');
    }

    public function storeLogin(Request $request){
        $credentials=[
            'email'=>$request['email'],
            'password'=>$request['password']
        ];
        if(!Auth::attempt($credentials)){
            return response()->json(['error'=>'Unauthorised'], 401);
       }else{
            $user = Auth::user();
            $token= $user->createToken('token');
            $path = $this->redirectTo();
           return response(["user"=>$user,"token"=>$token,"path"=>$path],200);
       }

    }
    protected function redirectTo()
    {
        $user =  Auth::user();
        $path1 = ["path"=>"/IndexAdmin"];
        $path2=["path"=>"/"];
        if ($user->user_type == 'admin')
        {
            return $path1;  // admin dashboard path
        } else {
            return $path2;  // member dashboard path
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*request:all().*/
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
           // 'api_token' => Str::random(60),
            'termsAcceptation'=>'required'
        ]);

        $user= new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->termsAcceptation = $request['termsAcceptation'];
        $user->password=Hash::make($request['password']);

        $user->save();

        auth()->login($user,true);
        $response = ["message"=>"User well created!!", "User"=>$user ];
        return response($response,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyLogin(){
        $user = Auth::user();
        $user->tokens->each(function($token, $key) {
            $token->delete();
        });
        Auth::logout();
        $response = ["message"=>"Successfully logged out","Usuario"=>$user];
        return response($response,200);
    }
}
