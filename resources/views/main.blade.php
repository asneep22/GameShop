@extends('app')

@section('page-title')
    Главная
@endsection

@section('content')
    <!-- Главное видео -->
    <div class="container-fluid p-0 m-0 video-container min-vw-100">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active" >
                    <video  preload="auto" class="mx-auto main_video" autoplay="autoplay" >
                        <source  src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                    </video>
                </div>
                <div class="carousel-item">
                    <video preload="auto" class="mx-auto main_video" autoplay="autoplay">
                        <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm>
                        <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg>
                        <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
                        <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp>
                    </video>
                </div>
                <div class="carousel-item">
                    <video preload="auto" class="mx-auto main_video" autoplay="autoplay">
                        <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
                    </video>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Почему мы -->

    <div class="text-black">
            <div class="container d-flex flex-column">

                    <div class="d-lg-flex flex-wrap w-100 mt-5 text-center justify-content-between">
                        <div class="mb-4 our-pluses our-pluses-first d-flex rounded"
                            style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
                            <div class="px-3 text-light m-auto">
                                <h4 class="mt-3">Низкие цены</h4>
                                <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Reprehenderit
                                    architecto iure
                                    magnam esse provident doloremque sint cum repellat similique vitae.</p>
                            </div>
                            <div class="dark-up"></div>
                        </div>

                        <div class="mb-4 mx-lg-2 our-pluses our-pluses-first d-flex rounded text-center"
                            style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
                            <div class="px-3 text-light m-auto">
                                <h4 class="mt-3">Большой выбор товаров</h4>
                                <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Reprehenderit
                                    architecto iure
                                    magnam esse provident doloremque sint cum repellat similique vitae.</p>
                            </div>
                            <div class="dark-up"></div>
                        </div>

                        <div class="mb-4 our-pluses our-pluses-last d-flex rounded text-center"
                            style="background: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1613226331_195-p-fon-sinii-gradient-dlya-fotoshopa-243.jpg')">
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

    <div class="container-fluid p-0 rounded">
        <div class="container d-flex flex-column">

            <div class="mt-3">
                <h2 class="text-sm-center text-lg-start">Выбор редакции</h2>
                <div class="d-lg-flex text-center">
                </div>
            </div>
            <hr class="">

            <div id="RedChoose" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner pb-3">
                    <div class="carousel-item active">
                        <div class="d-lg-flex justify-content-lg-between mx-auto">
                            <!-- Блок большой карточки -->
                            <div class="big-card rounded d-flex align-items-end"
                                style="background: url({{ URL::asset('/storage/' . $products_red->first()->file_path) }})">
                                <div class="big-card-footer rounded d-flex flex-column">
                                    <div class="descr m-auto">
                                        <h5 class="text-center mt-3">{{$products_red->first()->title}}</h5>
                                        <p class="text-center px-3">{{Str::limit($products_red->first()->description, 250, '...') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Блок двух карточек -->
                            <div class="d-flex flex-column">
                                <!-- Первая карточка -->
                                <div class="mb-4 mx-lg-2 game-card-block d-flex rounded"
                                    style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                                    <div class="px-3 text-light m-auto">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit
                                            architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    </div>
                                    <div class="dark-up"></div>
                                </div>
                                <!-- Вторая карточка -->
                                <div class="mx-lg-2 game-card-block d-flex rounded"
                                    style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                                    <div class="px-3 text-light m-auto">
                                        <h4 class="mt-3">FAR CRY 4</h4>
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

                    <div class="carousel-item">
                        <div class="d-lg-flex justify-content-lg-between mx-auto">
                            <!-- Блок большой карточки -->
                            <div class="big-card rounded d-flex align-items-end"
                            style="background: url({{ URL::asset('/storage/' . $products_red->last()->file_path) }})">
                            <div class="big-card-footer rounded d-flex flex-column">
                                <div class="descr m-auto">
                                    <h5 class="text-center mt-3">{{$products_red->last()->title}}</h5>
                                    <p class="text-center px-3">{{Str::limit($products_red->last()->description, 250, '...') }}</p>
                                </div>
                            </div>
                        </div>
                            <!-- Блок двух карточек -->
                            <div class="d-flex flex-column">
                                <!-- Первая карточка -->
                                <div class="mb-4 mx-lg-2 game-card-block d-flex rounded"
                                    style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                                    <div class="px-3 text-light m-auto">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit
                                            architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    </div>
                                    <div class="dark-up"></div>
                                </div>
                                <!-- Вторая карточка -->
                                <div class="mx-lg-2 game-card-block d-flex rounded"
                                    style="background: url('https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg')">
                                    <div class="px-3 text-light m-auto">
                                        <h4 class="mt-3">FAR CRY 4</h4>
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
            <button type="submit" class="btn-green mt-1 p-2 px-5 m-auto">Больше</button>
        </div>
    </div>

    <div class="container-fluid p-0 rounded">
        <div class="container d-flex flex-column">

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
            <hr class="">
            <div class="d-flex flex-wrap">
                @foreach ($products as $item)
                    <div class="mb-4 mx-auto game-card rounded">
                        <div class="img" style="background: url({{ URL::asset('/storage/' . $item->file_path) }})">
                        </div>
                        <div class="px-2 text-break d-flex flex-column">
                            <h4 class="" style="min-height: 3rem">{{ $item->title }}</h4>
                            <p class="">{{ Str::limit($item->description, 200, '...') }}</p>
                            <button type="submit" class="btn-green mb-5 ms-0 m-auto">В корзину</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn-green mt-1 p-2 px-5 mb-4 m-auto">Больше</button>
        </div>
    </div>
    </div>
    </div>
@endsection
