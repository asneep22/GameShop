@extends('app')

@section('titile')
    Администраторы
@endsection

@section('admin-content')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                        <th scope="col" class="px-0">
                            @if (Auth::user()->role->id == 1)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-green" data-bs-toggle="modal" data-bs-target="#AddNewAdmin">
                                +
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="AddNewAdmin" tabindex="-1" aria-labelledby="AddNewAdminLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="AddNewAdminLabel">Добавить администратора</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('create_admin')}}" method="POST" class="d-flex flex-column">
                                                @csrf
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-input py-3 mb-3" id="email" autocomplete="off" required>

                                                <label for="password">Пароль</label>
                                                <input type="password" name="password" class="form-input py-3 mb-3" id="password" required>

                                                <label for="password_confirmation">Подтвердите пароль</label>
                                                <input type="password" name="password_confirmation" class="form-input py-3 mb-3" id="password_confirmation" required>

                                                <label for="role_id">Подтвердите пароль</label>
                                                <select class="form-input mb-3" name="role_id" id="role_id" style="height: 2.5rem" aria-label="Default select example">
                                                    @foreach ($roles as $role)
                                                    <option selected value="{{$role->id}}">{{$role->role}}</option>
                                                    @endforeach
                                                  </select>
                                                <hr>

                                                <button type="submit" class="btn-green px-4 py-2 m-auto me-0">Создать</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            №
                    @endif

                    </th>
                    <th scope="col">Email</th>
                    <th scope="col">Роль</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Телефон</th>
                    @if (Auth::user()->role->id == 1)
                        <th scope="col">Действия</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $key => $admin)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role->role }}</td>
                        <td>{{ $admin->fio ? $admin->fio : 'Не указано' }}</td>
                        <td>{{ $admin->phone ? $admin->phone : 'Не указано' }}</td>
                        @if (Auth::user()->role->id == 1)
                            <td>
                                @if($admin->id != 1 && $admin->id != Auth::id())
                                <div class="btn-group">
                                        <a href="{{Route('delete_user', $admin->id)}}" class="text-decoration-none btn-green text-light w-100">X</a>
                                </div>
                                @else
                                -
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
