@component('mail::message')
    Ваша покупка прошла успешно!

    @component('mail::panel')
        @foreach ($order_products as $key)
            <p>{{ $key->Product->title }} : {{ $key->Product->keys->first()->key }}</p>
        @endforeach
    @endcomponent

    С уважением,<br>
    {{ config('app.name') }}
@endcomponent
