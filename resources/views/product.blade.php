@extends('app')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row py-3">
            <div class="col-lg-6">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-interval="99999" data-bs-ride="carousel">
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
                                    <img src="{{ URL::asset('/storage/' . $material->file_path) }}" class="d-block w-100"
                                        alt="...">
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

            {{-- Основной блок с названием и описанием --}}
            <div class="col-lg-6 d-flex flex-column ps-lg-5">
                <h2 class="text-center mb-3 mt-0 m-auto">{{ $product->title }}</h2>
                <p class="text-break">{{ $product->description }}</p>
                <div class="mb-0 my-auto">
                    <hr class="dotted">
                    <div class="d-flex">
                        <p class="fs-4 my-auto">Цена: {{ $product->price }}р</p>
                        <div class="btn-group me-0 m-auto">
                            @if (!$product_is_on_shopping_cart)
                                <a href="{{ route('add_product_to_cart', $product->id) }}"
                                    class="btn-green-buy text-decoration-none text-light">Купить</a>
                            @else
                                <a href="{{ route('page_shopping_cart') }}"
                                    class="btn-green-buy text-decoration-none text-light">Игра уже в корзине</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr class="dotted mb-0">

        </div>
    </div>


    {{-- Системные требования и дополнительная информация --}}
    <div class="container-fluid d-flex bg-light-inner-gradient my-3 py-3">
        <div class="container row m-auto">
            <div class="col-lg-6 mb-3" data-aos="fade-right">
                <h5 class="mb-4">Системные требования</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td scope="row" class="p-0">Операционные системы</td>
                                <td>
                                    @foreach ($product->oses as $os)
                                        {{ !$loop->last ? $os->pname . ', ' : $os->pname }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="p-0">Процессор</td>
                                <td>{{ $product->cpu->pname }}</td>

                            </tr>
                            <tr>
                                <td scope="row" class="p-0">Оперативная память</td>
                                <td colspan="2">{{ $product->desc_ram }}</td>
                            </tr>
                            <tr>
                                <td scope="row" class="p-0">Видеокарта</td>
                                <td colspan="2">{{ $product->videocard->pname }}</td>
                            </tr>
                            <tr>
                                <td scope="row" class="p-0">Место на жестком диске</td>
                                <td colspan="2">{{ $product->desc_memory }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 px-lg-5 mb-3" data-aos="fade-left">
                <h5 class="mb-4">Дополнительная информация</h5>
                <p>Жанры:
                    @foreach ($product->genres as $genre)
                        {{ !$loop->last ? $genre->pname . ', ' : $genre->pname }}
                    @endforeach
                </p>
                <p>Дата выхода: {{ $product->publishing_date->format('d.m.Y') }}</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In, possimus sunt. Id, quas necessitatibus
                    tempora exercitationem praesentium expedita aliquam, iste amet, voluptates error repudiandae fugit
                    debitis labore reprehenderit perspiciatis voluptatibus.</p>
            </div>
        </div>
    </div>

    </div>

    <div class="container">
        {{-- Похожие товары --}}
        <div class="d-flex flex-column">
            <h5 data-aos="fade-right">Похожие игры</h5>
            <div class="d-lg-flex justify-content-between flex-wrap">
                @foreach ($similar_games as $game)
                    <a href="{{ route('page_product', $game->id) }}" data-aos="fade-up">
                        <div class="mb-4 similar-game-card d-flex rounded"
                            style="background: url({{ URL::asset('/storage/' . $game->file_path) }})">
                            <h4 style="z-index: 2"
                                class="mt-3 text-center text-light w-100 position-absolute bottom-0 start-0">
                                {{ $game->title }}</h4>
                            <div class="dark-up" style="min-height: 35%; max-height: 50%; opacity:.65; z-index:1"></div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
@endsection
