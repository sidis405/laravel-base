@extends('layouts.app')

@section('content')

            @foreach($posts as $post)

                <article>
                    <div>
                        <div>
                            <a href="{{ route('posts.show', $post) }}"><h2>{{ $post->title }}</h2></a>
                        </div>
                        <div>
                            <small class="muted">{{ $post->created_at->format('d/m/Y H:i') }}</small>
                        </div>
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

@endsection
