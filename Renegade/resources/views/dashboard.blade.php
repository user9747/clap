@extends('master')

@section('title')
Dashboard
@endsection

@include('postvalidate')
<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Renegade</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('logout')}}">logout</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
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
                    @if(Auth::user() == $post->user)
                      |
                    <a href='#'>Edit</a>|
                    <a href='{{route('post.delete',['post.id' => $post->id])}}'>Delete</a>
                  @endif
                </p>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>
