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
            </div>


            <div class="d-flex flex-column px-3 text-center text-sm-start mb-3">
                <h5 class="ts">Информация</h5>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#organizationInfo" class="mb-2 text-light hvr-grow">О магазине</a>
                </div>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#returnProducts" class="mb-2 text-light hvr-grow">Возврат</a>
                </div>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#accumaltiveDiscount" class="mb-2 text-light hvr-grow">Накопительная скидка</a>
                </div>
                <div>
                    <a href="{{ route('open_offert') }}" class="mb-2 text-light hvr-grow">Оферта</a>
                </div>
                <p class="mb-2">Регион: Россия</p>
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
                    <input type="email" class="form-input mb-2" maxlength="50" name="email" id="email"
                        placeholder="Email">
                    <button type="submit" class="btn-green hvr-glow">Подключить</button>
                </form>
            </div>
        </div>

        <div class="pt-3 text-center">
            <small>Все права защищены. Все названия продуктов, игр, компаний, марок, логотипов,
                товарных знаков и другх материалов являются собственностью соответствующих владельцев.</small>
        </div>
    </div>

        <!-- Модальное окно информации про возврат -->
        <div class="modal fade text-dark" id="returnProducts" tabindex="-1" aria-labelledby="returnProductsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="returnProductsModalLabel">Возврат</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Информация про возврат
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Модальное окно информации про магазин -->
    <div class="modal fade text-dark" id="organizationInfo" tabindex="-1" aria-labelledby="organizationInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="organizationInfoModalLabel">О магазине</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Сайт {{env("APP_NAME")}} является интернет-магазином предоставляющий возможность покупки цифровых товаров(кючи активации компьютерных игр) для пользователя. Сайт работает на территории СНГ.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Модальное окно информации про накопительную скидку -->
        <div class="modal fade text-dark" id="accumaltiveDiscount" tabindex="-1" aria-labelledby="accumaltiveDiscountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="accumaltiveDiscountoModalLabel">Накопительная скидка</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Информация про накопительную скидку
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-green hvr-grow" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

</footer>
