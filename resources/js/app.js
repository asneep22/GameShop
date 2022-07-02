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

    $('.js-select2').select2({
        tags: true,
        language: "ru",
        tokenSeparators: [','],
    });

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
        e.preventDefault();
        var url = $(this).attr('data-action');

        var $req = $.ajax({
            url: url,
            type: "post",
            data: {
                delete_products_id: $delete_products_id,
            },
            success: function (data) {
                console.log('delete products is ok');
            }
        }).then((result) => {
            location.reload();
        });

    });
});
