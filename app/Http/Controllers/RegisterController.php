<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
            return back()->withErrors(['message'=>'Something is wrong.']);
        }else{
            return redirect('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*request:all().*/
    public function store(Request $request)/*Sign up*/
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            'termsAcceptation'=>'required'
        ]);

        $user= new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->termsAcceptation = $request['termsAcceptation'];
        $user->password=Hash::make($request['password']);

        $user->save();

        auth()->login($user,true);

        return redirect('/');

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
        Auth::logout();
        return redirect('/');
    }
}
