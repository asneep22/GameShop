    <div class="container-fluid d-flex flex-column">
        <div class="d-xxl-flex">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light mx-auto mx-xxl-0" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Панель навигации</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Аналитика
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page_admin_products')}}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Товары
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('page_admin_users') }}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Пользователи
                        </a>
                    </li>

                    <li>
                        <a href="{{ Route('page_admin_admins') }}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Администраторы
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page_admin_directories')}}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Справочники
                        </a>
                    </li>
                    <li>
                        <a href="{{route('page_admin_settings', Auth::id())}}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Настройки
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Выход
                        </a>
                    </li>
                </ul>
            </div>
            @yield('admin-content')
        </div>
    </div>
