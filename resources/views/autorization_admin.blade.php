@extends('app')
@section('page_title')
    Администрирование
@endsection

@section('content')

    <div class="container m-auto">
        <form action="" method="POST" class="shadow mb-5 bg-white rounded m-auto d-flex reg-form flex-column reg-form"
            autocomplete="off">
            <div class="mb-1">
                <img class="reg-img"
                    src="https://eus-www.sway-cdn.com/s/eAXNCxA6C8FfqDpz/images/qap49FWfYM9OV9?quality=1920&allowAnimation=true"
                    alt="">
            </div>

            <div class="form-group p-3 d-flex flex-column">
                <label for="login" class="ms-1">Логин</label>
                <input type="text" class="form-input mb-3" name="login" id="login">

                <label for="password" class="ms-1">Пароль</label>
                <input type="password" class="form-input" name="password" id="password">
                <hr>
                <button type="submit" class="m-auto btn-green"><span class="">Войти</span></button>
            </div>
        </form>
    </div>
@endsection
