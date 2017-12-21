@extends('master')

@section('title')
Dashboard
@endsection

<div class='row newpost'>
    <div class='col-md-6 col-md-offset-5'>
        <section class='newpost'>
        <header><h3>What do you have to say?</h3></header>
        <form action=''>
            <div class='form-group'>
                <textarea name='newpost' id='newpost' class='form-control'  rows='5' placeholder='Your Post'></textarea>
            </div>
                <button type='submit' class='btn btn-primary'>Post</button>
        </form>
        </section>
  
        <div name='posts'class='row post'>
            <div class='col-md-6'>
            <header><h3>What others have to say?</h3></header>
                <article >
                    <p>   He selector would be #demolist.dropdown-menu li a note no space between id and class. However i would suggest a more generic approach:
                    </p>
                </article>
                <div class='info'>
                    Posted by Satheeshan on 1 April 206BC
                </div>
                <div class='interaction'>
                <p>
                    <a href='#'>Like</a>|
                    <a href='#'>Dislike</a>|
                    <a href='#'>Edit</a>|
                    <a href='#'>Delete</a>
                </p>
                </div>
            </div>
        </div>
        <div class='row post'>
            <div name='posts'class='col-md-6'>
            <header><h3>What others have to say?</h3></header>
                <article >
                    <p>   He selector would be #demolist.dropdown-menu li a note no space between id and class. However i would suggest a more generic approach:
                    </p>
                </article>
                <div class='info'>
                    Posted by Satheeshan on 1 April 206BC
                </div>
                <div class='interaction'>
                <p>
                    <a href='#'>Like</a>|
                    <a href='#'>Dislike</a>|
                    <a href='#'>Edit</a>|
                    <a href='#'>Delete</a>
                </p>
                </div>
            </div>
        </div>

    </div>     
</div>