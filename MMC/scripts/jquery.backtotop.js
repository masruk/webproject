/*
Template Name: Kiraric
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
File: Back to Top JS
*/

jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});


$("#gotofooter").click(function() {
    $('html, body').animate({
        scrollTop: $("#footer").offset().top
    }, 600);
});

$("#gotodoctor").click(function() {
    $('html, body').animate({
        scrollTop: $("#doctor").offset().top
    }, 600);
});

$("#gotoservice").click(function() {
    $('html, body').animate({
        scrollTop: $("#service").offset().top
    }, 600);
});


jQuery("#sign_in").click(function () {
    $( ".login" ).show();
    $( ".signup" ).hide();
});

jQuery("#close_form").click(function () {
    $( ".login" ).hide();
    $( ".signup" ).hide();
});
jQuery("#close_form2").click(function () {
    $( ".login" ).hide();
    $( ".signup" ).hide();
});

jQuery("#havntacc").click(function () {
    $( ".signup" ).show();
    $( ".login" ).hide();
});
jQuery("#haveacc").click(function () {
    $( ".login" ).show();
    $( ".signup" ).hide();
});


jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});




jQuery("#haveacc").click(function () {
    $( ".login" ).show();
    $( ".signup" ).hide();
});




