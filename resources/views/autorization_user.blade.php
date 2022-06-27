@extends('app')

@section('page_title')
    Авторизация
@endsection

@section('content')
    <div class="container m-auto d-flex flex-column">
        <div class="form-reg-auth m-auto shadow mb-5 bg-white rounded">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="auth_tab" data-bs-toggle="tab" data-bs-target="#auth" type="button"
                        role="tab" aria-controls="auth" aria-selected="true">Авторизация</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Регистрация</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="auth" role="tabpanel" aria-labelledby="auth_tab">
                    <form action="{{route('login')}}" method="POST" class="m-auto d-flex reg-form flex-column reg-form"
                        autocomplete="off">
                        @csrf
                        <div class="mb-1">
                            <img class="reg-img"
                                src="https://eus-www.sway-cdn.com/s/eAXNCxA6C8FfqDpz/images/qap49FWfYM9OV9?quality=1920&allowAnimation=true"
                                alt="">
                        </div>

                        <div class="form-group p-3 d-flex flex-column">
                            <label for="email" class="ms-1">Email</label>
                            <input type="text"  required class="form-input mb-3" name="email" id="email">

                            <label for="password" class="ms-1">Пароль</label>
                            <input type="password" required class="form-input" name="password" id="password">
                            <hr>
                            <button type="submit" class="m-auto btn-green"><span class="">Войти</span></button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{route('register_user')}}" method="POST" class="m-auto d-flex reg-form flex-column reg-form"
                        autocomplete="off">
                        @csrf
                        <div class="mb-1">
                            <img class="reg-img"
                                src="https://eus-www.sway-cdn.com/s/eAXNCxA6C8FfqDpz/images/qap49FWfYM9OV9?quality=1920&allowAnimation=true"
                                alt="">
                        </div>

                        <div class="form-group p-3 d-flex flex-column">
                            <label for="email" class="ms-1">Email</label>
                            <input type="text" required class="form-input mb-3" name="email" id="email">

                            <label for="password" class="ms-1">Пароль</label>
                            <input type="password" required class="form-input mb-3" name="password" id="password">

                            <label for="email" class="ms-1">Подтвердите пароль</label>
                            <input type="password" required class="form-input mb-3" name="password_confirmation" id="password_confirmation">
                            <hr>
                            <button type="submit" class="m-auto btn-green"><span class="">Войти</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
