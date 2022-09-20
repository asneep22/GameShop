@extends('app')

@section('page_title')
    Авторизация
@endsection

@section('page_descr')
Страница авторизации
@endsection

@section('content')
    <div class="container mx-auto d-flex flex-column" style="margin-top:11rem">
        <div class="form-reg-auth d-flex m-auto shadow bg-white rounded pt-2 my-5">
            <div class="d-flex flex-column m-auto" id="auth">
                <h5 class="m-auto mb-2">Авторизация</h5>
                <form action="{{ route('login_user') }}" method="POST" id="auth-form" class="m-auto reg-form"
                    autocomplete="off">
                    @csrf
                    <div class="form-group p-3 m-auto d-flex flex-column">
                        <input type="email" required class="form-input mb-3" name="email" id="email" placeholder="Email">
                        <p id="authInfo" style="display: none">Почта не найдена, для создания аккаунта вам необхожимо купить хотя бы одну игру. После покупки аккаунт автоматически буедт создан.</p>
                        <hr>
                        <button type="submit" class="m-auto btn-blue hvr-grow"><span>Войти</span></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Модальное окно -->
        <div class="modal fade" id="AuthSuccessModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Заголовок модального окна</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Понял</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
