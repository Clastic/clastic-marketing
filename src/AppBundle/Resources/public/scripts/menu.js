$('.nav a').on('click', function(){
    if ($(window).width() <= 767) {
        $(".navbar-toggle").click();
    }
});