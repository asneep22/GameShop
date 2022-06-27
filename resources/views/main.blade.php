@extends('app')

@section('page-title')
    Главная
@endsection

@section('content')
    <!-- Главное видео -->
    <div class="container-fluid p-0 m-0 video-container min-vw-100">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <video preload="auto" class="mx-auto main_video" autoplay="autoplay">
                        <source src="https://woolyss.com/f/Chimera-AV1-8bit-480x270-552kbps.mp4">
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

    <!-- Новинки/Популярное/Топ продаж -->
    <div class="container-fluid p-0 mb-3 rounded">
        <div class="container d-flex flex-column">

            <div class="mt-3 d-lg-flex justify-content-between">
                <h2 class="text-sm-center text-lg-start ">Стоит посмотреть</h2>
                <div class="d-lg-flex text-center">
                    <a href="#" class="text-decoration-none text-black">Новинки</a>
                    <a href="#" class="px-4 text-decoration-none text-black">Популярное</a>
                    <a href="#" class="text-decoration-none text-black">Часто покупаемые</a>
                </div>
            </div>
            <hr class="">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-lg-flex">
                            <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                                <div class="img">
                                    <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                        class="w-100" alt="">
                                </div>
                                <div class="px-3">
                                    <h4 class="mt-3">FAR CRY 4</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit
                                        architecto iure
                                        magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    <button type="submit" class="btn-green mt-2">В корзину</button>
                                </div>
                            </div>
                            <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                                <div class="img">
                                    <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                        class="w-100" alt="">
                                </div>
                                <div class="ps-3">
                                    <h4 class="mt-3">FAR CRY 4</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit architecto iure
                                        magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    <button type="submit" class="btn-green mt-2">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="d-lg-flex">
                            <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                                <div class="img">
                                    <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                        class="w-100" alt="">
                                </div>
                                <div class="px-3">
                                    <h4 class="mt-3">FAR CRY 4</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit
                                        architecto iure
                                        magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    <button type="submit" class="btn-green mt-2">В корзину</button>
                                </div>
                            </div>
                            <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                                <div class="img">
                                    <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                        class="w-100" alt="">
                                </div>
                                <div class="px-3">
                                    <h4 class="mt-3">FAR CRY 4</h4>
                                    <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Reprehenderit architecto iure
                                        magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                    <button type="submit" class="btn-green mt-2">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
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

            <div class="mt-3">
                <h2 class="text-sm-center text-lg-start">Выбор редакции</h2>
                <div class="d-lg-flex text-center">
                </div>
            </div>
            <hr class="">

            <div id="RedChoose" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-lg-flex justify-content-between">
                            <!-- Блок большой карточки -->
                            <div class="big-card d-flex align-items-end">
                                <img src="https://i.playground.ru/e/5qHoR1Vq5inGsFVE9_yCCg.jpeg" class="big-card-img"
                                    alt="">
                                <div class="big-card-footer d-flex flex-column">
                                    <div class="descr">
                                        <h5 class="text-center mt-3">Dead Space</h5>
                                        <p class="text-center px-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Aut fuga quas dolorum dolor odio quia vitae, dicta praesentium illum
                                            ipsam!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Блок двух карточек -->
                            <div class="d-flex flex-column">
                                <div class="d-lg-flex mb-4 mx-lg-2 game-card rounded">
                                    <div class="img">
                                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                            class="w-100" alt="">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit
                                            architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                        <button type="submit" class="btn-green mt-2">В корзину</button>
                                    </div>
                                </div>
                                <div class="d-lg-flex mx-lg-2 game-card rounded m-auto">
                                    <div class="img">
                                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                            class="w-100" alt="">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                        <button type="submit" class="btn-green mt-2">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="d-lg-flex justify-content-between">
                            <!-- Блок большой карточки -->
                            <div class="big-card d-flex align-items-end">
                                <img src="https://i.playground.ru/e/5qHoR1Vq5inGsFVE9_yCCg.jpeg" class="big-card-img"
                                    alt="">
                                <div class="big-card-footer d-flex flex-column">
                                    <div class="descr m-auto">
                                        <h5 class="text-center mt-3">Dead Space</h5>
                                        <p class="text-center px-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Aut fuga quas dolorum dolor odio quia vitae, dicta praesentium illum
                                            ipsam!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Блок двух карточек -->
                            <div class="d-flex flex-column">
                                <div class="d-lg-flex mb-4 mx-lg-2 game-card rounded">
                                    <div class="img">
                                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                            class="w-100" alt="">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit
                                            architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                        <button type="submit" class="btn-green mt-2">В корзину</button>
                                    </div>
                                </div>
                                <div class="d-lg-flex mx-lg-2 game-card rounded m-auto">
                                    <div class="img">
                                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                                            class="w-100" alt="">
                                    </div>
                                    <div class="ps-3">
                                        <h4 class="mt-3">FAR CRY 4</h4>
                                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Reprehenderit architecto iure
                                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                                        <button type="submit" class="btn-green mt-2">В корзину</button>
                                    </div>
                                </div>
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
        <button type="submit" class="btn-green mt-1 p-2 px-5 m-auto">Больше</button>
    </div>
    </div>

    <div class="container-fluid p-0 rounded">
        <div class="container d-flex flex-column">

            <div class="mt-3">
                <h2 class="text-sm-center text-lg-start">Все предложения</h2>
                <div class="d-lg-flex text-center">
                </div>
            </div>
            <hr class="">

            <div class="d-lg-flex flex-wrap">
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit
                            architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex flex-wrap">
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit
                            architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex flex-wrap">
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit
                            architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
                <div class="d-lg-flex col-lg mb-4 mx-lg-2 game-card rounded m-auto">
                    <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg" class="w-100"
                            alt="">
                    </div>
                    <div class="px-3">
                        <h4 class="mt-3">FAR CRY 4</h4>
                        <p class="m-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Reprehenderit architecto iure
                            magnam esse provident doloremque sint cum repellat similique vitae.</p>
                        <button type="submit" class="btn-green mt-2">В корзину</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-green mt-1 p-2 px-5 mb-4 m-auto">Больше</button>
        </div>
    </div>
@endsection
