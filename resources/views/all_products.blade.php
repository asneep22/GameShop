@extends('app')

@section('content')
    <div class="container pt-3 bg-white h-100 min-vh-100 d-flex flex-column px-2">
        <div class="d-lg-flex">
            {{-- Боковая панель --}}
            <div class="me-xl-3  px-2 d-flex flex-column bg-light-secondary inner-shadow"
                style="min-width: 20rem; max-width:20rem" data-aos="fade-right">
                <form action="" class="d-flex flex-column py-3 m-lg-0 m-auto">
                    <div class="form-group mx-auto d-flex flex-column">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex flex-column">
                                <small class=" text-secondary">Всего найдено игр: {{ $products->count() }}</small>
                                <label for="title" class="mb-0 my-auto mt-2">Название</label>
                            </div>
                            <form action="">
                                <a href="{{ route('page_all_products') }}" class="text-decoration-none text-gray"><small>X
                                        Сбросить
                                        фильтры</small></a>
                            </form>

                        </div>
                        <input type="text" class="form-input mb-3 w-100" name="title" id="title"
                            value="{{ Request::query('title') }}" placeholder="Название игры">

                        <div class="keys">
                            <label for="genres">Жанры</label>
                            <select class="form-control js-select2 w-100" name="genres[]" id="genres" data-tags="false"
                                multiple="multiple" data-placeholder="Выберите жанры для поиска">
                                @foreach ($genres as $key => $genre)
                                    <option
                                        {{ isset($_GET['genres']) ? (in_array($genre->id, $_GET['genres']) ? 'selected' : '') : '' }}
                                        value="{{ $genre->id }}">{{ $genre->pname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="keys">
                            <label for="oses" class="mt-3">Платформы</label>
                            <select class="form-control js-select2 w-100" name="oses[]" id="oses" data-tags="false"
                                multiple="multiple" data-placeholder="Выберите платформы для поиска">
                                @foreach ($oses as $key => $os)
                                    <option
                                        {{ isset($_GET['oses']) ? (in_array($os->id, $_GET['oses']) ? 'selected' : '') : '' }}
                                        value="{{ $os->id }}">{{ $os->pname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-3 m-auto">
                            <div class="d-flex flex-column me-1">
                                <label for="price_min" class="">цена мин. руб.</label>
                                <input type="number" step="0.01" class="form-input mb-3" name="price_min" id="price_min"
                                    value="{{ Request::query('price_min') }}" placeholder="0">
                            </div>
                            <div class="d-flex flex-column ms-1">
                                <label for="price_max" class="">цена макс. руб.</label>
                                <input type="number" step="0.01" class="form-input mb-3" name="price_max" id="price_max"
                                    value="{{ Request::query('price_max') }}" placeholder="99999">
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-3">

                            <div class="d-flex mb-3">
                                <input type="checkbox" name="new" id="new" class="form-check-input mt-0 mx-1 p-2"
                                    {{ Request::query('new') ? 'checked' : '' }}>
                                <label class="form-check-label my-auto" for="new">
                                    Новинки
                                </label>
                            </div>

                            <div class="d-flex mb-3">
                                <input type="checkbox" name="popular" id="popular" class="form-check-input mt-0 mx-1 p-2">
                                <label class="form-check-label my-auto" for="popular">
                                    Популярное
                                </label>
                            </div>

                            <div class="d-flex mb-3">
                                <input type="checkbox" name="discount" id="discount" class="form-check-input mt-0 mx-1 p-2"
                                    {{ Request::query('discount') ? 'checked' : '' }}>
                                <label class="form-check-label my-auto" for="discount">
                                    Скидки
                                </label>
                            </div>


                            <div class="d-flex">
                                <input type="checkbox" name="redChoose" id="redChoose"
                                    class="form-check-input mt-0 mx-1 p-2"
                                    {{ Request::query('redChoose') ? 'checked' : '' }}>
                                <label class="form-check-label my-auto" for="redChoose">
                                    Выбор редакции
                                </label>
                            </div>


                        </div>
                        <button type="submit" class="btn-green me-0 m-auto hvr-grow-shadow">Поиск</button>
                    </div>
                </form>

                <hr class="dotted">
                <p class="fs-6 px-2"> Ваша персональная скидка: @if (!Auth::check())
                        0%
                    @elseif($discounts->where('id', Auth::user()->personal_discount_id)->first() == null)
                        0%
                    @else
                        {{ $discounts->where('id', Auth::user()->personal_discount_id)->first()->disocunt_procent }}%
                    @endif
                </p>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Общая сумма покупок, руб</th>
                            <th>Скидка, %</th>
                        </tr>
                        @foreach ($discounts as $discount)
                            <tr>
                                <td>{{ $discount->sum_buy }}</td>
                                <td>{{ $discount->disocunt_procent }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="d-flex flex-column">
                {{-- Выгодное предложение --}}
                @if ($discount_products->count() > 0)
                    <div id="RedChoose" class="carousel slide mb-3" data-bs-ride="carousel" data-aos="fade-down">
                        <div class="carousel-inner hvr-underline-from-right underline-red">
                            <div class="carousel-item active">
                                <a href="{{ route('page_product', $discount_products->first()->id) }}"
                                    class="text-decoration-none d-xl-flex rounded mt-3 profitable-card"
                                    style="background-color: #FFF">
                                    <div class="profitable-card-image rounded"
                                        style="background: url({{ URL::asset('/storage/' . $discount_products->first()->file_path) }})">
                                    </div>
                                    <div class=" text-dark ps-3 d-flex flex-column">
                                        <h4 class="mt-3 pe-3">{{ $discount_products->first()->title }}</h4>
                                        <p class="m-0 text-break">
                                            {{ Str::limit($discount_products->first()->description, 200, '...') }}</p>
                                        <div class="d-flex flex-column mb-0 my-auto">
                                            <hr class="dotted m-0 p-0">
                                            <div class="d-flex flex-column flex-nowrap text-center position-relative">
                                                <small><s>{{ $discount_products->first()->price }}р</s></small>
                                                <h3 class=" ">
                                                    {{ $discount_products->first()->price - ($discount_products->first()->price / 100) * $discount_products->first()->discount }}р
                                                </h3>
                                                <span class="discount-medium my-auto text-center d-flex fw-bold">
                                                    <span class="m-auto">
                                                        -{{ $discount_products->first()->discount }}%
                                                    </span>
                                                </span>
                                                <hr class="dotted m-0 p-0">
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            @foreach ($discount_products as $product)
                                @if (!$loop->first)
                                    <div class="carousel-item">
                                        <a href="{{ route('page_product', $discount_products->first()->id) }}"
                                            class="text-decoration-none d-xxl-flex rounded mt-3 profitable-card"
                                            style="background-color: #FFF">
                                            <div class="profitable-card-image rounded"
                                                style="background: url({{ URL::asset('/storage/' . $product->file_path) }})">
                                            </div>
                                            <div class=" text-dark ps-3 d-flex flex-column">
                                                <h4 class="mt-3 pe-3">{{ $product->title }}</h4>
                                                <p class="m-0">
                                                    {{ Str::limit($product->description, 200, '...') }}
                                                </p>
                                                <div class="d-flex flex-column mb-0 my-auto">
                                                    <hr class="dotted m-0 p-0">
                                                    <div
                                                        class="d-flex flex-column mb-0 my-auto flex-nowrap text-center position-relative">
                                                        <small><s>{{ $product->price }}р</s></small>
                                                        <h3 class=" ">
                                                            {{ $product->price - ($product->price / 100) * $product->discount }}р
                                                        </h3>
                                                        <span class="discount-medium my-auto text-center d-flex fw-bold">
                                                            <span class="m-auto">
                                                                -{{ $product->discount }}%
                                                            </span>
                                                        </span>
                                                        <hr class="dotted m-0 p-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- Все продукты --}}
                <div class="d-flex flex-wrap justify-content-between all-page">

                    @foreach ($products as $item)
                        <div class="mb-4 d-flex flex-column game-card-all-products rounded hvr-underline-from-right underline-blue"
                            >
                            <a href="{{ route('page_product', $item->id) }}"
                                class="card-body-my text-decoration-none text-dark">
                                <div class="img-all-products"
                                    style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                                </div>
                                <div class="text-break d-flex flex-column">
                                    <h4 class="ps-3 position-relative w-100" style="min-height: 3rem">
                                        {{ Str::limit($item->title, 15, '...') }}
                                        @if ($item->discount != 0)
                                            <span class="discount-medium my-auto text-center d-flex fw-bold">
                                                <span class="m-auto">
                                                    -{{ $item->discount }}%
                                                </span>
                                            </span>
                                        @endif
                                    </h4>
                                    <p class="text-justify px-3">{{ Str::limit($item->description, 200, '...') }}</p>
                                </div>
                            </a>
                            <div class="mb-0 my-auto p-0 ">
                                <hr class="dotted mb-0">
                                <div class="btn-group mb-0 d-flex">

                                    {{-- В корзину --}}
                                    <a href="{{ route('add_product_to_cart', $item->id) }}"
                                        class="btn-blue text-light text-decoration-none hvr-float"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg></a>
                                    {{-- На страницу товара --}}
                                    <a href="{{ route('page_product', $item->id) }}"
                                        class="btn-blue text-decoration-none text-light hvr-float"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                        </svg></a>
                                    <h5 class="me-3 m-auto">{{ $item->price - ($item->price / 100) * $item->discount }}р
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class=""> {{ $products->withQueryString()->links() }}</div>
            </div>
        </div>
    </div>

    </div>

    </div>
@endsection
