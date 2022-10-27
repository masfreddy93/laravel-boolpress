@component('mail::message')
Post created
 
Your post has been created!
 
@component('mail::button', ['url' => route('admin.posts.show', $post)])
View Post
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent


