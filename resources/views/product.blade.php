@extends('app')

@section('page-title')
    {{$product->title}}
@endsection

@section('page_descr')
Купить {{$product->title}}
@endsection

@section('content')
    <div class="container-fluid mt-5 pt-1 px-0">
        <div class="container py-4 bg-white d-lg-flex justify-content-between px-0">
            <div class="position-relative m-lg-0" style="min-width: 70%; max-width:100%">
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
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }} w-100">
                                    <div class="visually-hidden">{{ $i++ }}</div>
                                    <img src="{{ URL::asset('/storage/' . $material->file_path) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="mt-1 d-flex overflow-auto">
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
            {{-- Информация о продукте --}}
            <div class="p-4 ms-3 d-flex bg-blue outer-shadow-light-1 mt-3 mt-lg-0 mt-lg-0 rounded"
                style="min-width:28%">
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
                        @if ($product->keys->count() > 0)
                            <a class="me-0 m-auto text-decoration-none text-light px-3 py-2 btn-orange hvr-grow product_add_to_shop_cart_button btn_product_buy"
                                style="cursor: pointer" data-new-text="Игра уже в корзине" data-toggle="message"
                                data-target="#1" data-expire="2000" data-url={{ route('product_to_cart', $product->id) }}
                                data-auth={{ Auth::check() }}>{{ !$product_is_on_shopping_cart ? 'В корзину' : 'Игра уже в корзине' }}</a>
                        @else
                            <p class="fs-6 my-auto">Нет в наличии</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Отзывы --}}
    <div class="container-fluid bg-light px-0">
        <div class="container px-0">
            <div class="d-lg-flex mt-4 px-0 my-4">
                <div class="" style="min-width: 70.8%">
                    {{-- Если авторизован --}}
                    @auth
                        <h5>Отзывы</h5>
                        <form action="{{ route('ReviewCreate', $product->id) }}" method="POST">
                            @csrf
                            <textarea type="text" name="review" id="review" class="form-input" rows="4"
                                placeholder="Введите свой отзыв тут"></textarea>
                            <div class="d-flex">
                                <small class="my-auto text-secondary ps-1 pt-2 pe-2 text-wrap">Ваш email будет виден другим
                                    людям</small>
                                <button type="submit" class="mt-2 btn-orange fs-6 hvr-grow me-0 m-auto">Отправить</button>
                            </div>
                        </form>
                    @endauth

                    {{-- Если не авторизован --}}

                    @guest
                        <div class="text-center mt-4 pt-2">
                            <a href="{{ route('page_user_auth') }}"
                                class="btn-orange text-light hvr-grow fs-6 pe-3 me-1">Авторизуйтесь</a><span
                                class="fs-4 me-1">,</span>
                            <h5 class="my-auto">Чтобы оставить отзыв</h5>
                        </div>
                    @endguest

                    <hr class="gradient">

                    {{-- Отображение отзывов --}}

                    <div class="mt-2 d-flex flex-column">
                        @foreach ($reviews as $review)
                            <div class="review-card outer-shadow-light-2 w-100 mb-2 p-2 px-3 d-flex bg-orange text-light">
                                <div class="icon me-3 d-flex flex-column">
                                    <small class="text-light">{{ $review->user->email }}</small>
                                    <div class="mb-0 my-auto d-flex flex-column">
                                        @auth
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#AnswerReview{{ $review->id }}"
                                                class="hvr-grow text-light">Комментировать</a>
                                        @endauth
                                    </div>
                                </div>
                                <div>
                                    <p class="fs-6">
                                        {{ $review->review }}
                                    </p>
                                </div>

                                <div class="me-0 mx-auto">
                                    @auth
                                        @if (Auth::user()->id == $review->user_id && Auth::user()->role_id == 3)
                                            <a href="{{ route('DeleteReviewFromUser', $review->id) }}"
                                                onclick="return confirm('Удалить?')"
                                                class="hvr-grow outer-shadow-light-2 text-light p-1 ms-0 mx-auto"
                                                style="background: rgb(214, 24, 3)">Удалить</a>
                                        @endif
                                        @if (Auth::user()->role_id == 1)
                                            <a href="{{ route('DeleteReviewFromAdmin', $review->id) }}"
                                                onclick="return confirm('Удалить?')"
                                                class="hvr-grow outer-shadow-light-2 text-light p-1 ms-0 mx -auto"
                                                style="background: rgb(214, 24, 3)">Удалить</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>

                            <div class="ms-5">

                                @foreach ($reviewsOnRevew->where('review_id', $review->id) as $reviewOnReview)
                                    <div
                                        class="review-card outer-shadow-light-2 w-100 mb-2 p-2 px-3 d-flex bg-orange text-white">
                                        <div class="me-3 d-flex flex-column">
                                            <small class="text-light">{{ $reviewOnReview->user->email }}</small>
                                        </div>
                                        <div>
                                            <p class="fs-6">
                                                {{ $reviewOnReview->review }}
                                            </p>
                                        </div>
                                        <div class="me-0 mx-auto d-flex flex-column">
                                            @auth
                                                @if (Auth::user()->id == $reviewOnReview->user_id && Auth::user()->role_id == 3)
                                                    <a href="{{ route('DeleteReviewFromUser', $reviewOnReview->id) }}"
                                                        onclick="return confirm('Удалить?')"
                                                        class="hvr-grow outer-shadow-light-2 text-light p-1 ms-0 mx-auto"
                                                        style="background: rgb(214, 24, 3)">Удалить</a>
                                                @endif
                                                @if (Auth::user()->role_id == 1)
                                                    <a href="{{ route('DeleteReviewFromAdmin', $reviewOnReview->id) }}"
                                                        onclick="return confirm('Удалить?')"
                                                        class="hvr-grow outer-shadow-light-2 text-light p-1 ms-0 mx-auto"
                                                        style="background: rgb(214, 24, 3)">Удалить</a>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="AnswerReview{{ $review->id }}" tabindex="-1"
                                aria-labelledby="AnswerReview{{ $review->id }}ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="AnswerReview{{ $review->id }}ModalLabel">
                                                Комментировать "{{ Str::limit($review->review, 30, '...') }}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ReviewCreate', [$product->id, $review->id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <textarea type="text" name="review" id="review{{ $review->id }}" class="form-input" rows="4"
                                                    placeholder="Введите ваш комментарий тут"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn-green hvr-grow">Закрыть</button>
                                                <button type="submit" class="btn-blue hvr-grow">Комментировать</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Правила написания отзывов --}}
                <div style="min-width:28%; margin-top:2.4rem;"
                    class="bg-secondary text-light outer-shadow-light-2 mb-3 ms-lg-3 rounded">
                    <h5 class="text-center p-4">Внимательно прочитайте перед публикацией отзыва!</h5>
                    <div class="px-4 pb-4">
                        <p class="fs-6">- Не используйте ненормативую лексику или оскорбления</p>
                        <p class="fs-6">- Не используйте отзывы с целью прорекламирвать какой-либо товар, услуги или
                            личность</p>
                        <p class="fs-6">- Не используйте отзывы с целью призыва к действиям, нарушающих закон</p>
                        <p class="fs-6">- Не допускайте большое количество орфографических ошибок</p>
                        <p class="fs-6">- Не используйте транслитерацию</p>
                    </div>
                </div>
            </div>
            {{ $reviews->links() }}
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
