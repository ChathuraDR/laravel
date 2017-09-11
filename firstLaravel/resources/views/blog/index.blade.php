@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $post['title'] }}</h1>
            <p>{{ $post['content'] }}!</p>
            <!-- array_search method will get the position of the relevant element in the array -->
            <p><a href="{{route('blog.post', ['id'=> array_search($post,$posts)])}}">Read more...</a></p>
        </div>
    </div>
    <hr>
    @endforeach
@endsection

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <h1>Control Structure</h1>
            @if(true)
                <p>This only displays if it is true</p>
            @else
                <p>{{ 2 == 2 ? "Hello" : "Does not equal"}}</p>
            @endif
            <hr>
            @for($i = 0; $i < 5; $i++)
                <p>{{$i + 1}}. Iteration </p>
            @endfor
            <hr>
            <!-- xss protection-->
            <h2>XSS</h2>
            <!-- scape from html tags -->
            {{"<script>alert('hello')</script>"}}
            <!-- doesn't scape from html tags -->
            {!! "<script>alert('hello')</script>" !!}
        </div>
    </div>
@endsection