@extends('master')

@section('title')
Sign In
@endsection

@section('content')
    <h3>Sign In</h3>

    @if(count($errors) > 0)
        <div class="row">
          <div class="col-md-6">
            <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
        </div>
    @endif

        <div class="col-md-6">
                <form action="{{route('postsignin')}}" method="post">
                  <div class='form-group {{$errors -> has('email') ? 'has-error' : '' }}'>
                    <label>Email</label>
                    <input class='form-control' type='text' name='email' id='email' value="{{ Request::old('email')}}">
                  </div>

                  <div class='form-group {{$errors -> has('password') ? 'has-error' : '' }}'>
                    <label>Password</label>
                    <input class='form-control' type='password' name='password' id='password'>
                  </div>

                    <button type='submit' class='btn btn-primary'>Submit</button>
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                </form>

            </div>
        </div>

@endsection
