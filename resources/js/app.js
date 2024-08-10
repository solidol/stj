import './bootstrap';

$(window).on('load', function () {
    $('body').addClass('loaded_hiding');
    window.setTimeout(function () {
        $('body').addClass('loaded');
        $('body').removeClass('loaded_hiding');
    }, 800);
});

$('a').on('click', function () {
    $('body').removeClass('loaded');
    $('body').addClass('loaded_hiding');
    href = $(this).attr('href');
    window.setTimeout(function () {
        //location.href = href;
    }, 200);
});