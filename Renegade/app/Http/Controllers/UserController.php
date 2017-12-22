<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    public function getDashboard(){

      return view('dashboard');

      }



    public function Signup(Request $request){
        $this->validate($request,[
          'email' => 'required|email|unique:users',
          'first_name' => 'required|max:120',
          'last_name' => 'required|max:120',
          'password' => 'required|min:4',
          'gender' => 'required',
          'channel' => 'required',
          'interest' => 'required'
          ]);
        $email=$request['email'];
        $password=bcrypt($request['password']);
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $gender=$request['gender'];
        $channel=$request['channel'];
        $interest=$request['interest'];

        $user=new User();
        $user->email=$email;
        $user->password=$password;
        $user->first_name=$first_name;
        $user->last_name=$last_name;
        $user->gender=$gender;
        $user->channel=$channel;
        $user->interest=$interest;

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');

    }

    public function SignIn(Request $request)
    {

      $this->validate($request,[
      	'email' => 'required',
      	'password' => 'required',

      	]);


	    if (Auth::attempt(['email'=> $request['email'],'password'=> $request['password']])){

		    return redirect()->route('dashboard');

	  }
	     return redirect()->back();
    }



    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('login');
    }




}
