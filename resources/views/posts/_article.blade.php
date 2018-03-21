<article>
    <div>
        <img src="{{ $post->image }}" class="w-100">
    </div>
    <div>
        <div>
            <a href="{{ route('posts.show', $post) }}"><h2>{{ $post->title }}</h2></a>

            @can('update', $post)
                <span class="pull-right"><a href="{{ route('posts.edit', $post) }}"><i class="fa fa-edit"></i></a></span>
            @endcan

        </div>
        <div>
            <small class="muted">inviato da {{ $post->author->name }} il {{ $post->created_at->format('d/m/Y H:i') }}</small>
        </div>
    </div>
    <div>
        {{ $post->body }}
    </div>
    <div>
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
