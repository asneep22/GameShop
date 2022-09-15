import $ from 'jquery';
import './message';
import 'select2';
import 'ajax';
import 'bootstrap';
import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import 'particles.js/particles';
import 'daterangepicker/daterangepicker'
AOS.init();

window.$ = window.jQuery = $;
window.$ = require('jquery');

window.AOS = require('aos');
AOS.init();

const particlesJS = window.particlesJS;

$.fn.toggleHTML = function (t1, t2) {
    if (this.html() == t1) {
        this.html(t2);
    } else {
        this.html(t1);
    }
    return this;
};

//date
$('.discount-period').daterangepicker({
    "showDropdowns": true,
    'autoUpdateInput': false,
    "showWeekNumbers": true,
    "autoApply": true,
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Вс",
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб"
        ],
        "monthNames": [
            "Январь",
            "Февраль",
            "Март",
            "Парель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ],
        "firstDay": 1
    },
    "startDate": "07/22/2022",
    "endDate": "07/28/2022",
    "opens": "center",
    "drops": "auto",
    "cancelClass": "btn-clear"
}, function (start, end, label) {
    console.log('New date range selected: ' + start.format('DD.MM.YYYY') + ' to ' + end.format('DD.MM.YYYY') + ' (predefined range: ' + label + ')');
});

$('.discount-period').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
});

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
    var total_price = 0;

    function UpdateTotalPrice() {
        let shop_cart_inputs = $('.shop_cart_input');
        total_price = 0;
        for (let index = 0; index < shop_cart_inputs.length; index++) {
            total_price += (shop_cart_inputs[index].getAttribute('data-price') - (shop_cart_inputs[index].getAttribute('data-price') / 100 * shop_cart_inputs[index].getAttribute('data-discount'))) * shop_cart_inputs[index].value;
        }
        $('.finish_price').html("Итоговая цена: " + total_price + "р");
    }

    $('#auth-form').submit(function () {
        let url = $(this).attr('action');
        let formData = {
            email: $(this).find("input[name=email]").val(),
        }
        $('#authInfo').hide('fast');
        $.ajax({
            url: url,
            type: "post",
            data: formData,
            beforeSend: function (data) {
                $('#authInfo').html("На указанную почту было выслано письмо с ссылкой входа в аккаунт. Для завершения процесса авторизации перейдтите по ссылке в письме.");
            }
        }).catch(function (e) {
            $('#authInfo').html("Почта не найдена, для создания аккаунта вам необхожимо купить хотя бы одну игру. После покупки аккаунт автоматически буедт создан.");
        })
        $('#authInfo').show('fast');
        return false;
    });

    $('.js-select2').select2({
        tags: true,
        language: "ru",
        tokenSeparators: [','],
    });

    $('.clear-select2').val(null).trigger("change");

    $('.product_add_to_shop_cart_button').click(function () {
        var url = $(this).attr('data-url');
        var svgPathId = '#' + $(this).attr('data-out-card-path');
        var svgOutCartPathId = '#' + $(this).attr('data-path');
        var startText = "В корзину";
        var changeText = $(this).attr('data-new-text');
        if (changeText) {
            $(this).toggleHTML(startText, changeText)

        }
        if (svgPathId && svgOutCartPathId) {
            $(svgPathId).animate({ opacity: 'toggle' }, 'fast');
            $(svgOutCartPathId).animate({ opacity: 'toggle' }, 'fast');
        }
        $('.message').html("Корзина обновлена");
        $.ajax({
            url: url,
            type: "post",

            success: function (data) {
                $('#shopping_cart_products_count').html(data > 0 ? data : '');
            }
        });
    });

    $('.remove_produt_from_cart_btn').click(function () {
        let url = $(this).attr('data-url');
        let card = '#' + $(this).attr('data-card-id');
        let info = '#' + $(this).attr('data-info-id');
        let input = '#' + $(this).attr('data-input-id');
        let price = $(input).attr('data-price');
        let discount = $(input).attr('data-discount');
        let value = $(input).val();
        total_price -= (price - (price / 100 * discount)) * value;
        $(card).remove();
        $(info).remove();
        let new_cart_games_count = $('#cart_games_cont').val() - 1;
        $('#cart_games_cont').val(new_cart_games_count);
        $('#cart_games_cont').html(new_cart_games_count);
        UpdateTotalPrice();
        $('.message').html("Корзина обновлена");
        $.ajax({
            url: url,
            type: "post",
            success: function (data) {
                $('#shopping_cart_products_count').html(data > 0 ? data : '');
            }
        });
    });

    //Увеличение количества ключей и подсчет итоговой цены
    $('.shop_cart_input').change(function () {
        this.value == 1 ? $('.shop_cart_title' + $(this).attr('data-id')).html($(this).attr('data-game-title')) : $('.shop_cart_title' + $(this).attr('data-id')).html($(this).attr('data-game-title') + ' X' + this.value);
        UpdateTotalPrice();
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

    $('.btnsrc').click(function () {

        var src = $('.src');
        src.toggleClass('formin').toggleClass('formin-h');

    })

    $('.btnsrcf').click(function () {
        var src = $('.srcf');
        src.toggleClass('formin').toggleClass('formin-h');
    })

    $('.search').on('input', function () {

        var url = $(this).attr('data-url');
        var storage_url = $(this).attr('data-storage-url');
        if ($('.search').val().length > 0) {
            $('.search-box').show("fast");
        } else {
            $('.search-box').hide("fast");
        }

        $.ajax({
            url: url,
            type: "get",
            data: {
                title: $(this).val(),
            },
            success: function (data) {
                $('.search-box').html('');
                data.forEach(game => {
                    $('.search-box').append(
                        "<div class='d-flex flex-column hvr-underline-from-left underline-blue' style='cursor: pointer;' id=game" + game['id'] + ">" +
                        "<div class='d-flex w-100 p-1' style='min-height:5rem'>" +
                        "<div class='search-box-image' style='background: url(" + storage_url + '/' + game['file_path'] + ")'>" +
                        "</div>" +
                        "<p class='my-auto text-start ps-2 w-100'>" + game['title'] + "</p>" +
                        "<div class='me-2 m-auto d-flex justify-content-end w-50' id='gamePrice" + game['id'] + "'>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='gradient p-0 m-0'>");
                    "</div>"

                    if (game['discount_price'] != 0) {
                        $('#gamePrice' + game['id']).append(
                            "<div class='discount-small py-1' style='width:3rem'>" +
                            "-" + (100 - (100 / (game['price'] / game['discount_price']))) +
                            "%</div >").addClass('w-100')
                    }

                    $('#gamePrice' + game['id']).append(
                        "<div style='width:4rem' class='my-auto'>" +
                        (game['discount_price'] == 0 ? game['price'] : game['discount_price']) + "р" +
                        "</div>" +
                        "</div>");
                    $('#game' + game['id']).click(function () {
                        RedirectToProduct(game['id']);
                    });
                    console.log(game['title']);
                });
            }
        })
    });

    $(document).mouseup(function (e) {
        var container = $('.search-box');
        if (container.has(e.target).length === 0) {
            $('.search').val("");
            container.hide('fast');
        }
    });

    function RedirectToProduct(product_id) {
        return window.location.href = 'product/' + product_id;
    }
});



particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 15,
            "density": {
                "enable": true,
                "value_area": 1000
            },
        },
        "color": {
            "value": ["#5573ff", "#ff9b00"],
        },
        "shape": {
            "type": "edge",
            "stroke": {
                "width": 0,
                "color": ["#5573ff", "#ff9b00"],
            },
            "polygon": {
                "nb_sides": 0,
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 12,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 0,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 2,
            "direction": "top",
            "random": true,
            "straight": true,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": true,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": false,
                "mode": "grab"
            },
            "onclick": {
                "enable": false,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 40,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": false
});

var myElement = document.querySelector("header");
var headroom = new Headroom(myElement);
headroom.init();
