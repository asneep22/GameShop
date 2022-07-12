@extends('app')

@section('titile')
    Справочники
@endsection

@section('admin-content')
    <div class="container d-flex flex-column mt-4">
        <div class="text-center">
            <h4>Справочники</h4>
        </div>
        <!-- Кнопка массового удаления -->
        <form data-action="{{ route('deleteDirectoriesMany') }}" class="delete-direcories-form d-flex flex-column">
            @csrf
            <input type="hidden" name="delete_genres_id[]" id="delete_genres_id">
            <input type="hidden" name="delete_oses_id[]" id="delete_oses_id ">
            <button class="delete-product-button" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
                Удалить
            </button>
        </form>

        <div class="w-75 mx-auto d-flex flex-column">
            <hr>
            <ul class="nav text-decoration-none nav-selected my-2 m-auto" id="pills-tab" role="tablist">
                <li class="nav-item ms-0 m-0" role="presentation">
                    <button class="py-2 px-3 active" id="pills-genres-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-genres" type="button" role="tab" aria-controls="pills-genres"
                        aria-selected="true">Жанры</button>
                </li>
                <li class="nav-item m-0" role="presentation">
                    <button class="py-2 px-3" id="pills-oses-tab" data-bs-toggle="pill" data-bs-target="#pills-oses"
                        type="button" role="tab" aria-controls="pills-oses" aria-selected="false">Операционные
                        системы</button>
                </li>
                <li class="nav-item m-0" role="presentation">
                    <button class="py-2 px-3" id="pills-cpus-tab" data-bs-toggle="pill" data-bs-target="#pills-cpus"
                        type="button" role="tab" aria-controls="pills-cpus" aria-selected="false">ЦП</button>
                </li>
                <li class="nav-item me-0 m-0" role="presentation">
                    <button class="py-2 px-3" id="pills-videocards-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-videocards" type="button" role="tab" aria-controls="pills-videocards"
                        aria-selected="false">Видеокарты</button>
                </li>
                @if (Auth::id() == 1)
                    <li class="nav-item me-0 m-0" role="presentation">
                        <button class="py-2 px-3" id="pills-discounts-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-discounts" type="button" role="tab" aria-controls="pills-discounts"
                            aria-selected="false">Накопительные скидки</button>
                    </li>
                @endif
                <button type="button" class="btn-green" data-bs-toggle="modal" data-bs-target="#search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
                <a href="{{ route('page_admin_directories') }}"
                    class="btn-green text-decoration-none text-light d-flex align-items-center">X</a>

                <div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="searchLabel">Поиск по ключевому слову</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="get">
                                    @csrf
                                    <label for="search">Ключевое слово</label>
                                    <input type="search" name="search" id="search" class="form-input">
                                    <div class="modal-footer mt-3 p-0">
                                        <hr>
                                        <button type="submit"
                                            class="btn-green py-2 px-2 m-0 rounded-0 mt-3">Применить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <hr>
            <div class="tab-content w-100" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-genres" role="tabpanel"
                    aria-labelledby="pills-genres-tab">
                    <div class="table-responsive">
                        <!--Жанры-->
                        <table class="table table-hover">
                            <thead class="align-middle">
                                <tr>
                                    <!--Добавить жанр-->
                                    <th scope="col" class="px-0">
                                        <button type="button" class="btn-green" data-bs-toggle="modal"
                                            data-bs-target="#addGenres">
                                            +
                                        </button>

                                        <div class="modal fade" id="addGenres" tabindex="-1"
                                            aria-labelledby="addGenresLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <!--Форма добавления-->
                                                <form action="{{ route('addGenres') }}" method="post">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addGenresLabel">Добавить жанры
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <select name="genres[]" id="genres"
                                                                data-dropdown-parent="#addGenres" class="js-select2"
                                                                multiple="multiple"></select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn-green">Добавить</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="w-75">Жанр</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genres as $key => $genre)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $genre->pname }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <!--Редактировать название жанра-->
                                                <button type="button" class="btn-green" data-bs-toggle="modal"
                                                    data-bs-target="#editGenre{{ $genre->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>

                                                <div class="modal fade" id="editGenre{{ $genre->id }}" tabindex="-1"
                                                    aria-labelledby="editGenre{{ $genre->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!--Форма обновления-->
                                                            <form action="{{ route('updateGenre', $genre->id) }}">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editGenre{{ $genre->id }}Label">
                                                                        Редактировать "{{ $genre->pname }}"</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="pnameGenre{{ $genre->id }}">Название
                                                                        жанра</label>
                                                                    <input type="text"
                                                                        placeholder="Введите название жанра тут" required
                                                                        class="form-input" name="pname"
                                                                        id="pnameGenre{{ $genre->id }}"
                                                                        value="{{ $genre->pname }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn-green">Сохранить</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('deleteGenre', $genre->id) }}"
                                                    class="btn-green text-decoration-none text-light"
                                                    onclick="return confirm('Подтвердите удаление')">X</a>
                                                <input type="checkbox" id="checkbox_genre{{ $genre->id }}"
                                                    class="form-check-input ms-2 my-auto checkbox_genre_select"
                                                    data-product-id={{ $genre->id }}>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-oses" role="tabpanel" aria-labelledby="pills-oses-tab">
                    <!--Операционные системы-->
                    <table class="table">
                        <thead class="align-middle">
                            <tr>
                                <!--Добавить операционную систему-->
                                <th scope="col" class="px-0">
                                    <button type="button" class="btn-green" data-bs-toggle="modal"
                                        data-bs-target="#addOs">
                                        +
                                    </button>

                                    <div class="modal fade" id="addOs" tabindex="-1" aria-labelledby="addOsLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <!--Форма добавления-->
                                            <form action="{{ route('addOses') }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addOsLabel">Добавить операционную
                                                            систему</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <select name="oses[]" id="oses"
                                                            data-dropdown-parent="#addOs" class="js-select2"
                                                            multiple="multiple"></select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn-green">Добавить</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="w-75">Операционная система</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oses as $key => $os)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $os->pname }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!--Редактировать название операционной системы-->
                                            <button type="button" class="btn-green" data-bs-toggle="modal"
                                                data-bs-target="#editOs{{ $os->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="editOs{{ $os->id }}" tabindex="-1"
                                                aria-labelledby="editOs{{ $os->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!--Форма обновления-->
                                                        <form action="{{ route('updateOs', $os->id) }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editOs{{ $os->id }}Label">
                                                                    Редактировать "{{ $os->pname }}"</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="pnameOs{{ $os->id }}">Название
                                                                    жанра</label>
                                                                <input type="text"
                                                                    placeholder="Введите название жанра тут" required
                                                                    class="form-input" name="pname"
                                                                    id="pnameOs{{ $os->id }}"
                                                                    value="{{ $os->pname }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn-green">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('deleteOs', $os->id) }}"
                                                class="btn-green text-decoration-none text-light"
                                                onclick="return confirm('Подтвердите удаление')">X</a>
                                            <input type="checkbox"
                                                class="form-check-input ms-2 my-auto checkbox_os_select"
                                                data-product-id={{ $os->id }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="tab-pane fade" id="pills-cpus" role="tabpanel" aria-labelledby="pills-cpus-tab">
                    <!--Процессоры-->
                    <table class="table">
                        <thead class="align-middle">
                            <tr>
                                <!--Добавить Процессор-->
                                <th scope="col" class="px-0">
                                    <button type="button" class="btn-green" data-bs-toggle="modal"
                                        data-bs-target="#addCpu">
                                        +
                                    </button>

                                    <div class="modal fade" id="addCpu" tabindex="-1" aria-labelledby="addCpuLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <!--Форма добавления-->
                                            <form action="{{ route('addCpus') }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addCpuLabel">Добавить процессор</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <select name="cpus[]" id="cpus"
                                                            data-dropdown-parent="#addCpu" class="js-select2"
                                                            multiple="multiple"></select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn-green">Добавить</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="w-75">Процессор</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cpus as $key => $cpu)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $cpu->pname }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!--Редактировать название Процессора-->
                                            <button type="button" class="btn-green" data-bs-toggle="modal"
                                                data-bs-target="#editCpu{{ $cpu->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="editCpu{{ $cpu->id }}" tabindex="-1"
                                                aria-labelledby="editCpu{{ $cpu->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!--Форма обновления-->
                                                        <form action="{{ route('updateGenre', $cpu->id) }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editCpu{{ $cpu->id }}Label">
                                                                    Редактировать "{{ $cpu->pname }}"</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="pnameCpu{{ $cpu->id }}">Название
                                                                    жанра</label>
                                                                <input type="text"
                                                                    placeholder="Введите название жанра тут" required
                                                                    class="form-input" name="pname"
                                                                    id="pnameCpu{{ $cpu->id }}"
                                                                    value="{{ $cpu->pname }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn-green">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('deleteCpu', $cpu->id) }}"
                                                class="btn-green text-decoration-none text-light"
                                                onclick="return confirm('Подтвердите удаление')">X</a>
                                            <input type="checkbox"
                                                class="form-check-input ms-2 my-auto checkbox_cpu_select"
                                                data-product-id={{ $cpu->id }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-videocards" role="tabpanel" aria-labelledby="pills-cpus-tab">
                    <!--Видеокарты-->
                    <table class="table">
                        <thead class="align-middle">
                            <tr>
                                <!--Добавить видеокарту-->
                                <th scope="col" class="px-0">
                                    <button type="button" class="btn-green" data-bs-toggle="modal"
                                        data-bs-target="#addVideocard">
                                        +
                                    </button>

                                    <div class="modal fade" id="addVideocard" tabindex="-1"
                                        aria-labelledby="addVideocardLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <!--Форма добавления-->
                                            <form action="{{ route('addVideocards') }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addVideocardLabel">Добавить Видеокарту
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <select name="cpus[]" id="cpus"
                                                            data-dropdown-parent="#addVideocard" class="js-select2"
                                                            multiple="multiple"></select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn-green">Добавить</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="w-75">Процессор</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videocards as $key => $videocard)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $videocard->pname }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!--Редактировать название видеокарты-->
                                            <button type="button" class="btn-green" data-bs-toggle="modal"
                                                data-bs-target="#editVideocard{{ $videocard->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="editVideocard{{ $videocard->id }}"
                                                tabindex="-1"
                                                aria-labelledby="editVideocards{{ $videocard->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!--Форма обновления-->
                                                        <form action="{{ route('updateVideocard', $videocard->id) }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editVideocard{{ $videocard->id }}Label">
                                                                    Редактировать "{{ $videocard->pname }}"</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="pnameVideocard{{ $videocard->id }}">Название
                                                                    жанра</label>
                                                                <input type="text"
                                                                    placeholder="Введите название видеокарты тут" required
                                                                    class="form-input" name="pname"
                                                                    id="pnameVideocard{{ $videocard->id }}"
                                                                    value="{{ $videocard->pname }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn-green">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('deleteVideocard', $videocard->id) }}"
                                                class="btn-green text-decoration-none text-light"
                                                onclick="return confirm('Подтвердите удаление')">X</a>
                                            <input type="checkbox"
                                                class="form-check-input ms-2 my-auto checkbox_videocard_select"
                                                data-product-id={{ $videocard->id }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="pills-discounts" role="tabpanel" aria-labelledby="pills-discounts-tab">
                    <!--Операционные системы-->
                    <table class="table">
                        <thead class="align-middle">
                            <tr>
                                <!--Добавить накопительную систему-->
                                <th scope="col" class="px-0">
                                    <button type="button" class="btn-green" data-bs-toggle="modal"
                                        data-bs-target="#addDiscount">
                                        +
                                    </button>

                                    <div class="modal fade" id="addDiscount" tabindex="-1"
                                        aria-labelledby="addDiscountLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <!--Форма добавления-->
                                            <form action="{{ route('addDiscount') }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addDiscountLabel">Добавить
                                                            накопительную
                                                            скидку</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="sum_buy">Общая сумма покупок</label>
                                                        <input type="integer" placeholder="1000" step="1"
                                                            class="form-input" name="sum_buy" id="sum_buy">
                                                        <label for="disocunt_procent" class="mt-3">Скидка, %</label>
                                                        <input type="integer" placeholder="1" step="1"
                                                            max="100" class="form-input" name="disocunt_procent"
                                                            id="disocunt_procent">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn-green">Добавить</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="w-75">Общая сумма покупок</th>
                                <th scope="col" class="w-75">Скидка, %</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discounts as $key => $discount)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $discount->sum_buy }}</td>
                                    <td>{{ $discount->disocunt_procent }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!--Редактировать накопительную скидку-->
                                            <button type="button" class="btn-green" data-bs-toggle="modal"
                                                data-bs-target="#editDiscount{{ $discount->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="editDiscount{{ $discount->id }}" tabindex="-1"
                                                aria-labelledby="editDiscount{{ $discount->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!--Форма обновления-->
                                                        <form action="{{ route('updateDiscount', $discount->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editOs{{ $discount->id }}Label">
                                                                    Редактировать</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="sumBuyDiscount{{ $discount->id }}">Общая сумма покупок, руб</label>
                                                                <input type="text"
                                                                    placeholder="1000" required
                                                                    class="form-input" name="sum_buy"
                                                                    id="sumBuyDiscount{{ $discount->id }}"
                                                                    value="{{ $discount->sum_buy }}">

                                                            <label for="discountPorcentDiscount{{ $discount->id }}" class="mt-3">Скидка, %</label>
                                                                <input type="text"
                                                                    placeholder="1000" required
                                                                    class="form-input" name="disocunt_procent"
                                                                    id="discountPorcentDiscount{{ $discount->id }}"
                                                                    value="{{ $discount->disocunt_procent }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn-green">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('deleteDiscount', $discount->id) }}"
                                                class="btn-green text-decoration-none text-light"
                                                onclick="return confirm('Подтвердите удаление')">X</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
