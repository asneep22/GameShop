import $ from 'jquery';
import './bootstrap';
import 'bootstrap';
import 'select2';
import 'ajax';

window.$ = window.jQuery = $;
window.$ = require('jquery');


$(function () {

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

    $('.js-select2').select2({
        tags: true,
        language: "ru",
        tokenSeparators: [','],
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
                    alert($delete_products_id);
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
});
