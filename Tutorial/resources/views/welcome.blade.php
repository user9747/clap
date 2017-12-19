@extends('Pages.master')

@section('title')

@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Sign Up</h3>
        <form action='#' method='post'>
            <div class='form-group'>
                <label for='email'>Your Email</label>
                
                    <input class='form-control' type='text' name='email' id='email'>
            </div>
            <div class='form-group'>
                <label for='name'>Your First name</label>
                
                    <input class='form-control' type='text' name='name' id='name'>
            </div>
            <div class='form-group'>
                <label for='password'>Your Email</label>
                
                    <input class='form-control' type='password' name='password' id='password'>
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
    </div>
    
    
    <div class="col-md-6">
        <h3>Sign In</h3>
        <form action='#' method='post'>
            <div class='form-group'>
                <label for='email'>Your Email</label>
                
                    <input class='form-control' type='text' name='email' id='email'>
            </div>
            
            <div class='form-group'>
                <label for='password'>Your Email</label>
                
                    <input class='form-control' type='password' name='password' id='password'>
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
    </div>
</div>
@endsection