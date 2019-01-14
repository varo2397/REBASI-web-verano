<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //error_log(Session::get('user'));
        return view('user.index');
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
        $data = $request->all();
        error_log($request->input("name"));
        error_log($request->input("email"));
        error_log($request->input("password"));

        DB::table('users')->insert([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => bcrypt($request->input("password")),
            'role' => 0
        ]); 

        return redirect('/reports');
        
    }
        //

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
    public function destroy($id)
    {
        //
    }

    public function login(Request $request){
        $data = $request->all();
        /*$pass = $data['password'];*/
        $email = $data['email'];
        if(!$data['email'] || !$data['password']){
            Session::put('message','No ingresó todos los datos');
            return redirect()->back();
        }else {
            $userData = array(
                'email'     => $data['email'],
                'password'  => $data['password']
            );
            if(Auth::attempt($userData)){
                Session::flush();
                Session::put('user',Auth::user());
                return redirect('/reports');
            }else{
                Session::put('message','Contraseña incorrecta o usuario no existe');
                return redirect()->back();
            }
        }
    }

    public function logout(){
        $user = Session::get('user');
        error_log($user->email);
        Session::forget('user');
        return redirect()->back();
    }
}
