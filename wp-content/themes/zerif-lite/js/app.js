$(function() {
    $(".slider").slick({
        dots: !0,
        infinite: !0,
        speed: 500,
        fade: !0,
        autoplay: !0,
        autoplaySpeed: 3700,
        cssEase: "linear"
    }), $(".news-slider").slick({
        lazyLoad: "ondemand",
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: !0,
        speed: 500,
        fade: !1,
        cssEase: "linear",
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".partners-slider").slick({
        lazyLoad: "ondemand",
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: !0,
        autoplay: !0,
        autoplaySpeed: 3500,
        fade: !1,
        cssEase: "linear",
        responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 680,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".government-slider").slick({
        lazyLoad: "ondemand",
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: !0,
        autoplay: !0,
        autoplaySpeed: 3500,
        fade: !1,
        cssEase: "linear",
        responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 680,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".performance-slider").slick({
        dots: !1,
        arrows: !1,
        infinite: !0,
        speed: 500,
        fade: !0,
        cssEase: "linear",
        asNavFor: ".performance-slider-nav",
        responsive: [{
            breakpoint: 480,
            settings: {
                arrows: !0
            }
        }]
    }), $(".performance-slider-nav").slick({
        lazyLoad: "ondemand",
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: !1,
        infinite: !0,
        speed: 500,
        fade: !1,
        cssEase: "linear",
        focusOnSelect: !0,
        asNavFor: ".performance-slider"
    }), $(".press-slider").slick({
        lazyLoad: "ondemand",
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: !1,
        infinite: !0,
        center: !0,
        speed: 500,
        fade: !1,
        cssEase: "linear",
        focusOnSelect: !0,
        responsive: [{
            breakpoint: 680,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".press-slider-gallery").slick({
        lazyLoad: "ondemand",
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: !1,
        infinite: !0,
        center: !0,
        speed: 500,
        fade: !1,
        cssEase: "linear",
        focusOnSelect: !0
    }), $(".dropdown").not(".collapse.in .dropdown").hover(function() {
        window.screen.width > 992 && ($(".dropdown-menu", this).stop(!0, !0).slideDown(200), $(this).delay(100).queue(function() {
            $(this).toggleClass("open").dequeue()
        }))
    }, function() {
        window.screen.width > 992 && ($(".dropdown-menu", this).stop(!0, !0).slideUp(100), $(this).toggleClass("open"))
    }).click(function() {
        window.screen.width <= 992 && ($(this).hasClass("open") ? ($(".dropdown-menu", this).stop(!0, !0).slideUp(100), $(this).removeClass("open")) : ($(".navbar-nav > li").each(function() {
            $(".dropdown-menu", this).stop(!0, !0).slideUp(100), $(this).removeClass("open")
        }), $(".dropdown-menu", this).stop(!0, !0).slideDown(200), $(this).addClass("open")))
    }), $(window).scroll(function() {
        var e = $(".header-nav"),
            s = $(window).scrollTop();
        s >= 150 ? e.addClass("header-nav-fixed") : e.removeClass("header-nav-fixed")
    }), $("input[type=tel]").mask("+7 (999) 999 9999"), $(".ticket-book-btn").click(function(e) {
        var s = $(this).data("affiche-name"),
            o = $(this).data("affiche-date"),
            i = $(this).data("affiche-time");
        $("#ticket-book-modal").find(".sp-name").html(s), $("#ticket-book-modal").find(".sp-date").html(o), $("#ticket-book-modal").find(".sp-time").html(i), $("#ticket-book-modal").find(".spectacle-name").val(s), $("#ticket-book-modal").find(".spectacle-date").val(o), $("#ticket-book-modal").find(".spectacle-time").val(i)
    }), $(".ticket-book-form").submit(function(e) {
        e.preventDefault();
        var s = $(this),
            o = s.find("button"),
            i = $(this).find("input[name=localization]").val();
        $(".book-status").show(), o.hide(), $.ajax({
            url: "/" + i + "/ticket-book",
            type: "POST",
            async: !0,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: s.serialize(),
            success: function(e) {
                $("#ticket-book-modal").modal("toggle"), s.find("input[type=text], input[type=tel], input[type=number],  textarea").val(""), o.show(), $(".book-status").hide()
            },
            error: function(e, s, o) {
                alert(o)
            }
        })
    }), $(".blog-form").submit(function(e) {
        e.preventDefault();
        var s = $(this),
            o = s.find("button"),
            i = $(this).find("input[name=localization]").val();
        $(".send-status").show(), o.hide(), $.ajax({
            url: "/" + i + "/blog-send",
            type: "POST",
            async: !0,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: s.serialize(),
            success: function(e) {
                s.find("input[type=text], input[type=tel], input[type=email],  textarea").val(""), o.show(), $(".send-status").hide()
            },
            error: function(e, s, o) {
                alert(o)
            }
        })
    }), $("form input[type=tel]").mask("+7 (999) 999-9999")
});