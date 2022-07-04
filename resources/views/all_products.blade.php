@extends('app')

@section('content')
    <div class="container p-0">
        {{-- Боковая панель --}}
        <div class="d-flex flex-column">
            <div class="d-flex mx-sm-auto mx-auto mx-lg-0  flex-column">

                <form action="" class="d-flex m-auto ms-0 w-100 mt-3">
                    <div class="d-flex">
                        <input type="text" class="form-input" style="min-width: 23.2rem">
                        <button type="submit" class="btn-green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>

                    <button type="button" class="btn-green my-auto me-0 py-2 m-auto" data-bs-toggle="offcanvas"
                        href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        Доп. фильтры
                    </button>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Вне холста</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Закрыть"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <ul class="nav nav-pills flex-column mb-auto ">
                                    <li class="nav-item mb-3">
                                        <label for="title" class="mb-2">Название</label>
                                        <input type="text" class="form-input" name="title" id="title">
                                    </li>
                                    <li class="nav-item mb-3">
                                        <label for="genres">Жанры</label>
                                        <select class="form-control js-select2" name="genres[]" id="genres"
                                            data-tags="false" multiple="multiple">
                                            @foreach ($genres as $genre)
                                                <option>{{ $genre->pname }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <div class="d-flex">
                                            <div class="d-flex flex-column me-1">
                                                <label for="price_min" class="mb-2">цена мин. руб.</label>
                                                <input type="number" step="0.01" class="form-input mb-3"
                                                    name="price_min" id="price_min">
                                            </div>
                                            <div class="d-flex flex-column ms-1">
                                                <label for="price_max" class="mb-2">цена макс. руб.</label>
                                                <input type="number" step="0.01" class="form-input mb-3"
                                                    name="price_max" id="price_max">
                                            </div>
                                        </div>
                                    </li>
                                    <button type="submit" class="btn-green">Поиск</button>
                                </ul>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="RedChoose" class="carousel slide mb-3  " data-bs-ride="carousel">
            <div class="carousel-inner pb-3">
                <div class="carousel-item active">
                    <div class="d-flex rounded mt-3 profitable-card" style="background-color: #FFF">
                        <div class="profitable-card-image m-0 rounded"
                            style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                        </div>
                        <div class="px-3 text-dark">
                            <h4 class="mt-3">FAR CRY 4</h4>
                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Reprehenderit
                                architecto iure
                                magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#RedChoose" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#RedChoose" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <div class="d-flex flex-wrap justify-content-between all-page">
            @foreach ($products as $item)
                <div class="mb-4 game-card rounded">
                    <div class="img" style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                    </div>
                    <div class="px-2 text-break d-flex flex-column">
                        <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                        <p class="">{{ Str::limit($item->description, 200, '...') }}</p>
                        <div class="btn-group">
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg></button>
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($products as $item)
                <div class="mb-4 game-card rounded">
                    <div class="img" style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                    </div>
                    <div class="px-2 text-break d-flex flex-column">
                        <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                        <p class="">{{ Str::limit($item->description, 200, '...') }}</p>
                        <div class="btn-group">
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg></button>
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($products as $item)
                <div class="mb-4 game-card rounded">
                    <div class="img" style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                    </div>
                    <div class="px-2 text-break d-flex flex-column">
                        <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                        <p class="">{{ Str::limit($item->description, 200, '...') }}</p>
                        <div class="btn-group">
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg></button>
                            <button type="submit" class="btn-green mb-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>
    {{ $products->withQueryString()->links() }}
    </div>
@endsection
