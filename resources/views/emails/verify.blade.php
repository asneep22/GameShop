@component('mail::message')

<p>Нажмите на кнопку ниже, чтобы подтвердить почту.</p>

@component('mail::button', ['url' => $url])
    Подтвердить почту
@endcomponent

<p>Если кнопа не работает, перейдите по ссылке: <a href="{{ $url }}">{{ $url }}</a></p>

С уважением,<br>
{{ config('app.name') }}

@endcomponent
