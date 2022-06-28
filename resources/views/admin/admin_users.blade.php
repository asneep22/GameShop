@extends('app')

@section('page_title')
    Управление пользовтелями
@endsection

@section('admin-content')
    <div class="container mt-4 m-auto">
        <div class="table-responsive">
            <table class="table">
                <thead class="align-middle">
                    <tr>
                        <th scope="col" class="text-start p-0">
                            <!-- Button trigger modal -->
                            <div class="btn-group">
                                <button type="button" class="btn-green m-0" data-bs-toggle="modal"
                                    data-bs-target="#UserModel">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>

                                <form action="">
                                    <button type="submit" class="btn btn-green rounded-0 m-0" data-bs-target="#UserModel">
                                        x
                                    </button>
                                </form>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="UserModel" tabindex="-1" aria-labelledby="UserModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content rounded-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="UserModalLabel">Поиск</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="get">
                                                @csrf
                                                <label for="search">Ключевое слово</label>
                                                <input type="search" name="search" id="search" class="form-input">
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn-green py-2 px-2 rounded-0">Применить</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </th>
                        <th scope="col">Email</th>
                        <th scope="col">Последнее посещение сайта</th>
                        <th scope="col">Всего куплено игр</th>
                        <th scope="col">Общая сумма покупок</th>
                        <th scope="col">Действия</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <th scope="row" class="text-start">
                                {{ $key + ($paginator_props['current_page'] - 1) * $paginator_props['per_page'] + 1 }}
                            </th>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->last_online_at->format('d.m.Y') }}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <!-- Button trigger modal -->
                                <div class="btn-group">
                                    <button type="button" class="btn-green m-0" data-bs-toggle="modal"
                                        data-bs-target="#UserModelInfo{{$item->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                          </svg>
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="UserModelInfo{{$item->id}}" tabindex="-1" aria-labelledby="UserModelInfolLabel{{$item->id}}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="UserModelInfoLabel{{$item->id}}">Информация о пользователе: {{$item->email}}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Подтверждение почты: Да</p>
                                                <p>Пользовател приобрел 0 игр на общую сумма 0руб.</p>
                                                <p>Пользовател приобрел следующие игры:</p>
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">№</th>
                                                        <th scope="col">Назвазние игры</th>
                                                        <th scope="col">Цена</th>
                                                        <th scope="col">Чек</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </div>
@endsection
@section('content')
@endsection
