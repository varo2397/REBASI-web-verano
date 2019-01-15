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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|',
            'confirm' => 'required|string|',
        ]);

        if($data['radios'] == 0){
            DB::table('users')->insert([
            'name' => $data['name']." ".$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 0
            ]);
        }else{
            DB::table('users')->insert([
            'name' => $data['name']." ".$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 1
            ]);
            $newUser = DB::table('users')->where('email', $data['email'])->first();
            DB::table('hall_per_canton')->insert([
                'user_id' => $newUser->id,
                'canton' => $data['canton']
            ]);
        }

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
