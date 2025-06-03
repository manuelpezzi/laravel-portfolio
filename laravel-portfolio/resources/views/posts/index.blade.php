@extends("layouts.posts")
@section("title", "tutti i Post")
@section('content')
    <table>
        <thead>
            <tr>
                <th>titolo</th>
                <th>autore</th>
                <th>categoria</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($posts as $post)


                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->author}}</td>
                    <td>{{$post->category}}</td>
                    <td>
                        <a href="{{route("posts.show", $post)}}"> Visualizza</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection