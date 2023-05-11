// слайдер
if ($('.slideshow-container').is(':visible')) {
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
}
//

// календарь
if ($('.aboutMasters').is(':visible')) {
    $.datepicker.regional['ru'] = {
        minDate: 0,
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        beforeShowDay: function (date) {
            var dayOfWeek = date.getDay();
            if (dayOfWeek == 0) {
                return [false];
            } else {
                return [true];
            }
        }
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $(document).ready(function () {
        $(".datepicker").datepicker({
            buttonText: "Выбрать дату" // "https://snipp.ru/demo/437/calendar.gif"
        });
    })
    //
}

// показать/скрыть форму записи к мастеру
$('.button_master').click(function () {
    let form = $(this).closest('.masters').children('.popup-fade');
    if (form.is(':visible')) {
        form.hide();
    } else {
        $('.popup-fade').hide();
        form.show();
        showTime();
    }
})
//

// при выборе времени блок меняет класс
$(document).on('click', '.enabled', function (e) {
    e.preventDefault();
    $(this).parent().children().removeClass('active');
    $(this).addClass('active');
    let text = $(this).text();
    $(this).parent().parent().children('.time_input').val(text);
})
//

// при выборе даты выводим время
const showTime = () => {
    $(document).off('change', '.datepicker').on('change', '.datepicker', function (e) {
        e.preventDefault();
        let th = $(this).closest('.form_feedback');
        let time = $(this).closest('.form_feedback').children('.time');
        $.ajax({
            url: 'vendor/components/time_masters.php',
            type: 'POST',
            data: th.serialize(),
            success: function (data) {
                $(time).html(data);
                $('.time').children('.enabled').first().prop('id', '');
                $(time).children('.enabled').first().prop('id', 'enabled_one');
            },
        })
    })
}
//

// появление кнопки наверх
$(document).ready(function () {
    $(window).on('scroll', function () {
        var y_scroll_pos = window.pageYOffset;
        var scroll_pos_test = 500 // Edit this number to define how far down the page the div fades in.

        if (y_scroll_pos > scroll_pos_test) {
            $('.up_but').show();
        } else {
            $('.up_but').hide();
        }
    });
});
//

// запись к мастеру

$(document).on('submit', '.form_feedback', function (e) {
    e.preventDefault();
    let th = $(this);
    let erconts = $(this).children('.erconts');
    $.ajax({
        url: 'vendor/action/carpet.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == 'err_dateerr_timeerr_serv') {
                $(erconts).html('Выберите услугу, дату и время')
            }
            if (data == 'err_timeerr_serv') {
                $(erconts).html('Выберите услугу и время')
            }
            if (data == 'err_serv') {
                $(erconts).html('Выберите услугу')
            }
            if (data == 'err_dateerr_time') {
                $(erconts).html('Выберите дату и время')
            }
            if (data == 'err_dateerr_serv') {
                $(erconts).html('Выберите дату и услугу')
            }
            if (data == 'err_time') {
                $(erconts).html('Выберите время')
            }
            if (data == 'err_date') {
                $(erconts).html('Выберите дату')
            }
            if (data == 'error') {
                $(erconts).html('На это время уже есть запись')
            }
            if (data == 'err_user') {
                $(erconts).html('Вы уже записаны на это число')
            }
            if (data == '1{"result":"error","resultfile":null,"status":null}') {
                $(erconts).html('Вы записаны')
            }
            if (data == '{"result":"success","resultfile":null,"status":null}') {
                $(erconts).html('Вы записаны')
            }
        }
    })
})
//

// чекбокс услгуи
$('.service_check').click(function () {
    let nservice = $(this).children('.nservice');
    let serviceCheck = $(this).children('.serviceCheck');
    if ($(serviceCheck).is(':checked', true)) {
        $(nservice).prop('checked', true);
    } else {
        $(nservice).prop('checked', false);
    }
})
$('.service_check').mousedown(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active')
    }
})
//

$('.button_master_aut').click(function () {
    window.location.href = 'login.php';
})

// появление ковра
// if($('.main_admin').is(':visible')){
//     $(document).ready(function(){
//         setTimeout(function () {
//             $('.main_admin').animate({'opacity':'0'},600,function(){
//                 $('.main_admin').css({"background-image": "url(https://www.rugpal.com/image_inv/1192018/3129914_main.jpg)"})
//                 $('.main_admin').animate({'opacity':'1'},600);
//             })
//         },10000)
//     })
// }


// показываем ответ админа

$('.add_rev').click(function () {
    let id = $(this).data('id');
    let rew = $('.answer_rew[data-id=' + id + ']');
    if ($(rew).is(':visible')) {
        $(rew).hide();
        $(this).val('Посмотреть ответ администратора');
    } else {
        $(rew).show();
        $(this).val('Скрыть');
    }
})

// Всплывающее окно записи к мастеру 

$(document).ready(function ($) {
    // Клик по ссылке "Закрыть".
    $('.popup-close').click(function () {
        $(this).parents('.popup-fade').fadeOut();
        return false;
    });

    // Закрытие по клавише Esc.
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-fade').fadeOut();
        }
    });

    // Клик по фону, но не по окну.
    $('.popup-fade').click(function (e) {
        if ($(e.target).closest('.popup').length == 0) {
            $(this).fadeOut();
        }
    });
});

// 

// Заявки 
if ($('.zaya').is(':visible')) {
    $(document).on('change', 'select', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let value = $(this).val();
        $.ajax({
            url: 'vendor/action/admin/zaya_upd.php',
            type: 'POST',
            data: {
                id: id,
                value: value,
            },
            success: function (data) {
                readyZaya()
            },
        })
    })

    const readyZaya = (e) => {
        let where
        let zag
        if ($('.btn_app').hasClass('active')) {
            where = '`status` = 0';
            zag = 'Активные';
        }
        if ($('.btn_suc').hasClass('active')) {
            where = '`status` = 1';
            zag = 'Завершенные';
        }
        if ($('.btn_can').hasClass('active')) {
            where = '`status` = 2';
            zag = 'Отмененные';
        }
        if (!$('.btn_href').hasClass('active')) {
            where = '`status` = 0';
            zag = 'Активные';
        }
        $.ajax({
            url: 'vendor/components/admin/zaya.php',
            type: 'POST',
            data: {
                where: where,
                zag: zag,
            },
            success: function (data) {
                $('.zaya').html(data)
            },
        })
    }

    $(document).ready(function () {
        readyZaya()
    })

    setInterval(() => readyZaya(), 20000);

    $('.btn_app').click(function (e) {
        $('.btn_href').removeClass('active')
        $(this).addClass('active')
        e.preventDefault()
        $.ajax({
            url: 'vendor/components/admin/zaya.php',
            type: 'POST',
            data: {
                where: '`status` = 0',
                zag: 'Активные',
            },
            success: function (data) {
                $('.zaya').html(data)
            },
        })
    })
    $('.btn_suc').click(function (e) {
        $('.btn_href').removeClass('active')
        $(this).addClass('active')
        e.preventDefault()
        $.ajax({
            url: 'vendor/components/admin/zaya.php',
            type: 'POST',
            data: {
                where: '`status` = 1',
                zag: 'Завершенные',
            },
            success: function (data) {
                $('.zaya').html(data)
            },
        })
    })
    $('.btn_can').click(function (e) {
        $('.btn_href').removeClass('active')
        $(this).addClass('active')
        e.preventDefault()
        $.ajax({
            url: 'vendor/components/admin/zaya.php',
            type: 'POST',
            data: {
                where: '`status` = 2',
                zag: 'Отмененные',
            },
            success: function (data) {
                $('.zaya').html(data)
            },
        })
    })
}
//