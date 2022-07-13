@extends('app')

@section('page-title')
    Главная
@endsection

@section('content')
    <!-- Главное видео -->
    <div class="container py-0 w-100 mx-auto video-container img-bgl" id="videos">
        <div id="carouselExampleFade" class="carousel slide carousel-fade py-0 m-0 w-100" data-bs-ride="carousel">
            <div class="carousel-inner text-center py-0  w-100" data-aos="zoom-in-down" data-aos-anchor="#videos">
                <div class="carousel-item active">
                    <div class="d-flex">
                        <video preload="auto" muted="muted" class="main_video" autoplay="autoplay">
                            <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                        </video>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <video preload="auto" muted="muted" class="main_video" loop="l" autoplay="autoplay">
                            <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm>
                            <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg>
                            <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
                            <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp>
                        </video>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <video preload="auto" muted="muted" class="main_video" autoplay="autoplay">
                            <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Почему мы -->

    <div class="container-fluid bg-blue-gradient">
        <div class="container py-4 px-1">
            <div class="d-xl-flex justify-content-center">

                <div class="d-lg-flex flex-column me-3 text-center" id="our_pluses">
                    <a href="" class="d-flex our-pluses-block-md  mb-3 text-decoration-none hvr-bounce-to-top"
                        data-aos="fade-right" data-aos-anchor-placement="center-bottom">
                        <div class="px-3 text-light d-flex our-pluses-block our-pluses-border-orange">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Низкие цены</h4>
                                <p class="m-0">У нас всегда цены ниже, чем у конкурентов!</p>
                            </div>
                        </div>
                    </a>

                    <a href class="our-pluses-block-md d-flex text-center text-decoration-none hvr-bounce-to-bottom mb-3"
                        data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        <div class="px-3 text-light d-flex our-pluses-block our-pluses-border-orange">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Большой выбор</h4>
                                <p class="m-0">Ассортимент постоянно пополняется новыми прелдожениями!</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="me-3 d-lg-flex mb-3">
                    <a href="" class="text-decoration-none flex-colum h-100 d-lg-flex " data-aos="fade-up">
                        <div
                            class="px-3 d-flex text-light hvr-bounce-to-top text-center our-pluses-block our-pluses-block-md h-100">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="">Подарки</h4>
                                <p class="">Мы предоставляем нашим покупателям подарки!</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="d-lg-flex flex-column me-3 text-center" id="our_pluses">
                    <div class="d-xl-flex">
                        <a href=""
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

                        <a href="" class="text-decoration-none hvr-bounce-to-right d-flex our-pluses-block-md mb-3"
                            data-aos="fade-left" data-aos-anchor-placement="center-bottom">
                            <div
                                class="px-3 text-light our-pluses-block our-pluses-border-orange our-pluses-block-long-md d-flex">
                                <div class="m-auto" style="z-index: 2">
                                    <h4 class="mt-3">Низкие цены</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit
                                        architecto iure</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <a href="#" class="text-decoration-none d-flex text-center hvr-bounce-to-left" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                        <div
                            class="px-3 text-light d-flex flex-column our-pluses-block our-pluses-border-orange our-pluses-block-long our-pluses-block-md">
                            <div class="m-auto" style="z-index: 2">
                                <h4 class="mt-3">Купоны</h4>
                                <p class="m-0">В дополнению к низким ценам Вы можете получить купон, дарующий скидку!</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
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
                    <a href="{{ route('page_all_products') }}"
                        class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light">Больше</a>
                </div>
            @endif
        </div>

    </div>

    {{-- Интересное --}}
    @if ($genres->count() == 5)
        <div class="container-fluid bg-light-inner-gradient">
            <div class="container pb-5">
                <h5 class="pb-4 pt-4">Интересные жанры</h5>
                <div class="d-xl-flex justify-content-between">
                    @foreach ($genres as $genre)
                        <div class="hvr-float w-100 mb-3 {{!$loop->last ? 'me-3':' '}}">
                            <a href=""
                                class="text-decoration-none text-break text-center d-flex blue-block hvr-sweep-to-bottom"
                                data-aos="fade-left" data-aos-anchor-placement="center-bottom">
                                <div class="px-3 text-light m-auto  our-pluses-border-orange d-flex">
                                    <div class="m-auto" style="z-index: 2">
                                        <h4 class="">{{ $genre->pname }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="rounded">
            <div class="d-flex flex-column">

                <div class="mt-3 d-flex">
                    <h2 class="text-sm-center text-lg-start" data-aos="fade-right">Все предложения</h2>
                    <div class="d-lg-flex text-center my-auto me-0 mx-auto" data-aos="fade-left">
                        <!-- Light them -->
                        <a href="#" class="text-decoration-none text-black">Новинки</a>
                        <a href="#" class="px-4 text-decoration-none text-black ">Популярное</a>
                        <a href="#" class="text-decoration-none text-black">Часто покупаемые</a>
                        <!-- Dark Theme -->
                        {{-- <a href="#" class="text-decoration-none text-white">Новинки</a>
                    <a href="#" class="px-4 text-decoration-none text-white ">Популярное</a>
                    <a href="#" class="text-decoration-none text-white">Часто покупаемые</a> --}}
                    </div>
                    <div class="d-lg-flex text-center">
                    </div>
                </div>
                <hr class="gradient">
                <div class="d-flex flex-wrap justify-content-between">
                    @foreach ($products as $item)
                        <div class="mb-4 d-flex flex-column game-card pb-0 rounded" data-aos="fade-up">
                            <a href="{{ route('page_product', $item->id) }}"
                                class="card-body-my text-decoration-none text-dark">
                                <div class="img"
                                    style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                                </div>
                                <div class="px-3 text-break d-flex flex-column">
                                    <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                                    <p class="text-justify">{{ Str::limit($item->description, 200, '...') }}</p>
                                </div>
                            </a>
                            <div class=" mb-0 my-auto p-0">
                                <hr class="dotted mb-0">
                                <div class="btn-group mb-0 d-flex">
                                    <a href="{{ route('add_product_to_cart', $item->id) }}"
                                        class="btn-green text-decoration-none btn-light"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg></a>
                                    <a href="{{ route('page_product', $item->id) }}"
                                        class="btn-green text-decoration-none text-light"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                        </svg></a>
                                    <h5 class="me-3 m-auto">{{ $item->price }}р</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('page_all_products') }}"
                    class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light">Больше</a>
            </div>
        </div>
    </div>
@endsection
