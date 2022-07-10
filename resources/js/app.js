import $ from 'jquery';
import './bootstrap';
import 'bootstrap';
import 'select2';
import 'ajax';

window.$ = window.jQuery = $;
window.$ = require('jquery');


$(function () {
    $('.delete-keys-button').fadeOut()


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $delete_products_id = [];
    var $delete_genres_id = [];
    var $delete_oses_id = [];
    var $delete_cpus_id = [];
    var $delete_videocards_id = [];
    var $delete_keys_id = [];

    $('.js-select2').select2({
        tags: true,
        language: "ru",
        tokenSeparators: [','],
    });

    //Увеличение количества ключей и подсчет итоговой цены
    $('.shop_cart_input').change(function () {
        let total_price = 0;
        this.value == 1 ? $('.shop_cart_title' + $(this).attr('data-id')).html($(this).attr('data-game-title')) : $('.shop_cart_title' + $(this).attr('data-id')).html($(this).attr('data-game-title') + ' X' + this.value)
        var shop_cart_inputs = $('.shop_cart_input');
        for (let index = 0; index < shop_cart_inputs.length; index++) {
            total_price += shop_cart_inputs[index].getAttribute('data-price') * shop_cart_inputs[index].value;
        }
        $('.finish_price').html("Итоговая цена: " + total_price + "р");
    });



    //Массовое удаление записей товаров
    $('.checkbox_product_select').click(function (e) {
        this.checked ? $delete_products_id.push($(this).attr('data-product-id')) :
            $delete_products_id.splice($delete_products_id.indexOf($(this).attr('data-product-id')));

        if ($delete_products_id.length === 0) {
            $('.delete-product-button').fadeOut()
        } else if ($delete_products_id.length === 1) {
            $('.delete-product-button').fadeIn()
        }
    });

    $('.delete-product-form').on('submit', function (e) {
        if (confirm('Подтвердите удаление')) {
            e.preventDefault();
            var url = $(this).attr('data-action');

            var $req = $.ajax({
                url: url,
                type: "post",
                data: {
                    delete_products_id: $delete_products_id,

                },
                success: function (data) {
                    console.log('ok');
                }
            }).then((result) => {
                location.reload();
            });
        }
    });

    //Массовое удаление записей справочников

    //Добавление выбранных жанров в масси для удаления
    $('.checkbox_genre_select').click(function (e) {
        this.checked ? $delete_genres_id.push($(this).attr('data-product-id')) :
            $delete_genres_id.splice($delete_genres_id.indexOf($(this).attr('data-product-id'), 1));

        if ($delete_genres_id.length < 1 && $delete_oses_id.length < 1 && $delete_cpus_id < 1 && $delete_videocards_id < 1) {
            $('.delete-product-button').fadeOut()
        } else if ($delete_genres_id.length >= 1 || $delete_oses_id.length >= 1 || $delete_cpus_id >= 1 || $delete_videocards_id >= 1) {
            $('.delete-product-button').fadeIn()
        }
    });

    //Добавление выбранных операционных систем для удаления
    $('.checkbox_os_select').click(function (e) {
        this.checked ? $delete_oses_id.push($(this).attr('data-product-id')) :
            $delete_oses_id.splice($delete_oses_id.indexOf($(this).attr('data-product-id'), 1));

        if ($delete_genres_id.length < 1 && $delete_oses_id.length < 1 && $delete_cpus_id < 1 && $delete_videocards_id < 1) {
            $('.delete-product-button').fadeOut()
        } else if ($delete_genres_id.length >= 1 || $delete_oses_id.length >= 1 || $delete_cpus_id >= 1 || $delete_videocards_id >= 1) {
            $('.delete-product-button').fadeIn()
        }
    });

    //Добавление выбранных процессоров для удаления
    $('.checkbox_cpu_select').click(function (e) {
        this.checked ? $delete_cpus_id.push($(this).attr('data-product-id')) :
            $delete_cpus_id.splice($delete_cpus_id.indexOf($(this).attr('data-product-id'), 1));

        if ($delete_genres_id.length < 1 && $delete_oses_id.length < 1 && $delete_cpus_id < 1 && $delete_videocards_id < 1) {
            $('.delete-product-button').fadeOut()
        } else if ($delete_oses_id.length >= 1 || $delete_oses_id.length >= 1 || $delete_cpus_id >= 1 || $delete_videocards_id >= 1) {
            $('.delete-product-button').fadeIn()
        }
    });

    //Добавление выбранных видеокард для удаления
    $('.checkbox_videocard_select').click(function (e) {
        this.checked ? $delete_videocards_id.push($(this).attr('data-product-id')) :
            $delete_videocards_id.splice($delete_videocards_id.indexOf($(this).attr('data-product-id'), 1));

        if ($delete_genres_id.length < 1 && $delete_oses_id.length < 1 && $delete_cpus_id < 1 && $delete_videocards_id < 1) {
            $('.delete-product-button').fadeOut()
        } else if ($delete_genres_id.length >= 1 || $delete_oses_id.length >= 1 || $delete_cpus_id >= 1 || $delete_videocards_id >= 1) {
            $('.delete-product-button').fadeIn()
        }
    });


    //Добавление выбранных ключей для удаления
    $('.checkbox_keys_select').click(function (e) {
        this.checked ? $delete_keys_id.push($(this).attr('data-product-id')) :
            $delete_keys_id.splice($delete_keys_id.indexOf($(this).attr('data-product-id'), 1));
        if ($delete_keys_id.length < 1) {
            $('.delete-keys-button').fadeOut()
        } else if ($delete_keys_id.length >= 1) {
            $('.delete-keys-button').fadeIn()
        }
    });

    $('.delete-direcories-form').on('submit', function (e) {
        if (confirm('Подтвердите удаление')) {
            e.preventDefault();
            var url = $(this).attr('data-action');

            $.ajax({
                url: url,
                type: "post",
                data: {
                    delete_genres_id: $delete_genres_id,
                    delete_oses_id: $delete_oses_id,
                    delete_cpus_id: $delete_cpus_id,
                    delete_videocards_id: $delete_videocards_id,
                },
                success: function (data) {
                    console.log('ok');
                }
            }).then((result => {
                location.reload();
            }));

        }
    });

    $('.delete-keys-form').on('submit', function (e) {
        if (confirm('Подтвердите удаление')) {
            e.preventDefault();
            var url = $(this).attr('data-action');

            $.ajax({
                url: url,
                type: "post",
                data: {
                    delete_keys_id: $delete_keys_id,
                },
                success: function (data) {
                    console.log('ok');
                }
            }).then((result => {
                location.reload();
            }));
        }
    });

});
