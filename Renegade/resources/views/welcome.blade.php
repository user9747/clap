@extends('master')

@section('title')
Sign Up
@endsection

@section('content')
    <h3>Sign Up</h3>
        <div class="col-md-6">
                <form action="#" method="post">
                  <div class='form-group'>
                    <label>Email</label>
                    <input class='form-control' type='text' name='email' id='email'>
                  </div>
                  <div class='form-group'> 
                    <label>First Name</label>
                    <input class='form-control' type='text' name='first_name' id='first_name'>
                  </div>
                  <div class='form-group'> 
                    <label>Last Name</label>
                    <input class='form-control' type='text' name='last_name' id='last_name'>
                  </div>
                  <div class='form-group'> 
                    <label>Password</label>
                    <input class='form-control' type='password' name='password' id='password'>
                  </div>
                  <div class='form-group'> 
                    <label>Channel</label>
                    <input class='form-control' type='text' name='channel' id='channel'>
                  </div>
                    <button type='submit' class='btn btn-primary'>Submit</button>
                </form>
                        
            </div>    
        </div>

@endsection