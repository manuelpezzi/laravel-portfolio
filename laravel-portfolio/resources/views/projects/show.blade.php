@extends("layouts.projects")

@section("title", $project->name)
@section("content")
    <div class="mb-4">
        <h2>
            - {{$project->client}}
        </h2>
        <small>{{$project->period}}</small>

    </div>
    <section>
        <p>{{$project->summary}}</p>
    </section>

@endsection