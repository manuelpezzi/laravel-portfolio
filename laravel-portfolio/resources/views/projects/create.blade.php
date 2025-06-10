@extends("layouts.projects")

@section("title", "Aggiungi un progetto")

@section("content")
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome progetto</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente</label>
            <input type="text" name="client" id="client">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">Data del progetto</label>
            <input type="date" name="period" id="period">
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Scrivi una breve descrizione</label>
            <textarea name="summary" id="summary"></textarea>
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Tipologia</label>
            <select name="type_id" id="type_id">
                <option value="">Seleziona un tipo</option>
                @if (isset($types) && $types->count() > 0)
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                @else
                    <option value="">Nessun tipo disponibile</option>
                @endif
            </select>
        </div>
        <input type="submit" value="Salva">
    </form>
@endsection