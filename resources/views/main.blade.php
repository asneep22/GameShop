@extends('app')

@section('page-title')
    Главная
@endsection

@section('page_descr')
    Основная страница, содержащая информацию о магазине, а также несколько товаров
@endsection

@section('content')
    <!-- Главное видео -->

    @if ($games_for_video->count() > 0)
        <div id="carouselExampleFade" class="container-fluid p-0 carousel slide carousel-fade" data-bs-ride="carousel"
            data-bs-interval="20000">

            <div class="carousel-inner text-center">

                @foreach ($games_for_video as $product)
                    <div class="carousel-item video-backround dark-backround @if ($loop->first) active @endif"
                        id="videos">
                        <div class="d-flex container position-relative p-0">
                            <video preload="auto" muted="muted" class="main_video m-auto position-relative"
                                autoplay="autoplay"
                                src="{{ URL::asset('/storage/' .$product->join('product_materials', 'product_materials.product_id', 'products.id')->select('product_materials.*')->where('product_materials.product_id', $product->id)->where('product_materials.file_path', 'LIKE', '%' . 'webm' . '%')->first()->file_path) }}">
                            </video>
                            <p class="position-absolute text-light w-100 fs-5" style="z-index:3; top:1rem;">
                                {{ $product->title }}р</p>
                            <div class="w-100 d-flex position-absolute" style="z-index:3; top:2.3rem">
                                <p class="fs-5 price m-auto">
                                    {{ $product->discount_price == 0 ? $product->price : $product->discount_price }}р</p>
                            </div>
                            <a href="{{ route('page_product', $product->id) }}"
                                class="position-absolute d-flex text-center btn-blue-outline text-decoration-none text-light">
                                <p class="m-auto">К игре</p>
                            </a>
                            <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.3; z-index:1"> </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <!-- Почему мы -->

    <div class="container-fluid bg-blue-gradient">
        <div class="container py-4 px-1">
            <div class="d-xl-flex justify-content-center">

                {{-- Низкие цены --}}
                <div class="d-lg-flex flex-column me-3 text-center" id="our_pluses">
                    <a href="#LowPrice" data-bs-toggle="modal"
                        class="d-flex our-pluses-block-md  mb-3 text-decoration-none hvr-bounce-to-top"
                        data-aos="fade-right" data-aos-anchor-placement="center-bottom">
                        <div class="px-3 text-light d-flex our-pluses-block our-pluses-border-orange">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Низкие цены</h4>
                                <p class="m-0">У нас всегда цены ниже, чем у конкурентов!</p>
                            </div>
                        </div>
                    </a>

                    <div class="modal fade text-dark" id="LowPrice" tabindex="-1" aria-labelledby="LowPriceLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="LowPriceLabel">Низкие цены</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Из-за прямого сотрудничества с издателями цены на игры ниже, чем у конкурентов!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Большой выбор --}}
                    <a href="#AssortimentModal" data-bs-toggle="modal"
                        class="our-pluses-block-md d-flex text-center text-decoration-none hvr-bounce-to-bottom mb-3"
                        data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        <div class="px-3 text-light d-flex our-pluses-block our-pluses-border-orange">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Большой выбор</h4>
                                <p class="m-0">Ассортимент постоянно пополняется новыми предложениями!</p>
                            </div>
                        </div>
                    </a>

                    <div class="modal fade text-dark" id="AssortimentModal" tabindex="-1"
                        aria-labelledby="AssortimentModalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AssortimentModalModalLabel">Большой выбор</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Наша команда имеет надежных партнеров, благодаря которым наш ассортимент постоянно
                                    обновляется и дополняется новыми предложениями
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Подарки --}}
                <div class="me-3 d-xl-flex mb-3">
                    <a href="#Gifts" data-bs-toggle="modal" class="text-decoration-none flex-colum h-100 d-lg-flex "
                        data-aos="fade-up">
                        <div class="px-3 d-flex text-light hvr-bounce-to-top text-center our-pluses-block h-100">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="">Подарки</h4>
                                <p class="">Мы предоставляем нашим покупателям подарки!</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="modal fade text-dark" id="Gifts" tabindex="-1" aria-labelledby="GiftsLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="GiftsLabel">Подарки</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Покупая игры на нашем сайте, вы автоматически получаете шанс бесплатно получить игру в конце
                                недели каждого месяца!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Постоянная скидка --}}
                <div class="d-lg-flex flex-column me-3 text-center" id="our_pluses">
                    <div class="d-xl-flex">
                        <a href="#AlwaysDiscount" data-bs-toggle="modal"
                            class="text-decoration-none d-flex our-pluses-block-md mb-3 me-xl-3 hvr-bounce-to-left"
                            data-aos="zoom-out" data-aos-anchor-placement="center-bottom">
                            <div class="px-3 text-light our-pluses-block our-pluses-border-orange d-flex">
                                <div class="m-auto" style="z-index: 2">
                                    <h4 class="mt-3">Постоянная скидка</h4>
                                    <p class="m-0">В нашем интернет-магазине каждый сможет накопить персональную скидку!
                                    </p>
                                </div>
                            </div>
                        </a>

                        <div class="modal fade text-dark" id="AlwaysDiscount" tabindex="-1"
                            aria-labelledby="AlwaysDiscountLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AlwaysDiscountLabel">Постоянная скидка</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Покупая игры на нашем сайте, вы накапливаете скидку, которая сохраняется навсегда!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-green hvr-grow"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Благотворительность --}}
                        <a href="#Support" data-bs-toggle="modal" class="text-decoration-none hvr-bounce-to-right d-flex our-pluses-block-md mb-3"
                            data-aos="fade-left" data-aos-anchor-placement="center-bottom">
                            <div
                                class="px-3 text-light our-pluses-block our-pluses-border-orange our-pluses-block-long-md d-flex">
                                <div class="m-auto" style="z-index: 2">
                                    <h4 class="mt-3">Команда поддержки</h4>
                                    <p class="m-0">Если у вас возникли какие-либо вопросы вы можете обратиться в команду поддержки</p>
                                </div>
                            </div>
                        </a>

                        <div class="modal fade text-dark" id="Support" tabindex="-1"
                            aria-labelledby="SupportLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="SupportLabel">Команда поддержки</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Наша команда поддержки с радостью поможет решить или ответить на ваши вопросы. Адрес команды поддержки: <b>teetertottersx@gmail.com</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-green hvr-grow"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade text-dark" id="AlwaysDiscount" tabindex="-1"
                            aria-labelledby="AlwaysDiscountLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AlwaysDiscountLabel">Постоянная скидка</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Покупая игры на нашем сайте, вы накапливаете скидку, которая сохраняется навсегда!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-green hvr-grow"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Высокая степень защиты данных --}}
                    <a href="#DataSecure" data-bs-toggle="modal" class="text-decoration-none d-flex text-center hvr-bounce-to-left"
                        data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        <div
                            class="px-3 text-light d-flex flex-column our-pluses-block our-pluses-border-orange our-pluses-block-long our-pluses-block-md">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Высокая степень защиты данных</h4>
                                <p class="m-0">Все данные указанные на сайте надежно хранятся и никуда не передаются!
                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="modal fade text-dark" id="DataSecure" tabindex="-1"
                    aria-labelledby="DataSecureLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DataSecureLabel">Высокая степень защиты данных</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Данные, которые хранятся на нашем сервере никогда не передаются третьим лицам.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-green hvr-grow"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container w-100 bg-white py-0 mx-auto my-0">
        <div class="rounded">
            @if ($products_red->count() > 5)
                <div class="d-flex flex-column">

                    <div class="mt-3">
                        <h2 class="text-sm-center text-lg-start" data-aos="fade-right">Выбор редакции</h2>
                        <div class="d-lg-flex text-center">
                        </div>
                    </div>
                    <hr class="gradient">
                    @if ($products_red->first())
                        <div id="RedChoose" class="carousel slide" data-bs-ride="carousel" data-aos="fade">
                            <div class="carousel-inner pb-3">
                                <div class="carousel-item active">
                                    <div class="d-lg-flex justify-content-lg-between mx-auto">
                                        <!-- Блок большой карточки -->
                                        <a href="{{ route('page_product', $products_red->first()->id) }}"
                                            data-aos="fade-right"
                                            class="big-card rounded p-0 d-flex align-items-end text-decoration-none text-light"
                                            style="background: url({{ URL::asset('/storage/' . $products_red->first()->file_path) }})">
                                            <div class="big-card-footer rounded d-flex flex-column">
                                                <div class="descr m-auto">
                                                    <h5 class="text-center mt-3">{{ $products_red->first()->title }}</h5>
                                                    <p class="text-center px-3">
                                                        {{ Str::limit($products_red->first()->description, 250, '...') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Блок двух карточек -->
                                        <div class="d-flex flex-column p-0" data-aos="fade-left">
                                            <!-- Первая карточка -->
                                            <a href="{{ route('page_product', $products_red->slice(1, 1)->first()->id) }}"
                                                class="mb-4 ms-lg-3 game-card-block d-flex rounded"
                                                style="background: url('{{ URL::asset('/storage/' . $products_red->slice(1, 1)->first()->file_path) }}')">
                                                <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute"
                                                    style="z-index: 2">
                                                    <h4 class="mt-3">{{ $products_red->slice(1, 1)->first()->title }}
                                                    </h4>
                                                    <p class="m-0">
                                                        {{ Str::limit($products_red->slice(1, 1)->first()->description, 150, '...') }}
                                                    </p>
                                                </div>
                                                <div class="dark-up"
                                                    style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                                </div>
                                            </a>
                                            <!-- Вторая карточка -->
                                            <a href="{{ route('page_product', $products_red->slice(2, 1)->first()->id) }}"
                                                class="mb-4 ms-lg-3 game-card-block d-flex rounded"
                                                style="background: url('{{ URL::asset('/storage/' . $products_red->slice(2, 1)->first()->file_path) }}')">
                                                <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute"
                                                    style="z-index: 2">
                                                    <h4 class="mt-3">{{ $products_red->slice(2, 1)->first()->title }}
                                                    </h4>
                                                    <p class="m-0">
                                                        {{ Str::limit($products_red->slice(2, 1)->first()->description, 150, '...') }}
                                                    </p>
                                                </div>
                                                <div class="dark-up"
                                                    style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="d-lg-flex justify-content-lg-between mx-auto">
                                        <!-- Блок большой карточки -->
                                        <a href="{{ route('page_product', $products_red->last()->id) }}"
                                            data-aos="fade-right" class="big-card rounded p-0 d-flex align-items-end"
                                            style="background: url({{ URL::asset('/storage/' . $products_red->last()->file_path) }})">
                                            <div class="big-card-footer rounded d-flex flex-column">
                                                <div class="descr m-auto">
                                                    <h5 class="text-center mt-3">{{ $products_red->last()->title }}</h5>
                                                    <p class="text-center px-3">
                                                        {{ Str::limit($products_red->last()->description, 250, '...') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Блок двух карточек -->
                                        <div class="d-flex flex-column p-0" data-aos="fade-left">
                                            <!-- Первая карточка -->
                                            <a href="{{ route('page_product', $products_red->slice(2, 1)->first()->id) }}"
                                                class="mb-4 ms-lg-3 game-card-block d-flex rounded"
                                                style="background: url('{{ URL::asset('/storage/' . $products_red->slice(3, 1)->first()->file_path) }}')">
                                                <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute"
                                                    style="z-index: 2">
                                                    <h4 class="mt-3">{{ $products_red->slice(3, 1)->first()->title }}
                                                    </h4>
                                                    <p class="m-0">
                                                        {{ Str::limit($products_red->slice(3, 1)->first()->description, 150, '...') }}
                                                    </p>
                                                </div>
                                                <div class="dark-up"
                                                    style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                                </div>
                                            </a>
                                            <!-- Вторая карточка -->
                                            <a href="{{ route('page_product', $products_red->slice(3, 1)->first()->id) }}"
                                                class="mb-4 ms-lg-3 game-card-block d-flex rounded"
                                                style="background: url('{{ URL::asset('/storage/' . $products_red->slice(4, 1)->first()->file_path) }}')">
                                                <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute"
                                                    style="z-index: 2">
                                                    <h4 class="mt-3">{{ $products_red->slice(4, 1)->first()->title }}
                                                    </h4>
                                                    <p class="m-0">
                                                        {{ Str::limit($products_red->slice(4, 1)->first()->description, 150, '...') }}
                                                    </p>
                                                </div>
                                                <div class="dark-up"
                                                    style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    <div data-aos="fade-right" class="m-auto">
                        <a href="{{ route('page_all_products') }}"
                            class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light hvr-grow-shadow">Больше</a>
                    </div>
                </div>
            @endif
        </div>

    </div>

    {{-- Интересное --}}
    @if ($genres->count() == 12)
        <div class="container-fluid bg-light-inner-gradient">
            <div class="container pb-5">
                <h5 class="pb-4 pt-4">Интересные жанры</h5>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach ($genres as $genre)
                        <a href="{{ route('page_all_products') }}?genres%5B%5D={{ $genre->id }}"
                            class="mb-3 mx-2 d-lg-flex blue-block hvr-sweep-to-bottom text-decoration-none">
                            <div class="text-break text-center d-flex m-auto" data-aos="fade-left"
                                data-aos-anchor-placement="center-bottom">
                                <div class="px-3 text-light  our-pluses-border-orange">
                                    <div class="d-flex flex-column m-auto" style="z-index: 2">
                                        @if ($genre->file_path != null)
                                            <img class="text-whit mx-auto mb-2"
                                                src="{{ URL::asset('/storage/' . $genre->file_path) }}"
                                                style="width: 2.5rem; height: 2.5rem;">
                                        @endif
                                        <h4 class="fs-6">{{ $genre->pname }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($products->count() > 0)
        <div class="container mainend bg-white">
            <div class="rounded">
                <div class="d-flex flex-column">
                    <div class="mt-3 d-flex text-black tcs">
                        <h2 class="text-sm-center text-lg-start" data-aos="fade-right">Все предложения</h2>
                        <div class="d-lg-flex text-center my-auto me-0 mx-auto text-black tcs p-1" data-aos="fade-left">
                            <a href="{{ route('page_all_products') }}?new=on"
                                class="text-decoration-none text-black tcs p-1 hvr-bounce-in">Новинки</a>
                            <a href="{{ route('page_all_products') }}?popular=on"
                                class="px-4 text-decoration-none text-black tcs p-1 hvr-bounce-in">Популярное</a>
                            <a href="{{ route('page_all_products') }}?discount=on"
                                class="text-decoration-none text-black tcs p-1 hvr-bounce-in">Скидки</a>
                        </div>
                        <div class="d-lg-flex text-center">
                        </div>
                    </div>
                    <hr class="gradient">
                    <div class="d-flex flex-wrap justify-content-between">
                        @foreach ($products as $item)
                            <div
                                class="mb-4 d-flex flex-column game-card-all-products rounded hvr-underline-from-right underline-blue">
                                <a href="{{ route('page_product', $item->id) }}"
                                    class="card-body-my text-decoration-none text-dark">
                                    <div class="img-all-products"
                                        style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                                    </div>
                                    <div class="text-break d-flex flex-column">
                                        <h4 class="ps-3 position-relative w-100" style="min-height: 3rem">
                                            {{ Str::limit($item->title, 15, '...') }}
                                            @if ($item->discount != null)
                                                <span class="discount-medium my-auto text-center d-flex fw-bold">
                                                    <span class="m-auto">
                                                        -{{ $item->discount->discount }}%<br />
                                                        <small>До {{ $item->discount->date_end->format('d.m.Y') }}</small>
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
                                        @if ($item->keys->count() > 0)
                                            <a class="btn-blue text-light text-decoration-none hvr-float product_add_to_shop_cart_button  position-relative"
                                                data-toggle="message" data-target="#1" data-expire="2000"
                                                data-path="to-cart-btn-{{ $item->id }}"
                                                data-out-card-path="to-cart-out-btn-{{ $item->id }}"
                                                data-url={{ route('product_to_cart', $item->id) }}
                                                data-auth={{ Auth::check() }}>
                                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-cart4"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        style="{{ Auth::check() ? ($product_users->where('product_id', $item->id)->first() ? 'display:none' : '') : (Session::get('shopping_cart_products') ? (in_array($item->id, Session::get('shopping_cart_products')) ? 'display:none' : '') : '') }}"
                                                        id="to-cart-btn-{{ $item->id }}"
                                                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
                                                    <path
                                                        style="{{ Auth::check() ? ($product_users->where('product_id', $item->id)->first() ? '' : 'display:none') : (Session::get('shopping_cart_products') ? (in_array($item->id, Session::get('shopping_cart_products')) ? '' : 'display:none') : 'display:none') }}"
                                                        id="to-cart-out-btn-{{ $item->id }}"
                                                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z" />
                                                </svg>
                                            </a>
                                        @endif
                                        {{-- На страницу товара --}}
                                        <div class="d-flex">
                                            <a href="{{ route('page_product', $item->id) }}"
                                                class="btn-blue text-decoration-none text-light hvr-float"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-box-arrow-up-right"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                                </svg></a>
                                            @if ($item->keys->count() == 0)
                                                <p class="m-auto ms-2 text-secondary">Нет в наличии</p>
                                            @endif
                                        </div>
                                        <h5 class="me-3 m-auto">
                                            {{ $item->discount_price == 0 ? $item->price : $item->discount_price }}р
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div data-aos="fade-right" class="m-auto">
                        <a href="{{ route('page_all_products') }}"
                            class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light hvr-grow-shadow">Больше</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
