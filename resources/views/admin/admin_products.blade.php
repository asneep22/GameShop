@extends('app')

@section('titile')
    Настройки
@endsection

@section('admin-content')
    <form class="delete-product-form" data-action="{{ route('delete_many_products') }}">
        @csrf
        <input type="hidden" name="delete_products_id[]">
        <button class="delete-product-button" name="" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
            Удалить
        </button>
    </form>

    <div class="container mt-4">
        <div class="table-responisve">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col px-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-green" data-bs-toggle="modal" data-bs-target="#addProduct">
                                +
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addProductLabel">Добавить предложение</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('create_product') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!--Общая информация-->
                                                <h5 class="mb-4 text-center">Общая информация</h5>
                                                <hr>

                                                <label for="title">Название</label>
                                                <input type="text" required class="form-input mb-3 py-3" name="title"
                                                    id="title" placeholder="Введите название тут">


                                                <label for="description">Изображнние</label>
                                                <input type="file" required class="form-control mb-3" name="file"
                                                    id="file">


                                                <label for="description">Описание</label>
                                                <textarea name="description" placeholder="Введите описание тут" required class="form-input pb-5 mb-3 py-1"
                                                    id="description" cols="30" rows="10"></textarea>

                                                <label for="genre">Жанры</label>
                                                <select class="form-input js-select2 mb-3"
                                                    data-placeholder="Введите или выберите один или несколько жанров"
                                                    data-dropdown-parent="#addProduct" name="genre[]" id="genre"
                                                    multiple="multiple">
                                                    @foreach ($genres as $genre)
                                                        <option>{{ $genre->pname }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="price" class="mt-3">Цена</label>
                                                <input type="number" required step="0.01" class="form-input mb-3 py-3"
                                                    name="price" id="price" placeholder="1000">



                                                <hr>
                                                <h5 class="my-4 text-center">Системные требования</h5>
                                                <hr>

                                                <!--Системные требования-->
                                                <label for="desc_os">Операционная система</label>
                                                <select class="form-control js-select2 mb-3" required multiple="multiple"
                                                    name="desc_os[]" id="desc_os"
                                                    data-placeholder="Введите или выберите систему"
                                                    data-dropdown-parent="#addProduct">

                                                    @foreach ($oses as $os)
                                                        <option>
                                                            {{$os->pname}}
                                                        </option>
                                                    @endforeach
                                                </select>


                                                <label for="cpu" class="mt-3">Процессор</label>
                                                <select class="form-control js-select2 mb-3" required name="cpu" id="cpu"
                                                    data-placeholder="Введите или выберите процессор"
                                                    data-dropdown-parent="#addProduct">

                                                    @foreach ($cpus as $cpu)
                                                        <option>
                                                            {{$cpu->pname}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="desc_ram" class="mt-3">Оперативная память</label>
                                                <input type="number" class="form-input mb-3" required name="desc_ram" id="desc_ram"
                                                    placeholder="Введите количество требуемой оперативной памяти">

                                                <label for="videocard">Видеокарта</label>
                                                <select class="form-control js-select2 mb-3" required name="videocard"
                                                    id="videocard" data-placeholder="Введите или выберите видеокарту"
                                                    data-dropdown-parent="#addProduct">

                                                    @foreach ($videocards as $videocard)
                                                        <option>
                                                            {{$videocard->pname}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="desc_memory" class="mt-3">Память</label>
                                                <input type="number"
                                                    placeholder="Введите количество требуемого места на жестком диске"
                                                    class="form-input mb-3" required name="desc_memory" id="desc_memory">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn-green">Добавить</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Жанр</th>
                        <th scope="col">Цена, руб</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <!-- Порядковый номер -->
                            <th scope="row">{{ $key + 1 }}</th>
                            <!-- Навзвание -->
                            <td>{{ $product->title }}</td>
                            <!-- Описание -->
                            <td>
                                <p class="p-0 m-0">{{ $product->description }}</p>
                            </td>
                            <!-- Жанры -->
                            <td>
                                <div class="d-flex flex-wrap">
                                    @foreach ($product->genres as $genre)
                                        <p class="p-0 m-0 pe-1">{{ $genre->pname . ', ' }}</p>
                                    @endforeach
                                </div>
                            </td>
                            <!-- Цена -->
                            <td>{{ $product->price }}</td>
                            <!-- Действия -->
                            <td>
                                <div class="btn-group">
                                    <!-- Редактирование -->
                                    <button type="button" class="btn-green p-2" data-bs-toggle="modal"
                                        data-bs-target="#productEdit{{ $product->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>

                                    <div class="modal fade" id="productEdit{{ $product->id }}" tabindex="-1"
                                        aria-labelledby="productEdit{{ $product->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productEdit{{ $product->id }}Label">
                                                        Редактировать {{ $product->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update_product', $product->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <!--Общая информация-->
                                                        <h5 class="mb-4 text-center">Общая информация</h5>
                                                        <hr>
                                                        <label for="title{{ $product->id }}">Название</label>
                                                        <input type="text" required class="form-input mb-3 py-3"
                                                            name="title" id="title{{ $product->id }}"
                                                            value="{{ $product->title }}">


                                                        <label for="description{{ $product->id }}">Изображение</label>
                                                        <input type="file" class="form-control" name="file"
                                                            id="file{{ $product->id }}">
                                                        <div class="w-100 mt-3 mb-3 d-flex" style="max-height: 20rem">
                                                            <img src="{{ URL::asset('/storage/' . $product->file_path) }}"
                                                                class="img-fluid m-auto" alt="">
                                                        </div>

                                                        <label for="description{{ $product->id }}">Описание</label>
                                                        <textarea name="description" required class="form-input pb-5 mb-3 py-1" id="description{{ $product->id }}"
                                                            cols="30" rows="10">{{ $product->description }}</textarea>

                                                        <label for="price{{ $product->id }}">Цена</label>
                                                        <input type="number" required step="0.01"
                                                            class="form-input mb-3 py-3" name="price"
                                                            id="price{{ $product->id }}"
                                                            value="{{ $product->price }}">

                                                        <label for="genre{{ $product->id }}">Жанры</label>
                                                        <select class="form-input js-select2 mb-3" name="genre[]"
                                                            id="genre{{ $product->id }}" multiple="multiple"
                                                            data-placeholder="Введите или выберите один или несколько жанров"
                                                            data-dropdown-parent="#productEdit{{ $product->id }}">
                                                            @foreach ($genres as $genre)
                                                                <option
                                                                    {{ $product->genres->where('id', '=', $genre->id)->first() ? 'selected' : '' }}>
                                                                    {{ $genre->pname }}</option>
                                                            @endforeach
                                                        </select>

                                                        <!--Системные требования-->
                                                        <hr>
                                                        <h5 class="mb-4 text-center">Системные требования</h5>
                                                        <hr>
                                                        <!--Системные требования-->
                                                        <label for="desc_os{{ $product->id }}">Операционная система</label>
                                                        <select class="form-control js-select2 mb-3" multiple="multiple"
                                                            name="desc_os[]" id="desc_os{{ $product->id }}"
                                                            data-placeholder="Введите или выберите систему"
                                                            data-dropdown-parent="#productEdit{{ $product->id }}">

                                                            @foreach ($oses as $os)
                                                            <option {{ $product->oses->where('id', '=', $os->id)->first() ? 'selected' : '' }}>
                                                                {{$os->pname}}
                                                            </option>
                                                        @endforeach
                                                        </select>


                                                        <label for="cpu{{ $product->id }}" class="mt-3">Процессор</label>
                                                        <select class="form-control js-select2 mb-3" name="cpu"
                                                            id="cpu{{ $product->id }}"
                                                            data-placeholder="Введите или выберите процессор"
                                                            data-dropdown-parent="#productEdit{{ $product->id }}">

                                                            @foreach ($cpus as $cpu)
                                                            <option {{$product->cpu->id == $cpu->id ? 'selected':'' }}>
                                                                {{$cpu->pname}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <label for="desc_ram{{ $product->id }}" class="mt-3">Оперативная память</label>
                                                        <input type="number" class="form-input mb-3" name="desc_ram"
                                                            id="desc_ram{{ $product->id }}"
                                                            placeholder="Введите количество требуемой оперативной памяти" value="{{$product->desc_ram}}">

                                                        <label for="videocard{{ $product->id }}">Видеокарта</label>
                                                        <select class="form-control js-select2 mb-3" name="videocard"
                                                            id="videocard{{ $product->id }}"
                                                            data-placeholder="Введите или выберите видеокарту"
                                                            data-dropdown-parent="#productEdit{{ $product->id }}">
                                                            @foreach ($videocards as $videocard)
                                                            <option {{$product->videocard->id == $videocard->id ? 'selected':'' }}>
                                                                {{$videocard->pname}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <label for="desc_memory{{ $product->id }}" class="mt-3">Память</label>
                                                        <input type="number"
                                                            placeholder="Введите количество требуемого места на жестком диске"
                                                            class="form-input mb-3" name="desc_memory" id="desc_memory{{ $product->id }}" value="{{$product->desc_memory}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Переход на страницу в магазине -->
                                    <a href="" class="btn-green p-2 text-decoration-none text-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                        </svg>
                                    </a>

                                    <!-- Удаление -->
                                    <form action="{{ Route('delete_product', $product->id) }}"
                                        onsubmit="return confirm('Are you sure?')" class="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-green p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Чекбокс -->
                                    <input type="checkbox"
                                        class="form-check-input checkbox_product_select m-auto p-2 ms-2"
                                        data-product-id="{{ $product->id }}">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    {{ $products->withQueryString()->links() }}
@endsection
