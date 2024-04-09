
@component('mail::message')

<p>Hello  {{ $user->name }}</p>

@component('mail::button',['url' => url('resent/'.$user->remember_token)])
verify
@endcomponent

<p>In case you have any isse recovering your password</p>

Thanks </br>

{{ config('app.name') }}
@endcomponent