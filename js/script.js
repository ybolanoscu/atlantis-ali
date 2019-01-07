$(document).ready(function () {
    $('ul.dropdown-menu.dropdown-big > li:first-child').addClass('hover');
    $('ul.dropdown-menu.dropdown-big > li').each(function () {
        if ($(this).find('> ul').length === 0)
            $(this).closest('.dropdown-big').removeClass('dropdown-big');
    });
    $('ul.dropdown-big').closest('li').css({'position': 'initial'});
    $('ul.dropdown-menu.dropdown-big > li').hover(function () {
        $(this).siblings().removeClass('hover');
        $(this).addClass('hover');
    });

    $('.carousel').carousel({
        interval: 5000,
        wrap: true,
    });

    /* Validation Events for changing response CSS classes */
    document.addEventListener('wpcf7invalid', function (event) {
        $('.wpcf7-response-output').addClass('alert alert-danger');
    }, false);
    document.addEventListener('wpcf7spam', function (event) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false);
    document.addEventListener('wpcf7mailfailed', function (event) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false);
    document.addEventListener('wpcf7mailsent', function (event) {
        $('.wpcf7-response-output').addClass('alert alert-success');
    }, false);
});