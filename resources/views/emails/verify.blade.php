@component('mail::message')
    <div class="message-block">
        <div class="radial-gradient-background-blue inner-header">
            <h1 class="text-center text-white margin-0" style="font-size: 1.4rem">Teeter-totter</h1>
        </div>
        <div class="inner-message-body">
            <h2 class="text-center">Подтверждение почты</h2>
            <p>Для подтверждения почты нажмите на кнопку</p>
@component('mail::button', ['url' => $url])
 Подтвердить почту
@endcomponent
                <p style>Если кнопка не работает, перейдите по ссылке:</p>
                <p><a href="{{ $url }}"><small>{{ $url }}</small></a></p>
                <p>
                    С уважением,<br />
                    {{ config('app.name') }}<br />
                <div class="text-center" style="padding: 32px">
                    <small class="margin-0 text-gray">© {{ date('Y') }} {{ config('app.name') }}.
                        @lang('Все права защищены.')
                    </small>
        </div>
    </div>
@endcomponent
