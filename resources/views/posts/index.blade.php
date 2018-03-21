@extends('layouts.app')

@section('content')

            @foreach($posts as $post)

                @include('posts._article')

            @endforeach

            {{ $posts->links() }}

@endsection
