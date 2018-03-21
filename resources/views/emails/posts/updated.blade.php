@component('mail::message')
# Ciao {{ $post->author->name }}

Il tuo post è stato aggiornato.

@component('mail::button', ['url' => route('posts.show', $post)])
Vedi il tuo post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
