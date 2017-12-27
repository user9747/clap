<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Socialite;

class UserController extends Controller{

    public function getDashboard(){

      return view('dashboard');

      }



    public function Signup(Request $request){
        $this->validate($request,[
          'email' => 'required|email|unique:users',
          'first_name' => 'required|max:120',
          'last_name' => 'required|max:120',
          'username'=>'required|unique:users',
          'password' => 'required|min:4',
          'confirmpassword'=>'required_with:password|same:password|min:4',
          'gender' => 'required',
          'channel' => 'required',
          'interest'
          ]);
        $password=bcrypt($request['password']);
        $interest=['i1'=>$request['i1']?1:-1,'i2'=>$request['i2']?1:-1,'i3'=>$request['i3']?1:-1,'i4'=>$request['i4']?1:-1,'i5'=>$request['i5']?1:-1];

        $user=new User();
        $user->email=$request['email'];
        $user->password=$password;
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->gender=$request['gender'];
        $user->channel=$request['channel'];
        $user->username=$request['username'];
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
      	'username' => 'required',
      	'password' => 'required',

      	]);


	    if (Auth::attempt(['username'=> $request['username'],'password'=> $request['password']])){

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

  public function redirectToFacebook()
  {
      return Socialite::driver('facebook')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleFacebookCallback()
  {
     $userfb = Socialite::driver('facebook')->user();
    //$userfb = Socialite::driver('facebook')->stateless()->user();

      $user = new User;
      $user->first_name = $userfb->name;
      $user->email = $userfb->email;
      $user->save();

  }

  public function redirectToGoogle()
  {
      return Socialite::driver('google')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleGoogleCallback()
  {
    // $userg = Socialite::driver('google')->user();
    $userg = Socialite::driver('google')->stateless()->user();
      $user = new User;
      $user->first_name = $userg->user['name']['givenName'];
      $user->last_name = $userg->user['name']['familyName'];
      $user->email = $userg->email;
      // if($userg->user['gender'])
      // $user->gender = $userg->user['gender'];
      // else
      $user->gender='male';
      $user->password="default";
      $user->channel="channel1";
      $user->username=" ";
      $interest=['i1' => 1];
      $user->interest=serialize($interest);
      $user->save();
      Auth::login($user);
      return view('social',['user'=>Auth::user()]);

  }
public function socialup(Request $request){
  
  $this->validate($request,[
    'email' => 'required|email|unique:users',
    'first_name' => 'required|max:120',
    'last_name' => 'required|max:120',
    'username'=>'required|unique:users',
    'password' => 'required|min:4',
    'confirmpassword'=>'required_with:password|same:password|min:4',
    'gender' => 'required',
    'channel' => 'required',
    'interest'=>'required'
    ]);
    $user = Auth::user();
  $password=bcrypt($request['password']);
  $interest=['i1'=>$request['i1']?1:-1,'i2'=>$request['i2']?1:-1,'i3'=>$request['i3']?1:-1,'i4'=>$request['i4']?1:-1,'i5'=>$request['i5']?1:-1];
  $user->email=$request['email'];
  $user->password=$password;
  $user->first_name=$request['first_name'];
  $user->last_name=$request['last_name'];
  $user->gender=$request['gender'];
  $user->channel=$request['channel'];
  $user->username=$request['username'];
  $user->interest=serialize($interest);
  $user->update();
  Auth::login($user);
  return redirect()->route('dashboard');

}

public function social(Request $request){

  return view('social');



}




}
