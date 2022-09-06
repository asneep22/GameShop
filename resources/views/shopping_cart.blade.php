@extends('app')

@section('title')
    Корзина
@endsection

@section('content')
    <div class="container bg-white d-flex flex-column pt-5 mt-5">
        <form action="{{ route('buy') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-3 p-2 bg-light-secondary inner-shadow">
                    <div class="d-flex flex-column p-2 " style="min-height: 15rem; max-height: 15rem">
                        <small class="mx-auto d-flex m-lg-0 text-secondary">Всего игр в корзине:<option id="cart_games_cont" value="{{count($products)}}">
                                {{ count($products) }}</option></small>
                        <hr class="gradient mb-0">
                        <div class="overflow-y-auto table-responsive">
                            <table class="table overflow-hidden">
                                <tbody class="">
                                    @foreach ($products as $product)
                                        <tr class="d-flex" id="info{{ $product->id }}">
                                            <th scope="row" class="col-4 d-flex p-0 py-3    ">
                                                <p class="shop_cart_title{{ $product->id }} m-auto">{{ $product->title }}
                                                </p>
                                            </th>
                                            <td class="col-4 d-flex p-0">
                                                <div class="m-auto d-flex flex-column">
                                                    <div class="m-auto">
                                                        @if ($product->discount != null)
                                                            <small style="font-size: 0.75rem"
                                                                class="p-0 text-center text-secondary text-nowrap"
                                                                style=""><s>{{ $product->price }}</s>
                                                                <span class="discount-small">
                                                                    -{{ $product->discount->discount }}%</span>
                                                            </small>
                                                        @endif
                                                        <span
                                                            class="text-center">{{ $product->price - ($product->price / 100) * ($product->discount == null ? 0 : $product->discount->discount) }}р</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col d-flex p-0">
                                                <div class="d-flex justify-content-end m-auto"><input type="number"
                                                        name="count{{ $product->id }}" value="1" min="1"
                                                        class="shop_cart_input form-input" max="9"
                                                        data-id="{{ $product->id }}"
                                                        data-discount="{{ $product->discount == null ? 0 : $product->discount->discount }}"
                                                        data-game-title="{{ $product->title }}"
                                                        data-price="{{ $product->price }}">
                                                    <a style="cursor: pointer" data-toggle="message" data-target="#1"
                                                        data-expire="2000"
                                                        data-url="{{ route('product_to_cart', $product->id) }}"
                                                        data-input-id="input{{ $product->id }}"
                                                        data-info-id="info{{ $product->id }}"
                                                        data-card-id="card{{ $product->id }}"
                                                        class="btn-green remove_produt_from_cart_btn text-decoration-none text-light text-center p-auto">X</a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <hr class="dotted">
                        <h6 class="m-0 text-center">Ваша персональная скидка:
                            @if (Auth::check() && Auth::user()->Discount)
                                {{ Auth::user()->Discount->disocunt_procent }}
                            @else
                                0
                            @endif
                            %
                        </h6>
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
                        <h6 class="finish_price mt-2" id="price">Итоговая цена:
                            {{ $price }}р</h6>
                        <div class="d-flex">
                            <input type="email" required name="email" class="form-input m-auto me-2"
                                placeholder="Email адрес"
                                value="{{ Auth::check()? Auth::user()->where('id', Auth::user()->id)->first()->email: '' }}">
                            <button type="submit" class="btn-green ms-0 m-auto m-auto">Оплатить</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg shop_carts">
                    <div class="d-flex flex-column">
                        @foreach ($products as $product)
                            <input type="hidden" name="games[]" value="{{ $product->id }}">
                            <a id="card{{ $product->id }}" href="{{ route('page_product', $product->id) }}"
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
