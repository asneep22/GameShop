@extends('app')

@section('content')
    <div class="container d-flex flex-column px-2">
        <div class="d-lg-flex">
            {{-- Боковая панель --}}
            <div class="pe-3 mx-auto d-flex flex-column" style="min-width: 20rem; max-width:20rem; min-height: 100%">
                <form action="" class="d-flex flex-column h-100 py-3 m-lg-0 m-auto">
                    <div class="form-group mx-auto h-100">
                        <div class="d-flex justify-content-between mb-2">
                            <label for="title" class="">Название</label>
                            <form action="">
                                <a href="" class="btn-green text-decoration-none text-light">X</a>
                            </form>
                        </div>
                        <input type="text" class="form-input mb-3 w-100" name="title" id="title"
                            value="{{ Request::query('title') }}" placeholder="Название игры">

                        <label for="genres">Жанры</label>
                        <select class="form-control js-select2 w-100" name="genres[]" id="genres" data-tags="false"
                            multiple="multiple" data-placeholder="Выберите жанры для поиска">
                            @foreach ($genres as $key => $genre)
                                <option
                                    {{ isset($_GET['genres']) ? (in_array($genre->id, $_GET['genres']) ? 'selected' : '') : '' }}
                                    value="{{ $genre->id }}">{{ $genre->pname }}</option>
                            @endforeach
                        </select>

                        <label for="oses" class="mt-3">Платформы</label>
                        <select class="form-control js-select2 w-100" name="oses[]" id="oses" data-tags="false"
                            multiple="multiple" data-placeholder="Выберите платформы для поиска">
                            @foreach ($oses as $key => $os)
                                <option
                                    {{ isset($_GET['oses']) ? (in_array($os->id, $_GET['oses']) ? 'selected' : '') : '' }}
                                    value="{{ $os->id }}">{{ $os->pname }}</option>
                            @endforeach
                        </select>

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

                        <div class="d-flex flex-wrap mb-3">

                            <div class="d-flex">
                                <input type="checkbox" name="new" id="new" class="form-check-input mx-1"
                                    {{ Request::query('new') ? 'checked' : '' }}>
                                <label class="form-check-label" for="new">
                                    Новинки
                                </label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="popular" id="popular" class="form-check-input mx-1">
                                <label class="form-check-label" for="popular">
                                    Популярное
                                </label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="discount" id="discount" class="form-check-input mx-1"
                                    {{ Request::query('discount') ? 'checked' : '' }}>
                                <label class="form-check-label" for="discount">
                                    Скидки
                                </label>
                            </div>


                            <div class="d-flex">
                                <input type="checkbox" name="redChoose" id="redChoose" class="form-check-input mx-1"
                                    {{ Request::query('redChoose') ? 'checked' : '' }}>
                                <label class="form-check-label" for="redChoose">
                                    Выбор редакции
                                </label>
                            </div>


                        </div>
                        <button type="submit" class="btn-green w-100">Поиск</button>
                        <h6 class="mt-3">Всего найдено игр: {{ $products->count() }}</h6>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column">
                {{-- Выгодное предложение --}}
                <div id="RedChoose" class="carousel slide mb-2 mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner pb-3">
                        <div class="carousel-item active">
                            <div class="d-flex rounded mt-3 profitable-card" style="background-color: #FFF">
                                <div class="profitable-card-image rounded"
                                    style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                                </div>
                                <div class="px-3 text-dark d-flex flex-column">
                                    <h4 class="mt-3">FAR CRY 4</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit
                                        architecto iure
                                        magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    <h3 class="mt-4">499р</h3>
                                    <div class="btn-group mb-3 my-auto">
                                        <button type="submit" class="btn-green"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                            </svg></button>
                                        <button type="submit" class="btn-green"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                                <path fill-rule="evenodd"
                                                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                            </svg></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#RedChoose"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#RedChoose"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <hr class="gradient">
                {{-- Все продукты --}}
                <div class="d-flex flex-wrap justify-content-between mt-4 all-page">

                    @foreach ($products as $item)
                        <div class="mb-4 d-flex flex-column game-card-all-products rounded">
                            <a href="{{ route('page_product', $item->id) }}"
                                class="card-body-my text-decoration-none text-dark">
                                <div class="img-all-products"
                                    style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                                </div>
                                <div class="px-3 text-break d-flex flex-column">
                                    <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                                    <p class="text-justify">{{ Str::limit($item->description, 200, '...') }}</p>
                                </div>
                            </a>
                            <div class="mb-0 my-auto p-0">
                                <hr class="dotted mb-0">
                                <div class="btn-group mb-0 d-flex">

                                    {{-- В корзину --}}
                                    <button type="submit" class="btn-green"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg></button>
                                    {{-- На страницу товара --}}
                                    <a href="{{ route('page_product', $item->id) }}" class="btn-green text-decoration-none text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-box-arrow-up-right"
                                            viewBox="0 0 16 16">
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
                    <div class=""> {{ $products->withQueryString()->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>
@endsection
