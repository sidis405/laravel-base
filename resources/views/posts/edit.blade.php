@extends('layouts.app')

@section('content')

<h3 class="page-title">Modifica Post</h3>
<hr>

<form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PATCH')

    <div class="form-group">
        <label>Titolo</label>
        <input class="form-control" name="title" placeholder="Inserisci un titolo" value="{{ old('title', $post->title) }}" />
    </div>

    <div class="form-group">
        <label>Carica cover</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label>Articolo</label>
        <textarea class="form-control" rows="10" name="body" placeholder="Scrivi l'articolo">{{ old('body', $post->body) }}</textarea>
    </div>

    <div class="form-group">
        <label>Scegli Categoria</label>
        <select class="form-control" name="category_id">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected="" @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Scegli Tags</label>
        <select class="form-control" multiple="" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" @if(
                    in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))
                    ) selected="" @endif>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary pull-right">Invia Post</button>
    </div>
</form>

@stop

