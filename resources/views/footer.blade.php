<!-- Светлая тема -->

<script>
    /*
<footer class="d-flex justify-content-center align-items-center py-3 flex-column bg-light m-auto mb-0 container-fluid">

    <nav class="hbg">
        <div class="container-fluid jcb">
            <ul class="me-auto mb-2 mb-lg-0 d-flex ft-f">
                <div class="d-flex align-items-center mt-1 tf-f">
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f ps-4 gt">ГЛАВНАЯ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f px-4 nt">НОВИНКИ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f nt">СКИДКИ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f px-4 nt">ПОПУЛЯРНЫЕ</a>
                </div>
                <div class="d-flex justify-content-center align-items-center ip-f">
                    <!-- Выпадающие меню поиска -->

                    <!-- Выпадающие меню поиска -->

                    <div class="dropdown">
                        <a class="sb text-decoration-none text-muted dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </a>
                        <form action="search" class="dropdown-menu dropdown-menu-start p-0 mt-2 m-auto fws-f position-absolute" aria-labelledby="dropdownMenuButton1">
                            <input type="search" class="dropdown-item bg-secondary text-white" placeholder="Найти">
                        </form>
                    </div>
                    <!-- Личный кабинет -->

                    <a href="{{route('page_user_auth')}}" class="ms-3 sb text-decoration-none text-muted dm ddm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                    </a>
                    <!-- Тема сайта -->

                    <a href="#" class="ms-3 sb text-decoration-none text-muted dm">
                        <!-- При светлой теме -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                                <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                            </svg> -->

                        <!-- При темной теме -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                        </svg>
                    </a>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Нижний текст -->
    <div class="d-flex container allt">

        <div class="col-md-7 d-flex align-items-center bloc-m">
            <span class="text-muted fs ts">Все права защищены. Все названия продуктов, игр, компаний, марок, логотипов, товарных знаков и другх материалов являются собственностью соответствующих владельцев. Только лицензионные ключи, аккаунты и гифты ко всем игровым платформам: Steam.</span>
        </div>
        <div class="col-lg-4 colset bloc-m d-flex align-items-center justify-content-end">
            <div class="cs mb-4">
                <div class="divloga d-flex align-items-center">
                    <a href="#" class="text-decoration-none text-muted ts-f ts m-0 d-flex ">Гейм Шоп</a>
                </div>
            </div>
        </div>

    </div>


</footer>
/*
</script>

<!-- Темная тема -->

<footer class="d-flex justify-content-center align-items-center py-3 flex-column bg-dark m-auto mb-0 container-fluid">

    <nav class="hbg-d">
        <div class="container-fluid jcb">
            <ul class="me-auto mb-2 mb-lg-0 d-flex ft-f p-0">
                <div class="d-flex align-items-center mt-1 tf-f">
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f">ГЛАВНАЯ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f nm-f">НОВИНКИ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f">СКИДКИ</a>
                    <a href="#" class="text-decoration-none text-muted m-0 ts mb-f nm-f">ПОПУЛЯРНЫЕ</a>
                </div>
                <div class="d-flex justify-content-center align-items-center ip-f mt-3">

                    <!-- Выпадающие меню поиска -->

                    <div class="dropdown">
                        <a class="sb text-decoration-none text-white dropdown-toggle text-muted" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </a>
                        <form action="search" class="dropdown-menu dropdown-menu-start form-b p-0 mt-2 m-auto fws-f position-absolute" aria-labelledby="dropdownMenuButton1">
                            <input type="search" class="dropdown-item inp-bg text-white" placeholder="Найти">
                        </form>
                    </div>
                    <!-- Личный кабинет -->

                    <a href="{{route('page_user_auth')}}" class="ms-3 sb text-decoration-none text-muted dm ddm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                    </a>
                    <!-- Тема сайта -->

                    <a href="#" class="ms-3 sb text-decoration-none text-muted dm">
                        <!-- При светлой теме -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                                <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                            </svg> -->

                        <!-- При темной теме -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                        </svg>
                    </a>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Нижний текст -->
    <div class="d-flex container allt">

        <div class="col-md-7 d-flex align-items-center bloc-m">
            <span class="text-muted fs ts">Все права защищены. Все названия продуктов, игр, компаний, марок, логотипов, товарных знаков и другх материалов являются собственностью соответствующих владельцев. Только лицензионные ключи, аккаунты и гифты ко всем игровым платформам: Steam.</span>
        </div>
        <div class="col-lg-4 colset bloc-m d-flex align-items-center justify-content-end">
            <div class="cs mb-4">
                <div class="divloga d-flex align-items-center">
                    <a href="#" class="text-decoration-none text-muted ts-f ts m-0 d-flex ">Гейм Шоп</a>
                </div>
            </div>
        </div>

    </div>


</footer>