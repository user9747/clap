<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
          ]);
        $email=$request['email'];
        $password=bcrypt($request['password']);
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $gender=$request['gender'];
        $channel=$request['channel'];
        $interest=['i1'=>$request['i1']?1:-1,'i2'=>$request['i2']?1:-1,'i3'=>$request['i3']?1:-1,'i4'=>$request['i4']?1:-1,'i5'=>$request['i5']?1:-1];

        $user=new User();
        $user->email=$email;
        $user->password=$password;
        $user->first_name=$first_name;
        $user->last_name=$last_name;
        $user->gender=$gender;
        $user->channel=$channel;
        $user->interest=serialize($interest);

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');

    }
    public function isOn($interest){
      if($interest=='on')
        return 1;
      else
        return 0;  
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

  public function getAccount()
  {
    return view('account',['user' => Auth::user()]);
  }

  public function postSaveAccount(Request $request)
  {
    $this ->validate($request,[
      'first_name' => 'required|max:120',
      'last_name' => 'required|max:120',
    ]);

    $user = Auth::user();
    $user->first_name = $request['first_name'];
    $user->last_name = $request['last_name'];
    $file = $request->file('image');
    $filename = $request['first_name'] . '-' .$user->id . '.jpg';
    $user->save();
    if($file)
    {
      Storage::disk('local')->put($filename,File::get($file));
    }
    return redirect()->route('account');
  }

  public function getUserImage($filename)
  {

    $file = Storage::disk('local')->get($filename);
    return new Response($file,200);
  }

}
