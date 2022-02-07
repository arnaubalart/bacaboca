$(document).ready(function() {
    //inicializar el owl carousel (libreria para hacer carousel con jquery)
    $(".owl-carousel").owlCarousel();

    //pulsar la burger
    $(".menu .boton-burger svg").click(function() {
        $(".overlay").addClass("active")
        $(".sidenav").addClass("open")
        $("body").css("overflow", "hidden");

    });
    $(".overlay").click(function() {
        console.log("hola")
        if ($(".sidenav").hasClass("open")) {
            $(".sidenav").removeClass("open")
            $(".menu .boton-burger").removeClass("opened")



        }
        $(".overlay").removeClass("active")
        $("body").css("overflow", "visible");
    });

    $(".input-search-top").on("keyup", function() {
        $("form .hidden-texto").val($(this).val())
        $(".input-search-header").val($(this).val())
    });
    $(".input-search-header").on("keyup", function() {
        $("form .hidden-texto").val($(this).val())
        $(".input-search-top").val($(this).val())
    });
});