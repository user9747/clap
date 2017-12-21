@extends('master')

@section('title')
Sign Up
@endsection

@section('content')
    <h3>Sign Up</h3>
        <div class="col-md-6">
                <form action="{{route('postsignup')}}" method="post">
                  <div class='form-group'>
                    <label>Email</label>
                    <input class='form-control' type='text' name='email' id='email'>
                  </div>
                  <div class='form-group'>
                    <label>FirstName</label>
                    <input class='form-control' type='text' name='first_name' id='first_name'>
                  </div>
                  <div class='form-group'>
                    <label>LastName</label>
                    <input class='form-control' type='text' name='last_name' id='last_name'>
                  </div>
                  <div class='form-group'>
                    <label>Password</label>
                    <input class='form-control' type='password' name='password' id='password'>
                  </div>
                  <div class='form-group'>
                  <select name="channel">
                    <option value="channel1">Channel1</option>
                    <option value="channel2">Channel2</option>
                  </select>
                  </div>
                  <div class='form-group'>

                  <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Albino">Albino</option>
                  </select>
                  </div>
                  <div class='form-group'>
                  <select name="interest">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  {{--  <div class='form-group'>
                   <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" name='channel' type="button" data-toggle="dropdown">
                    Channels<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">First</a></li>
                        <li><a href="#">Second</a></li>
                      </ul>
                   </div>
                  </div>
                  <div class='form-group'>
                   <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" name='gender' data-toggle="dropdown">
                    Gender<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Male</a></li>
                        <li><a href="#">Female</a></li>
                      </ul>
                   </div>
                  </div>
                  <div class='form-group'>
                   <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" name='interest' data-toggle="dropdown">
                    Interest<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Interest 1</a></li>
                        <li><a href="#">Interest 2</a></li>
                        <li><a href="#">Interest 3</a></li>
                      </ul>
                   </div>
                  </div> //  --}}
                    <button type='submit' class='btn btn-primary'>Submit</button>
                <input type='hidden' name='_token' value='{{Session::token()}}'>
              </form>


            </div>
        </div>

@endsection
