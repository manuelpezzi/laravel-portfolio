@extends("layouts.projects")

@section("title", $project->name)

@section("content")

    <div class="mt-3 mb-3 d-flex flex-column">
        <h2>- {{ $project->client }}</h2>
        <small>{{ $project->period }}</small>

        <section>
            <p>{{ $project->summary }}</p>
            <p><strong>Tipo:</strong> {{ $project->type ? $project->type->name : 'Nessun tipo' }}</p>
            <small>tecnologia:
                @forelse ($project->technologies as $technology)
                    <span class="badge" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
                @empty
                    nessuna tecnologia

                @endforelse

            </small>
            <div class="d-flex py-3 gap-3">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-warning">Modifica</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Elimina
                </button>
            </div>
            <a href="{{ route('projects.index') }}">Torna a tutti i progetti</a>
        </section>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Con questa operazione eliminerai definitivamente il progetto
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-outline-danger" value="Elimina Definitivamente">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection