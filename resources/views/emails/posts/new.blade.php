@component('mail::message')
# Ciao admin.

E' stato creato un nuovo post

@component('mail::button', ['url' => route('posts.show', $post)])
Vedi il post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
