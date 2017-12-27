@extends('master')
<link rel='stylesheet' href={{URL::to('src/css/dashboard.css')}}>
@section('title')
Dashboard
@endsection
@include('postvalidate')
<div id='error' class='error'>
</div>
<div id='success' class='success'>
</div>
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
      <a class="navbar-brand" href="{{route('dashboard')}}">Renegade</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('account')}}">Account</a></li>
        <li><a href="{{route('logout')}}">Logout</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<div class='row newpost'>
    <div class='col-md-6 col-md-offset-5'>
        <section class='newpost'>
        <header><h3>What do you have to say?</h3></header>

            <div class='form-group'>
                <textarea name='body' id='newpost' class='form-control'  rows='5' placeholder='Your Post'></textarea>
            </div>
                <button type='submit' class='btn btn-primary' id='postit'>Post</button>


                <input type='hidden' value='{{Session::token()}}' name='_token'>


        </section>

        <div name='posts'class='row post'>
            <div class='col-md-6'>
            <header><h3>What others have to say?</h3></header>

              @foreach($posts as $post)
                @if((Auth::user()->channel == "channel2") && ($likecount[$post->id]['likes'] > 0))
                @php
                $tags=unserialize($post->tags)
                @endphp
                 @if(($userinterest['i1']&&$tags['t1'])||($userinterest['i2']&&$tags['t2'])||($userinterest['i3']&&$tags['t3'])||($userinterest['i4']&&$tags['t4'])||($userinterest['i5']&&$tags['t5']))
                <article data-postid='{{$post->id}}'>
                        <p>{{$post->body}}</p>


                <div class='info'>
                    Posted by user {{$post->user['first_name']}} on {{$post->created_at}}
                </div>
                <div class='interaction'>
                <p>

                    <a href='#' class='like' >{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ?$likecount[$post->id]['likes'].' You liked this post' :$likecount[$post->id]['likes'].' Like':$likecount[$post->id]['likes'].' Like'  }}</a>|
                    <a href='#' class='like' >{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ?$likecount[$post->id]['dislikes'].' You don\'t like this post' :$likecount[$post->id]['dislikes'].' Dislike' :$likecount[$post->id]['dislikes'].' Dislike'  }}</a>
                    @if(Auth::user() == $post->user)
                    |<a href='#' class='editpost'>Edit</a>|
                    <a href='{{route('post.delete',['post.id' => $post->id])}}'>Delete</a>
                  @endif
                </p>
                </div>
              </article>
              @endif
            @endif
            @if(Auth::user()->channel == "channel1")
            @php
             $tag=unserialize($post->tags);
             echo '<pre>'; print_r($userinterest); echo '</pre>';
             echo '<pre>'; print_r($tag); echo '</pre>';
            @endphp
              @if((($userinterest['i1']== 1)&&($tag['t1'] == "true"))||(($userinterest['i2']== 1)&&($tag['t2'] == "true"))||(($userinterest['i3']== 1)&&($tag['t3'] == "true"))
              ||(($userinterest['i4']== 1)&&($tag['t4'] == "true"))||(($userinterest['i5']== 1)&&($tag['t5'] == "true")))
               <article data-postid='{{$post->id}}'>
                    <p>{{$post->body }}</p>


            <div class='info'>
                Posted by user {{$post->user['first_name']}} on {{$post->created_at}}
            </div>
            <div class='interaction'>
            <p>

                <a href='#' class='like' >{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ?$likecount[$post->id]['likes'].' You liked this post' :$likecount[$post->id]['likes'].' Like':$likecount[$post->id]['likes'].' Like'  }}</a>|
                <a href='#' class='like' >{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ?$likecount[$post->id]['dislikes'].' You don\'t like this post' :$likecount[$post->id]['dislikes'].' Dislike' :$likecount[$post->id]['dislikes'].' Dislike'  }}</a>
                @if(Auth::user() == $post->user)
                |<a href='#' class='editpost'>Edit</a>|
                <a href='{{route('post.delete',['post.id' => $post->id])}}'>Delete</a>
                @endif
            </p>
            </div>
          </article>
              @endif
          @endif
                @endforeach
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id='editmodal'>
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <label>Edit</label>
                <textarea class='form-control' rows='5' col='5' id='editform'>
                </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='modal-save'>Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id='tagmodal'>
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <label>Add tags</label>
                <input type='checkbox' id='t1' value='t1'>T1</input>
                <input type='checkbox' id='t2' value='t2'>T2</input>
                <input type='checkbox' id='t3' value='t3'>T3</input>
                <input type='checkbox' id='t4' value='t4'>T4</input>
                <input type='checkbox' id='t5' value='t5'>T5</input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='tagsave'>Save </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

    </div>
    <script>
      var token='{{Session::token()}}';
      var url='{{route('edit')}}';
      var likeurl='{{route('like')}}';
      var  dashboard='{{route('dashboard')}}';
      var createpost='{{route('createpost')}}';
      </script>
</div>
