@extends("layouts.posts")

@section("title", $post->title)
@section("content")
    <div class="mb-4  ">
        <h2>
            - {{$post->author}}
        </h2>
        <small>{{$post->category}}</small>

    </div>
    <section>
        <p>{{$post->content}}</p>
    </section>

@endsection