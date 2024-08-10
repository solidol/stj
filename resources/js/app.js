import './bootstrap';

$(window).on('load', function () {
    $('body').addClass('loaded_hiding');
    window.setTimeout(function () {
        $('body').addClass('loaded');
        $('body').removeClass('loaded_hiding');
    }, 800);
});

$('a').on('click', function () {
    $('body').addClass('loaded_hiding');
    window.setTimeout(function () {
        location.href = $(this).attr('href');
    }, 200);
});