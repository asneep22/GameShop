@component('mail::message')

<p>Нажмите на кнопку ниже, чтобы подтвердить почту.</p>

@component('mail::button', ['url' => $url])
    Подтвердить почту
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

<p>Если кнопа не работает, перейдите по ссылке: <a href="{{ $url }}">{{ $url }}</a></p>

@endcomponent