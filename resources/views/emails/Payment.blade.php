@component('mail::message')
    <div class="message-block">
        <div class="radial-gradient-background-blue inner-header">
            <h1 class="text-center text-white margin-0" style="font-size: 1.4rem">Teeter-totter</h1>
        </div>
        <div class="inner-message-body">
            <h2 class="text-center">Заказ: {{$order->id}}</h2>
            <div class="panel-line-blue">
                @foreach ($order_products as $key)
                    <p class="padding-0 margin-0">{{ $key->Product->title }} : {{ $key->key }}</p>
                @endforeach
            </div>
            С уважением,<br />
            Teeter-totter<br />
            <div class="text-center" style="padding: 32px">
                <small class="margin-0 text-gray">© {{ date('Y') }} {{ config('app.name') }}.
                    @lang('Все права защищены.')</small>
            </div>
        </div>
    </div>
@endcomponent
