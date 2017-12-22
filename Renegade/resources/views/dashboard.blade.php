@extends('master')

@section('title')
Dashboard
@endsection

@include('postvalidate');

<div class='row newpost'>
    <div class='col-md-6 col-md-offset-5'>
        <section class='newpost'>
        <header><h3>What do you have to say?</h3></header>
        <form action='{{route('createpost')}}' method='post'>
            <div class='form-group'>
                <textarea name='body' id='newpost' class='form-control'  rows='5' placeholder='Your Post'></textarea>
            </div>
                <button type='submit' class='btn btn-primary'>Post</button>
                <input type='hidden' value='{{Session::token()}}' name='_token'>
        </form>
        </section>
  
        <div name='posts'class='row post'>
            <div class='col-md-6'>
            <header><h3>What others have to say?</h3></header>
                    @foreach($posts as $post)
                <article>
                        <p>{{$post->body}}</p>
                    
                </article>
                <div class='info'>
                    Posted by user {{$post->user->first_name}} on {{$post->created_at}}
                </div>
                <div class='interaction'>
                <p>
                    <a href='#'>Like</a>|
                    <a href='#'>Dislike</a>|
                    <a href='#'>Edit</a>|
                    <a href='#'>Delete</a>
                </p>
                </div>
                @endforeach
            </div>
        </div>
        

    </div>     
</div>
