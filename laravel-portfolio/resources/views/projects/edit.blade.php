@extends("layouts.projects")

@section("title", "Modifica un progetto")

@section("content")
    <form action="{{route("projects.update", $project)}}" method="POST">
        @csrf
        @method("PUT")

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">nome progetto</label>
            <input type="text" name="name" id="name" value="{{$project->name}}">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">cliente</label>
            <input type="text" name="client" id="client" value="{{$project->client}}">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">data del progetto </label>
            <input type="date" name="period" id="period" value="{{$project->period}}">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">scrivi una breve descrizione</label>
            <textarea name="summary" id="summary">{{$project->summary}}</textarea>
        </div>
        <input type="submit" value="salva">

    </form>

@endsection