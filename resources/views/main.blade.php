@extends('app')

@section('page-title')
    Главная
@endsection

@section('content')
    <div class="container m-auto">
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

    <div class="container-fluid shadow-lg p-3 pt-5 pb-5 bg-body rounded">
        <div class="container d-flex flex-column">

            <div class="mt-3 d-lg-flex justify-content-between">
                <h2 class="text-center">Игры</h2>
                <div class="d-lg-flex text-center">
                    <p class="">Новинки</p>
                    <p class="px-4">Популярное</p>
                    <p class="">Часто покупаемые</p>
                </div>
            </div>
            <hr class="">
            <div class="games d-flex justify-content-between  flex-wrap">
                @for ($i = 0; $i < 4; $i++)
                    <div class="d-lg-flex pb-3-sm game-card">
                        <div class="img">
                        <img src="https://static.gabestore.ru/product/TeaM7FK817IbcavOJFy85AxG1Kxa9aom.jpg"
                        class="w-100" alt="">
                        </div>
                        <div class="ps-3">
                            <h4 class="">FAR CRY 4</h4>
                            <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit architecto iure
                                magnam esse provident doloremque sint cum repellat similique vitae.</p>
                            <button type="submit" class="btn-green mt-2">В корзину</button>
                        </div>
                    </div>
                @endfor
            </div>
            <button type="submit" class="btn-green mt-4 p-2 px-5 m-auto">Больше</button>
        </div>
    </div>
    </div>
@endsection
