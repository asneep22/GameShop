<header class=" container-fluid hbg dfh">

    <nav class="navbar navbar-expand-lg navbar-light hbg">
        <div class="container-fluid">
            <div class="d-flex flex-column mb-2 cs">
                <div class="divloga">
                    <a href="#" class="fs-1 text-decoration-none text-black ts m-0">Гейм</a>
                    <a href="#" class="fs-1 text-decoration-none text-black ts m-0">Шоп</a>
                </div>
                <div class="d-flex align-items-start cst">
                    <a href="#" class="fs-6 text-decoration-none text-black ts m-0 ht">Цифровой</a><a href="#" class="ts text-decoration-none text-black np ht">рай для вас</a>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="d-flex align-items-center mt-1 tf">
                        <a href="#" class="text-decoration-none text-black m-0 ts fs-5 ps-4 gt">ГЛАВНАЯ</a>
                        <a href="#" class="text-decoration-none text-black m-0 ts fs-5 px-4 nt">НОВИНКИ</a>
                        <a href="#" class="text-decoration-none text-black m-0 ts fs-5 nt">СКИДКИ</a>
                        <a href="#" class="text-decoration-none text-black m-0 ts fs-5 px-4 nt">ПОПУЛЯРНЫЕ</a>
                        <a href="#" class="text-decoration-none text-black m-0 ts fs-5">ПРЕДЗАКАЗ</a>
                    </div>
                    <div class="d-flex ip">
                        <!-- Выпадающие меню поиска -->

                        <div class="dropdown">
                            <a class="sb text-decoration-none text-black dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </a>
                            <form action="search" class="dropdown-menu dropdown-menu-start p-0 mt-2 m-auto fws position-absolute" aria-labelledby="dropdownMenuButton1">
                                <input type="search" class="dropdown-item bg-secondary text-white" placeholder="Найти">
                            </form>
                        </div>
                        <!-- Личный кабинет -->

                        <a href="{{route('page_user_auth')}}" class="ms-3 sb text-decoration-none text-black dm ddm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                        </a>
                        <!-- Избранное -->

                        <a href="#" class="ms-3 sb text-decoration-none text-black dm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                            </svg>
                        </a>
                        <!-- Корзина -->

                        <a href="#" class="ms-3 sb text-decoration-none text-black dm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>
                    </div>
                </ul>

            </div>
        </div>
    </nav>

</header>