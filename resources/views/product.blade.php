@extends('app')
@section('content')
    <div class="container-fluid mt-5 pt-1 px-0">
        <div class="container py-5 bg-white d-flex flex-column">
            <div class="d-flex flex-column flex-lg-row">
                <div class="position-relative m-lg-0" style="min-width: 70%; max-width:70%">
                    @if ($product->discount != null)
                        <span class="discount-medium text-center d-flex fw-bold" style="right: .7rem; top: 0rem; z-index:5">
                            <span class="m-auto">
                                -{{ $product->discount->discount }}%<br />
                                <small>До {{ $product->discount->date_end->format('d.m.Y') }}</small>
                            </span>
                        </span>
                    @endif
                    <div id="carouselExampleCaptions" class="carousel slide outer-shadow-1" data-bs-interval="99999"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="visually-hidden">{{ $i = 0 }}</div>
                            {{-- Делаем видео первыми в слайдере --}}
                            @foreach ($materials as $key => $material)
                                @if (pathinfo($material->file_path, PATHINFO_EXTENSION) != 'jpg')
                                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                        <div class="visually-hidden">{{ $i++ }}</div>
                                        <video preload="auto" controls class="mx-auto my-0 w-100 py-0" loop="l">
                                            <source class="w-100 h-100"
                                                src='{{ URL::asset('/storage/' . $material->file_path) }}' type=video/mp4>
                                        </video>
                                    </div>
                                @endif
                            @endforeach

                            {{-- После всех видео вставляем изображения --}}
                            @foreach ($materials as $key => $material)
                                @if (pathinfo($material->file_path, PATHINFO_EXTENSION) == 'jpg')
                                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                        <div class="visually-hidden">{{ $i++ }}</div>
                                        <img src="{{ URL::asset('/storage/' . $material->file_path) }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-1 d-flex overflow-hidden">
                        <div class="visually-hidden">{{ $i = 0 }}</div>
                        {{-- Делаем видео первыми в кнопках слайдера --}}
                        @foreach ($materials as $key => $material)
                            @if (pathinfo($material->file_path, PATHINFO_EXTENSION) != 'jpg')
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $i }}"
                                    class="active overflow-hidden product-img-btn p-0 me-2" aria-current="true"
                                    aria-label="Slide {{ $i }}" id="yourDiv">

                                    <video class="h-100" preload="auto" class="">
                                        <source class="" src="{{ URL::asset('/storage/' . $material->file_path) }}">
                                    </video>

                                </button>
                                <div class="visually-hidden">{{ $i++ }}</div>
                            @endif
                        @endforeach

                        {{-- После всех видео вставляем изображения в кнопки слайдера --}}
                        @foreach ($materials as $key => $material)
                            @if (pathinfo($material->file_path, PATHINFO_EXTENSION) == 'jpg')
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $i }}" class="active product-img-btn p-0 me-2 "
                                    aria-current="true" aria-label="Slide {{ $i }}">
                                    <img src='{{ URL::asset('/storage/' . $material->file_path) }}' class="w-100 h-100 ">
                                </button>
                                <div class="visually-hidden">{{ $i++ }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="p-4 d-flex bg-light-secondary-2 outer-shadow-light-1 ms-lg-2 mt-lg-0 rounded"
                    style="min-width:25rem">
                    <div class="mb-3 text-white d-flex flex-column w-100">
                        <div class="d-flex justify-content-between">
                            <h5 class="me-3"> {{ $product->title }}</h5>
                            <span class="fs-5">
                                {{ $product->discount_price == 0 ? $product->price : $product->discount_price }}р</span>
                        </div>
                        <p class="text-break">{{ $product->description }}</p>
                        <hr>
                        <h5 class="">Системные требования</h5>

                        <div class="">
                            <div>
                                Операционные системы:
                                <span class="text-gray-light">
                                    @foreach ($product->oses as $os)
                                        {{ !$loop->last ? $os->pname . ', ' : $os->pname }}
                                    @endforeach
                                </span>
                                <hr class="my-2">
                            </div>
                            <div>
                                Процессор:
                                <span class="text-gray-light">{{ $product->cpu->pname }}</span>
                                <hr class="my-2">
                            </div>
                            <div>
                                Оперативная память: <span class="text-gray-light"> {{ $product->desc_ram }} </span>
                                <hr class="my-2">
                            </div>
                            <div>
                                Видеокарта:
                                <span class="text-gray-light">{{ $product->videocard->pname }}</span>
                                <hr class="my-2">
                            </div>
                            <div>
                                Место на жестком диске
                                <span class="text-gray-light">{{ $product->desc_memory }}</span>
                                <hr class="my-2">
                            </div>
                            <div>
                                Жанры:
                                <span class="text-gray-light">
                                    @foreach ($product->genres as $genre)
                                        {{ !$loop->last ? $genre->pname . ', ' : $genre->pname }}
                                    @endforeach
                                </span>
                                <hr class="my-2">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-0 m-auto w-100">
                            <p class="my-auto">Дата выхода: {{ $product->publishing_date->format('d.m.Y') }}</p>
                            <a class="me-0 m-auto text-decoration-none text-light px-3 py-2 btn-orange hvr-grow product_add_to_shop_cart_button btn_product_buy"
                                style="cursor: pointer" data-new-text="Игра уже в корзине" data-toggle="message"
                                data-target="#1" data-expire="2000" data-url={{ route('product_to_cart', $product->id) }}
                                data-auth={{ Auth::check() }}>{{ !$product_is_on_shopping_cart ? 'В корзину' : 'Игра уже в корзине' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($dlcs->count() > 0)
        <div class="container-fluid bg-light-inner-gradient">
            <div class="container py-3" style="z-index: 5" id="dlcs_block">
                {{-- Дополнения --}}
                <div class="d-flex flex-column text-center">
                    <h5>Дополнения к этой игре</h5>
                    <div class="d-lg-flex justify-content-center flex-wrap">
                        @foreach ($dlcs as $dlc)
                            <a href="{{ route('page_product', $dlc->id) }}"
                                class="@if ($loop->last) ms-3 @endif @if (!$loop->last) me-3 @endif">
                                <div class="mb-4 similar-game-card d-flex rounded"
                                    style="background: url({{ URL::asset('/storage/' . $dlc->file_path) }})">
                                    <h4 style="z-index: 2"
                                        class="mt-3 text-center text-light w-100 position-absolute bottom-0 start-0">
                                        {{ $dlc->title }}</h4>
                                    <div class="dark-up" style="min-height: 35%; max-height: 50%; opacity:.65; z-index:1">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($similar_games->count() > 0)
        <div class="container-fluid dark-backround py-3 bg-white" style="z-index: 5" id="similar_block">
            {{-- Похожие товары --}}
            <div class="d-flex flex-column text-center">
                <h5 class="text-light">Похожие игры</h5>
                <div class="d-lg-flex justify-content-center flex-wrap">
                    @foreach ($similar_games as $game)
                        <a href="{{ route('page_product', $game->id) }}"
                            class="@if ($loop->last) ms-3 @endif @if (!$loop->last) me-3 @endif">
                            <div class="mb-4 similar-game-card d-flex rounded"
                                style="background: url({{ URL::asset('/storage/' . $game->file_path) }})">
                                <h4 style="z-index: 2"
                                    class="mt-3 text-center text-light w-100 position-absolute bottom-0 start-0">
                                    {{ $game->title }}</h4>
                                <div class="dark-up" style="min-height: 35%; max-height: 50%; opacity:.65; z-index:1">
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    @endif
    </div>
@endsection
