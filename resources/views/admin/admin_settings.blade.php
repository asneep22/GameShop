@extends('app')

@section('titile')
    Настройки
@endsection

@section('admin-content')
    <div class="container d-flex flex-column mt-4">
        <div class="text-center w-100">
            <h4>Настройки</h4>
            <hr>
        </div>

        <form action="{{ route('AdminSettingUpd', Auth::id()) }}" class="w-50 m-auto" method="post">
            @csrf
            <div class="d-flex flex-column mx-sm-auto mx-xxl-0">
                <h5 class="mb-3">Основные сведения</h5>
                <label for="fio" class="mb-1">ФИО</label>
                <input type="text" name="fio" id="fio" class="form-input mb-3" autocomplete="off"
                    placeholder="Иван Иванов Иванович" value="{{ Auth::user()->fio != null ? Auth::user()->fio : '' }}">

                <label for="phone" class="mb-1">Номер телефона</label>
                <input type="text" name="phone" id="phone" class="form-input mb-4" autocomplete="off"
                    placeholder="+79876543210" value="{{ Auth::user()->phone != null ? Auth::user()->phone : '' }}">

                <h5 class="mb-3">Изменение почты и пароля</h5>
                <label for="email" class="mb-1">Почта</label>
                <input type="email" name="email" id="email" class="form-input mb-3" autocomplete="off"
                    placeholder="examle@examle.ru" value="{{ Auth::user()->email }}" required>

                <h5 class="mb-3">Дополнительные сведения</h5>
                <p>Роль: {{ Auth::user()->role->role }}</p>
                <hr>

                <button type="submit" class="btn-green m-auto px-5">Сохранить</button>
            </div>
        </form>

    </div>
@endsection
