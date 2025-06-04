@extends("layouts.projects")

@section("title", "Aggiungi un progetto")

@section("content")
    <form action="{{route("projects.store")}}" method="POST">
        @csrf
        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">nome progetto</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">cliente</label>
            <input type="text" name="client" id="client">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">data del progetto </label>
            <input type="date" name="period" id="period">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">scrivi una breve descrizione</label>
            <textarea name="summary" id="summary"></textarea>
        </div>
        <input type="submit" value="salva">

    </form>

@endsection