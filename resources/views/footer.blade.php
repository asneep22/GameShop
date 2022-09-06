<!-- Светлая тема -->


<footer class="mb-0 m-auto blue-background py-4 container-fluid text-light">

    <div class="d-flex flex-column container">

        <div class="d-flex flex-column flex-sm-row justify-content-between mx-auto mx-sm-0">

            {{-- Магазин --}}
            <div class="d-flex flex-column px-3 text-center text-sm-start mb-3">
                <h5 class="ts">Магазин</h5>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Главная</a>
                </div>
                <div>
                    <a href="{{ route('page_all_products') }}" class="mb-2 text-light hvr-grow">Ключи</a>
                </div>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Возврат</a>
                </div>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Оферта</a>
                </div>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Обработка данных</a>
                </div>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">О магазине</a>
                </div>
            </div>

            {{-- Выгода --}}
            <div class="d-flex flex-column px-3 text-center text-sm-start mb-3">
                <h5 class="ts">Выгода</h5>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Игры со скидками</a>
                </div>
                <div>
                    <a href="{{ route('page_welcome') }}" class="mb-2 text-light hvr-grow">Накопительная скидка</a>
                </div>
            </div>

            {{-- Контакты --}}
            <div class="d-flex flex-column px-3 text-center text-sm-start mb-3">
                <h5 class="ts">Контакты</h5>
                <p class="mb-2">email: {{ getenv('MAIL_FROM_ADDRESS') }}</p>
                <p class="mb-2">vk:
                    <a href="{{ route('page_welcome') }}" class="text-light hvr-grow ts">Клик</a>
                </p>
            </div>

            {{-- Подписаться на рассылку --}}
            <div class="d-flex flex-column px-3 text-center text-sm-start mb-3">
                <h5 class="ts">Рассылка</h5>
                <form action="#">
                    <input type="email" class="form-input mb-2" maxlength="50" name="email" id="email" placeholder="Email">
                    <button type="submit" class="btn-green hvr-glow">Подключить</button>
                </form>
            </div>
        </div>

        <div class="pt-3 text-center">
            <small>Все права защищены. Все названия продуктов, игр, компаний, марок, логотипов,
                товарных знаков и другх материалов являются собственностью соответствующих владельцев.</small>
        </div>

    </div>

</footer>
