import './bootstrap';

$(window).on('load', function () {
    
    $('body').addClass('loaded_hiding');
    window.setTimeout(function () {
        $('body').addClass('loaded');
        $('body').removeClass('loaded_hiding');
    }, 800);
});

$('a:not(.no-prevent)').on('click', function (event) {
    event.preventDefault();
    $('body').addClass('loaded_hiding');
    $('body').removeClass('loaded');
    window.location.href = $(this).attr('href');

});