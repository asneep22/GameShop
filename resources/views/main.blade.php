@extends('app')

@section('page-title')
Главная
@endsection

@section('content')
    <!-- Главное видео -->
    <div class="container py-0 m-0 mt-5 video-container w-100 m-auto">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <video preload="auto" muted="muted" class="mx-auto main_video" autoplay="autoplay">
                        <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                    </video>
                </div>
                <div class="carousel-item">
                    <video preload="auto" muted="muted" class="mx-auto main_video" loop="l" autoplay="autoplay">
                        <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm>
                        <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg>
                        <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
                        <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp>
                    </video>
                </div>
                <div class="carousel-item">
                    <video preload="auto" muted="muted" class="mx-auto main_video" autoplay="autoplay">
                        <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                    </video>
                </div>
            </div>
        </div>

        <!-- Почему мы -->

        <div class="text-black opacity: 0;">
            <div class="d-flex flex-column">

                <div class="d-lg-flex flex-wrap w-100 mt-5 text-center justify-content-between">
                    <div class="mb-4 our-pluses our-pluses-first d-flex rounded" style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
                        <div class="px-3 text-light m-auto">
                            <h4 class="mt-3">Низкие цены</h4>
                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Reprehenderit
                                architecto iure
                                magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        </div>
                        <div class="dark-up"></div>
                    </div>

                    <div class="mb-4 mx-lg-2 our-pluses our-pluses-first d-flex rounded text-center" style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
                        <div class="px-3 text-light m-auto">
                            <h4 class="mt-3">Большой выбор товаров</h4>
                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Reprehenderit
                                architecto iure
                                magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        </div>
                        <div class="dark-up"></div>
                    </div>

                    <div class="mb-4 our-pluses our-pluses-last d-flex rounded text-center" style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
                        <div class="px-3 text-light m-auto">
                            <h4 class="mt-3">Подарки</h4>
                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Reprehenderit
                                architecto iure
                                magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        </div>
                        <div class="dark-up"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded">
            @if ($products_red->count() > 5)
            <div class="d-flex flex-column">

                <div class="mt-3">
                    <h2 class="text-sm-center text-lg-start">Выбор редакции</h2>
                    <div class="d-lg-flex text-center">
                    </div>
                </div>
                <hr class="gradient">
                @if ($products_red->first())
                <div id="RedChoose" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner pb-3">
                        <div class="carousel-item active">
                            <div class="d-lg-flex justify-content-lg-between mx-auto">
                                <!-- Блок большой карточки -->
                                <a href="{{ route('page_product', $products_red->first()->id) }}" class="big-card rounded p-0 d-flex align-items-end text-decoration-none text-light" style="background: url({{ URL::asset('/storage/' . $products_red->first()->file_path) }})">
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
                                <div class="d-flex flex-column p-0">
                                    <!-- Первая карточка -->
                                    <a href="{{ route('page_product', $products_red->slice(1, 1)->first()->id) }}" class="mb-4 ms-lg-3 game-card-block d-flex rounded" style="background: url('{{ URL::asset('/storage/' . $products_red->slice(1, 1)->first()->file_path) }}')">
                                        <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute" style="z-index: 2">
                                            <h4 class="mt-3">{{ $products_red->slice(1, 1)->first()->title }}
                                            </h4>
                                            <p class="m-0">
                                                {{ Str::limit($products_red->slice(1, 1)->first()->description, 150, '...') }}
                                            </p>
                                        </div>
                                        <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1"></div>
                                    </a>
                                    <!-- Вторая карточка -->
                                    <a href="{{ route('page_product', $products_red->slice(2, 1)->first()->id) }}" class="mb-4 ms-lg-3 game-card-block d-flex rounded" style="background: url('{{ URL::asset('/storage/' . $products_red->slice(2, 1)->first()->file_path) }}')">
                                        <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute" style="z-index: 2">
                                            <h4 class="mt-3">{{ $products_red->slice(2, 1)->first()->title }}
                                            </h4>
                                            <p class="m-0">
                                                {{ Str::limit($products_red->slice(2, 1)->first()->description, 150, '...') }}
                                            </p>
                                        </div>
                                        <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1"></div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="d-lg-flex justify-content-lg-between mx-auto">
                                <!-- Блок большой карточки -->
                                <a href="{{ route('page_product', $products_red->last()->id) }}" class="big-card rounded p-0 d-flex align-items-end" style="background: url({{ URL::asset('/storage/' . $products_red->last()->file_path) }})">
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
                                <div class="d-flex flex-column p-0">
                                    <!-- Первая карточка -->
                                    <a href="{{ route('page_product', $products_red->slice(2, 1)->first()->id) }}" class="mb-4 ms-lg-3 game-card-block d-flex rounded" style="background: url('{{ URL::asset('/storage/' . $products_red->slice(3, 1)->first()->file_path) }}')">
                                        <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute" style="z-index: 2">
                                            <h4 class="mt-3">{{ $products_red->slice(3, 1)->first()->title }}
                                            </h4>
                                            <p class="m-0">
                                                {{ Str::limit($products_red->slice(3, 1)->first()->description, 150, '...') }}
                                            </p>
                                        </div>
                                        <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                        </div>
                                    </a>
                                    <!-- Вторая карточка -->
                                    <a href="{{ route('page_product', $products_red->slice(3, 1)->first()->id) }}" class="mb-4 ms-lg-3 game-card-block d-flex rounded" style="background: url('{{ URL::asset('/storage/' . $products_red->slice(4, 1)->first()->file_path) }}')">
                                        <div class="px-3 text-center bottom-0 w-100  text-light m-auto position-absolute" style="z-index: 2">
                                            <h4 class="mt-3">{{ $products_red->slice(4, 1)->first()->title }}
                                            </h4>
                                            <p class="m-0">
                                                {{ Str::limit($products_red->slice(4, 1)->first()->description, 150, '...') }}
                                            </p>
                                        </div>
                                        <div class="dark-up" style="min-height: 100%; max-height: 100%; opacity:.5; z-index:1">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
                <a href="{{ route('page_all_products') }}" class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light">Больше</a>
            </div>
            @endif
        </div>

        <div class="rounded">
            <div class="d-flex flex-column">

                <div class="mt-3 d-flex">
                    <h2 class="text-sm-center text-lg-start">Все предложения</h2>
                    <div class="d-lg-flex text-center my-auto me-0 mx-auto">
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
                    <div class="mb-4 d-flex flex-column game-card pb-0 rounded">
                        <a href="{{ route('page_product', $item->id) }}" class="card-body-my text-decoration-none text-dark">
                            <div class="img" style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                            </div>
                            <div class="px-3 text-break d-flex flex-column">
                                <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                                <p class="text-justify">{{ Str::limit($item->description, 200, '...') }}</p>
                            </div>
                        </a>
                        <div class=" mb-0 my-auto p-0">
                            <hr class="dotted mb-0">
                            <div class="btn-group mb-0 d-flex">
                                <a href="{{ route('add_product_to_cart', $item->id) }}" class="btn-green text-decoration-none btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                    </svg></a>
                                <a href="{{ route('page_product', $item->id) }}" class="btn-green text-decoration-none text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                    </svg></a>
                                <h5 class="me-3 m-auto">{{ $item->price }}р</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('page_all_products') }}" class="btn-green mt-1 p-2 px-5 mb-4 m-auto text-decoration-none text-light">Больше</a>
            </div>
        </div>
    </div>
@endsection