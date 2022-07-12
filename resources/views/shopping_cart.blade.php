@extends('app')

@section('title')
    Корзина
@endsection

@section('content')
    <div class="container d-flex flex-column mt-4">
        <form action="{{ route('buy') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex flex-column" style="min-height: 15rem; max-height: 15rem">
                        <h5 class="m-auto m-lg-0">Всего игр в корзине: {{ count($products) }}</h5>
                        <hr class="gradient">
                        <div class="overflow-y-auto table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="align-middle">
                                            <th scope="row" class="w-25">
                                                <p class="shop_cart_title{{ $product->id }}">{{ $product->title }}</p>
                                            </th>
                                            <td class="w-25 text-center p-0">

                                                <div class="d-flex flex-column">
                                                    @if ($product->discount != 0)
                                                        <small style="font-size: 0.75rem"
                                                            class="m-0 p-0 text-center text-secondary text-nowrap"
                                                            style=""><s>{{ $product->price }}</s>
                                                            <span class="discount-small ">
                                                                -{{ $product->discount }}%</span>
                                                        </small>
                                                    @endif
                                                    <span
                                                        class="m-auto text-center">{{ $product->price - ($product->price / 100) * $product->discount }}р</span>
                                                </div>
                                            </td>
                                            <td class="p-0">
                                                <div class="d-flex justify-content-end"><input type="number"
                                                        name="count{{ $product->id }}" value="1" min="1"
                                                        class="shop_cart_input form-input w-50"
                                                        data-id="{{ $product->id }}"
                                                        data-discount="{{ $product->discount }}"
                                                        data-game-title="{{ $product->title }}"
                                                        data-price="{{ $product->price }}">
                                                    <a href="{{ route('delete_product_from_card', $product->id) }}"
                                                        class="btn-green text-decoration-none text-light m-0 text-center p-0 w-25">X</a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <hr class="dotted">
                        <h5 class="m-0">Ваша персональная скидка:
                            @if (Auth::check() && Auth::user()->Discount)
                                {{ Auth::user()->Discount->disocunt_procent }}
                            @else
                                0
                            @endif
                            %
                        </h5>
                        <hr class="dotted">
                        <div class="overflow-y-auto">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="col">Сумма покупок, руб</th>
                                        <th scope="col">Скидка, %</th>
                                    </tr>
                                    @foreach ($personal_disounts as $personal_disount)
                                        <tr>
                                            <td scope="row">{{ $personal_disount->sum_buy }}</td>
                                            <td>{{ $personal_disount->disocunt_procent }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr class="dotted">
                        <h4 class="finish_price mt-2">Итоговая цена:
                            {{ $product->price - ($product->price / 100) * $product->discount }}р</h4>
                        <button type="submit" class="btn-green ms-0 m-auto my-3">Оплатить</button>
                    </div>
                </div>
                <div class="col-lg shop_carts">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 m-auto">Игры в корзине</h5>
                        <hr class="gradient">
                        @foreach ($products as $product)
                            <a href="{{ route('page_product', $product->id) }}"
                                class="mb-4 ms-lg-3 game-card-block d-flex rounded"
                                style="background: url('{{ URL::asset('/storage/' . $product->file_path) }}')">
                                <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute"
                                    style="z-index: 2">
                                    <h4 class="mt-3">{{ $product->title }}</h4>
                                    <p class="m-0">{{ Str::limit($product->description, 150, '...') }}
                                    </p>
                                </div>
                                <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </form>
        {{ $products->withQueryString()->links() }}
    </div>
@endsection
