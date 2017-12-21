@extends('master')

@section('title')
Sign In
@endsection

@section('content')
    <h3>Sign In</h3>
        <div class="col-md-6">
                <form action="{{route('postsignin')}}" method="post">
                  <div class='form-group'>
                    <label>Email</label>
                    <input class='form-control' type='text' name='email' id='email'>
                  </div>

                  <div class='form-group'>
                    <label>Password</label>
                    <input class='form-control' type='password' name='password' id='password'>
                  </div>

                    <button type='submit' class='btn btn-primary'>Submit</button>
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                </form>

            </div>
        </div>

@endsection
