<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


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

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['storeLogin','store','destroyLogin']]);
    }

    public function index()
    {
        //910043443252-cm54om8q8rt4u32udfvvij2avq36653i.apps.googleusercontent.com   Id-client
        //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 secret code
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
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials=[
            'email'=>$request['email'],
            'password'=>$request['password']
        ];

        if(! $token = auth()->attempt($credentials)){
            return response()->json(['error'=>'Unauthorised'], 401);
       }
            $user = Auth::user();
            $path = $this->redirectTo();
            return response(["user"=>$user,'token' => $token, "path"=>$path],200);
    }
    public function me()
    {
        return response()->json(auth()->user());
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
        Auth::login($user);
        $credentials=[
            'email'=>$request['email'],
            'password'=>$request['password']
        ];
        $token = Auth::attempt($credentials);


//        auth()->login($user,true);
        $response = ["message"=>"User well created!!", "User"=>$user, 'authorisation' => [
            'token'=>$token,
            'type' => 'bearer',
        ] ];
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
        //Auth::logout();
        auth()->logout();
        $response = ["message"=>"Successfully logged out","user"=>$user];
        return response($response,200);
    }

    public function refresh()
    {
        return  $this->respondWithToken(auth()->refresh());
    }

    public function refreshToken(Request $request)
    {
        $refreshToken = $request->input('refresh_token');

        try {
            $newToken = Auth::guard('api')->refresh($refreshToken);

            return response()->json([
                'access_token' => $newToken,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid refresh token'], 401);
        }
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
