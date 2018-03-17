@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)

                <article>
                    <div>
                        <span class="pull-left">
                            <a href="{{ route('posts.show', $post) }}"><h2>{{ $post->title }}</h2></a>
                        </span>
                    </div>
                    <div>
                        {{ $post->body }}
                    </div>
                    <div>
                        <small class="badge">{{ $post->author->name }}</small>
                        <span class="badge">
                            <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
                        </small>
                    </div>
                    <div>
                        @foreach($post->tags as $tag)
                            <small class="badge">
                                <a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }} &nbsp;</a>
                            </small>
                        @endforeach
                    </div>
                </article>
                <hr>

            @endforeach
        </div>
    </div>
</div>
@endsection
