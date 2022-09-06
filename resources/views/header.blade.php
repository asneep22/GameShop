<!-- Светлая тема -->
<header class="container-fluid blue-background p-0 z-index-5 headroom position-fixed">

    <nav class="navbar container p-0 text-center navbar-expand-lg navbar-light pb-4">
        <div class="d-lg-flex m-auto fch pt-3">

            <div class="d-flex flex-column flex-nowrap align-items-center cs">
                <div class="divloga">
                    <a href="{{ route('page_welcome') }}" class="fs-1 text-decoration-none ts m-0">Teeter-Totter</a>
                </div>
            </div>

            <button class="navbar-toggler m-auto mt-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">

                <ul class="navbar-nav mt-2 mb-lg-0">
                    <div class="d-flex align-items-center mt-1 tf">
                        <a href="{{ route('page_welcome') }}"
                            class="hvr-bounce-in text-decoration-none hvr-underline-from-left mdel-g borh py-2 px-2 text-light"><span
                                class="tcs m-0 ts fsh-t">ГЛАВНАЯ</span></a>
                        <a href="{{ route('page_all_products') }}"
                            class="hvr-bounce-in hvr-underline-from-left text-decoration-none mdel-n borh text-light px-2 py-2"><span
                                class="tcs  m-0 ts fsh-t  text-light px-2 py-2">КЛЮЧИ</span></a>
                        {{-- <a href="#" class="hvr-bounce-in text-decoration-none hvr-underline-from-left borh text-light px-2 py-2"><span class="tcs  m-0 ts fsh-t  ">ГИФТЫ</span></a>
                        <a href="#" class="hvr-bounce-in text-decoration-none hvr-underline-from-left mdel-p borh text-light px-2 py-2"><span class="tcs  m-0 ts fsh-t ">АККАУНТЫ</span></a> --}}
                    </div>

                    <div class="d-lg-flex align-items-center justify-content-center ip">

                        <!-- Личный кабинет -->

                        <a href="{{ route('page_user_auth') }}"
                            class="ms-3 sb text-decoration-none text-white dm ddm hvr-bounce-in">
                            <svg class="text-white svgs" xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-person-bounding-box"
                                viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM+11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                        </a>
                        <!-- Корзина -->
                        <a href="{{ route('page_shopping_cart') }}"
                            class="ms-3 sb text-decoration-none text-white dm hvr-bounce-in position-relative">
                            <small id="shopping_cart_products_count"
                                class="position-absolute cart_product_count px-1">{{ Auth::check() ? ($product_users->count() > 0 ? $product_users->count() : '') : (count(Session::get('shopping_cart_products', [])) > 0 ? count(Session::get('shopping_cart_products', [])) : '') }}</small>
                            <svg class="text-white svgs" xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>

                        <!-- Выпадающие меню поиска -->
                        <form action="search" class="ms-3" aria-labelledby="dropdownMenuButton1">
                            <input type="search" class="form-input search fs-6" placeholder="Поик игр">
                        </form>
                    </div>
                </ul>

            </div>
        </div>
    </nav>

</header>
