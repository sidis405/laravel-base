@extends('layouts.app')

@section('content')
<h3>Lista Articoli</h3>

<table class="table table-striped table-hover table-responsive">
    <thead>
        <th>Titolo</th>
        <th>Autore</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Azioni</th>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form method="POST" action="{{ route('posts.status', $post) }}">
                        @method('PATCH')
                        @csrf
                        @if($post->published == 1)
                            <input type="hidden" name="published" value = "0">
                            <button type="/submit" class="btn btn-danger"><i class="fa fa-fw fa-arrow-down"></i></button>
                        @else
                            <input type="hidden" name="published" value = "1">
                            <button type="/submit" class="btn btn-success"><i class="fa fa-fw fa-arrow-up"></i></button>
                        @endif
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
@endsection
