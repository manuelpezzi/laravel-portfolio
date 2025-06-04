@extends("layouts.projects")
@section("title", "tutti i progetti")
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-warning">name</th>
                <th class="bg-warning">client</th>
                <th class="bg-warning">period</th>
                <th class="bg-warning"></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($projects as $project)


                <tr>
                    <td class="bg-success">{{$project->name}}</td>
                    <td class="bg-success">{{$project->client}}</td>
                    <td class="bg-success">{{$project->period}}</td>
                    <td class="bg-success">
                        <a class="text-white" href="{{route("projects.show", $project)}}"> Visualizza</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center py-3 gap-3">
        <a href="{{route("projects.create")}}" class="btn btn-outline-warning">aggiungi nuovo progetto</a>
@endsection