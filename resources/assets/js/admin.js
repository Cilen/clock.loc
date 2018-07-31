$(document).ready(function () {
    var links = $('.sidebar ul li a');
    $.each(links, function (key, va) {
        if (va.href == document.URL) {
            $(this).addClass('active');
        }
        console.log(va.href);
        console.log(document.URL);
    });
});