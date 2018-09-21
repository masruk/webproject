$("#slideshow > div:gt(0)").hide();

setInterval(function() {
    $('#slideshow > div:first')
        .fadeOut(2000)
        .next()
        .fadeIn(1500)
        .end()
        .appendTo('#slideshow');
},  4500);