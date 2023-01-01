const getUrl = window.location;
const baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
! function (n) {
    "use strict";

    function r(o) {
        n(".slide_count_wrap2").find(".current2").text(o + 1)
    }
    document.addEventListener("DOMContentLoaded", () => {
        const o = new VanillaCalendar(".vanilla-calendar");
        o.init()
    }), n(window).scroll(function () {
        100 < n(this).scrollTop() ? n(".backtotop:hidden").stop(!0, !0).fadeIn() : n(".backtotop").stop(!0, !0).fadeOut()
    }), n(function () {
        n(".scroll").on("click", function () {
            return n("html,body").animate({
                scrollTop: 0
            }, "slow"), !1
        })
    }), n(window).on("scroll", function () {
        140 < n(this).scrollTop() ? n(".header_section").addClass("sticky") : n(".header_section").removeClass("sticky")
    }), n("select").niceSelect(), n(".dropdown").hover(function () {
        n(this).find("> .dropdown-menu").addClass("show")
    }, function () {
        n(this).find("> .dropdown-menu").removeClass("show")
    }), n(".pricing_btns_nav li").on("click", function () {
        n("li").removeClass("active"), n(this).addClass("active")
    }), n(".countdown_timer").each(function () {
        n("[data-countdown]").each(function () {
            var o = n(this),
                e = n(this).data("countdown");
            o.countdown(e, function (o) {
                n(this).html(o.strftime('<li class="days_count"><strong>%D</strong><span>Days</span></li><li class="hours_count"><strong>%H</strong><span>Hours</span></li><li class="minutes_count"><strong>%M</strong><span>Mins</span></li><li class="seconds_count"><strong>%S</strong><span>Secs</span></li>'))
            })
        })
    }), n(".popup_video").magnificPopup({
        type: "iframe",
        preloader: !1,
        removalDelay: 160,
        mainClass: "mfp-fade",
        fixedContentPos: !1
    }), n(".zoom-gallery").magnificPopup({
        delegate: ".popup_image",
        type: "image",
        closeOnContentClick: !1,
        closeBtnInside: !1,
        mainClass: "mfp-with-zoom mfp-img-mobile",
        gallery: {
            enabled: !0
        },
        zoom: {
            enabled: !0,
            duration: 300,
            opener: function (o) {
                return o.find("img")
            }
        }
    }), n(".common_carousel_1col").slick({
        dots: !0,
        speed: 1e3,
        arrows: !0,
        infinite: !0,
        autoplay: !0,
        slidesToShow: 1,
        pauseOnHover: !0,
        autoplaySpeed: 5e3,
        prevArrow: ".cc1c_left_arrow",
        nextArrow: ".cc1c_right_arrow"
    }), n(".common_carousel_3col").slick({
        dots: !0,
        speed: 1e3,
        arrows: !0,
        infinite: !0,
        autoplay: !0,
        slidesToShow: 3,
        slidesToScroll: 3,
        pauseOnHover: !0,
        autoplaySpeed: 5e3,
        prevArrow: ".cc3c_left_arrow",
        nextArrow: ".cc3c_right_arrow",
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 1501,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }]
    }), n(".common_carousel_4col").slick({
        dots: !0,
        speed: 1e3,
        arrows: !0,
        infinite: !0,
        autoplay: !0,
        slidesToShow: 4,
        slidesToScroll: 4,
        pauseOnHover: !0,
        autoplaySpeed: 4e3,
        prevArrow: ".cc4c_left_arrow",
        nextArrow: ".cc4c_right_arrow",
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 1441,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }]
    }), n(".tt_slider_for").slick({
        dots: !1,
        arrows: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: ".tt_slider_nav",
        prevArrow: ".tt_for_left_arrow",
        nextArrow: ".tt_for_right_arrow"
    }), n(".tt_slider_nav").slick({
        dots: !1,
        arrows: !0,
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: !0,
        asNavFor: ".tt_slider_for",
        prevArrow: ".tt_nav_left_arrow",
        nextArrow: ".tt_nav_right_arrow"
    }), n(".tt_slider_nav").on("init", function (o, e) {
        var s;
        slideCount = e.slideCount, s = n(".slide_count_wrap2").find(".total2"), slideCount < 10 ? s.text("0" + slideCount) : s.text(slideCount), r(e.currentSlide)
    }), n(".tt_slider_nav").on("beforeChange", function (o, e, s, t) {
        r(t)
    }), n(".instagram_carousel").slick({
        dots: !0,
        speed: 1e3,
        arrows: !0,
        infinite: !0,
        autoplay: !0,
        slidesToShow: 4,
        slidesToScroll: 4,
        pauseOnHover: !0,
        autoplaySpeed: 4e3,
        prevArrow: ".ic_left_arrow",
        nextArrow: ".ic_right_arrow",
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 1281,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }]
    }), n(".product_gallery_for").slick({
        dots: !0,
        arrows: !1,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: ".product_gallery_nav"
    }), n(".product_gallery_nav").slick({
        dots: !1,
        arrows: !1,
        vertical: !0,
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: !0,
        verticalSwiping: !0,
        asNavFor: ".product_gallery_for"
    }), window.inputNumber = function (o) {
        var s = o.attr("min") || !1,
            t = o.attr("max") || !1,
            r = {};
        r.dec = o.prev(), r.inc = o.next(), o.each(function () {
            var e;
            e = n(this), r.dec.on("click", function () {
                var o = e[0].value;
                o--, (!s || s <= o) && (e[0].value = o)
            }), r.inc.on("click", function () {
                var o = e[0].value;
                o++, (!t || o <= t) && (e[0].value = o++)
            })
        })
    },

    //Custom scripts
    n(".newsletter-submit").click(function(e){
        $('.newsletter-response').html('');
        $(this).html('<i class="fas fa-spin fa-spinner"></i>');
        const ActionUrl = $(this).data('action');
        const email = $(this).parent().find('input[name="email"]').val();
        const Btn = $(this);
        //Prevent Default Behaviour
        e.preventDefault();
        //Send an AJAX request
        $.ajax({
            method: 'post',
            url: ActionUrl,
            data: {
                email
            },
            success: function(response){
                Btn.html('Subscribe');
                n('.newsletter-response').append(`<div class="alert alert-success">${response}</div>`);
            },
            error: function(response){
                Btn.html('Subscribe');
                response.each(item => {
                    n('.newsletter-response').append(`<div class="alert alert-danger">${item}</div>`);
                });
            }
        });
    });
}(jQuery);
// Quick add to cart
$(document).on('click', '.quick-add-to-cart', function(e) {
    let That = $(this);
    let ItemId = $(this).data('id');
    let UserId = $(this).data('user');
    let Target = $(this).data('target');
    //Change the button to loader
    That.html('<i class="fas fa-spinner fa-spin"></i>');
    $.ajax({
        url : Target,
        method: 'post',
        data: {
            user_id: UserId,
            product_id: ItemId
        },
        success: function(response){
            // Show the modal here
            $('#added-to-cart-success').fadeIn('fast');
            // Update the navbar cart
            updateNavbarCart();
            That.html('In Cart');
        },
        error: function(response){
            $('body').append(`
                    <div class="notification error-notification">
                        <div class="notification-icon">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="notification-content">
                            <b>Error!</b>
                            <p class="mb-0">${response.responseText}</p>
                        </div>
                    </div>`);
            That.html('Add to cart');
        }
    });
});
//Cart system
$(document).on('submit', '.addtocart_form', function(e) {
    e.preventDefault();
    let That = $(this);
    let ItemId = $(this).data('id');
    let UserId = $(this).data('user');
    let Target = $(this).data('target');
    //Change the button to loader
    That.find('button').html('<i class="fas fa-spinner fa-spin"></i>');
    $.ajax({
        url : Target,
        method: 'post',
        data: That.serialize(),
        success: function(response){
            //Show the modal here
            $('#added-to-cart-success').fadeIn('fast');
            That.find('button').html('<i class="fas fa-check"></i> Added to cart');
        },
        error: function(response){
            $('body').append(`
                    <div class="notification error-notification">
                        <div class="notification-icon">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="notification-content">
                            <b>Error!</b>
                            <p class="mb-0">${response.responseText}</p>
                        </div>
                    </div>`);
            That.find('button').html('<i class="fas fa-cart-plus"></i> Add to cart');
        }
    });
});
function updateCartTotal(){
    // Run an Ajax request to update the cart total in both navbar & cart page
    $.ajax({
        url: '/api/fetch-cart-total',
        headers: {
            'Auth': $("meta[name='user_token']").attr("content")
        },
        method: 'POST',
        success: function (response){
            // Update the total in navbar & cart page
            let total = response.total
            if($("meta[name='currency']").attr("content") === 'lbp'){
                total = response.total * $("meta[name='exchange-rate']").attr("content")
            }
            $('.navbar-cart-total').html(total)
            $('.cart-page-total').html(total)
            // Check if there is any coupons in the cart
            if($('.cart-final-total').length){
                // Update the final total and subtract the coupon value
                $('.cart-final-total').html($('.cart-page-total').html() - $('.cart-final-total').data('discount'))
            }
        },
        error: function (response){
            console.log(response);
        }
    })
}
function updateNavbarCart(){
    // Perform an AJAX request to fetch the latest cart
    // Run an Ajax request to update the cart total in both navbar & cart page
    $.ajax({
        url: '/api/fetch-latest-cart',
        headers: {
            'Auth': $("meta[name='user_token']").attr("content")
        },
        method: 'POST',
        success: function (response){
            // Update the navbar button total count
            $('.cart_btn .cart_counter').html(response.length);
            // Append the new item to the list
            $('#navbar-cart .cart_items_list').html('');
            response.forEach((item, key) => {
                $('#navbar-cart .cart_items_list').append(`
                    <li>
                        <a class="item_image" href="/products/${item.product.slug}/${item.product.id}">
                            <img src="${item.product.image_path}" alt="${item.product.title}">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title">
                                <a href="/products/${item.product.slug}/${item.product.id}">
                                    ${item.product.title}
                                </a>
                            </h3>
                            <span class="item_price">${item.qty} × ${item.product.final_price}$</span>
                        </div>
                        <button class="remove_btn delete-from-cart" data-location="navbar" data-id="${item.id}" data-target="/api/delete-item-from-cart" type="button"><i class="fa fa-times"></i></button>
                    </li>
                `)
            });
            updateCartTotal();
        },
        error: function (response){
            console.log(response);
        }
    })
}
function updateItemTotal(item){
    // Item will be the single cart card jquery selector
    item.find('.total-price').html(item.find('.qty-total').html() * item.find('.single-price').html());
}
//Delete item from cart
$(document).on('click', '.delete-from-cart', function(e){
    e.preventDefault();
    let That = $(this);
    let ItemId = $(this).data('id');
    let Target = $(this).data('target');
    //Change the button to loader
    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    $.ajax({
        url : Target,
        method: 'post',
        data:{
            'cart_id':ItemId,
        },
        success: function(){
            //Show the modal here
            if (That.data('location') === 'navbar'){
                That.parent().fadeOut();
            }else{
                That.parent().parent().parent().fadeOut();
            }
            updateNavbarCart();
        },
        error: function(response){
            console.log(response);
        }
    });
});

//Update cart qty
$('.add-one-qty').click(function(){
    let That = $(this);
    let ItemId = $(this).data('id');
    let Target = $(this).data('target');
    $.ajax({
        url: Target,
        method: 'POST',
        data: {
            item_id: ItemId
        },
        success: function(response){
            // Increment the shown number
            That.parent().find('.qty-total').html(response.qty)
            updateCartTotal()
            updateItemTotal(That.parent().parent())
        },
        error: function(response){
            alert(response.responseText);
        }
    })
});
$('.remove-one-qty').click(function(){
    let That = $(this);
    let ItemId = $(this).data('id');
    let Target = $(this).data('target');
    $.ajax({
        url: Target,
        method: 'POST',
        data: {
            item_id: ItemId
        },
        success: function(response){
            // Decrement the shown number
            That.parent().find('.qty-total').html(response.qty)
            updateItemTotal(That.parent().parent())
            updateCartTotal()
        },
        error: function(response){
            alert(response.responseText);
        }
    })
});
// Add item to wishlist
$(document).on('click', '.add-to-wishlist', function(e){
    let That = $(this);
    let ItemId = $(this).data('id');
    let UserId = $(this).data('user');
    let Target = $(this).data('target');
    //Change the button to loader
    That.html('<i class="fas fa-spinner fa-spin"></i>');
    $.ajax({
        url : Target,
        method: 'post',
        data: {
            'product_id': ItemId,
            'user_id': UserId
        },
        success: function(response){
            That.html('<i class="far fa-heart"></i>');
            That.addClass('active');
        },
        error: function(response){
            $('body').append(`
                    <div class="notification error-notification">
                        <div class="notification-icon">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="notification-content">
                            <b>Error!</b>
                            <p class="mb-0">${response.responseText}</p>
                        </div>
                    </div>`);
            That.html('<i class="far fa-heart"></i>');
        }
    });
});
$(document).ready(function(){
    // Hide the filters by default on mobile screens
    if ($(window).width() < 786) {
        $('#collapse_filters').removeClass('show');
    }
    // Close notification button
    $('.close-notification-button').click(function(e){
       $(this).parent().fadeOut('fast');
    });
    // Hide added to cart pop-up
    $('#close-added-to-cart').click(function(){
        $('#added-to-cart-success').fadeOut('fast');
    });
    // Search function
    $('.nav-search-toggler').click(function(){
        //Clear the search form
        $('#navbar-search-results').html('').fadeOut();
        //Show the search form
        $('.navbar-search-overlay').fadeIn('fast');
        $('#search-box').val('').focus();
        //Stop the body scroll
        $('body').css('overflow-y' , 'hidden');
    });
    //Hide the search box based on a icon click
    $('#close-search-form').click(function(){
        $('.navbar-search-overlay').fadeOut('fast');
        $('body').css('overflow-y' , 'scroll');
    });
    //Hide the search box when clicking escape button
    $(document).keyup(function(e) {
        if (e.key === "Escape") { // escape key maps to keycode `27`
            $('.navbar-search-overlay').fadeOut('fast');
            $('body').css('overflow-y' , 'scroll');
        }
    });
    // The search function
    function searchForProducts(e){
        e.preventDefault();
        //Validate the request and clean bad codes
        var SearchTerm = $('#search-box').val().replace(/[^a-zA-Z0-9\s]/gm, '');
        $('#navbar-search-results').fadeIn();
        $('#navbar-search-results').html('<p class="text-center text-white"><i class="fas fa-spinner fa-spin fa-5x"></i></p>');
        $.ajax({
            url: baseUrl+'api/search',
            method: 'post',
            data: {
                'search' : SearchTerm
            },
            success: function(response){
                $('#navbar-search-results').html('');
                if (response.length > 0){
                    response.forEach((item) => {
                        $('#navbar-search-results').append(`
                        <a href="${baseUrl}/products/${item.slug}/${item.id}">
                            <div class="single-search-result">
                                <a class="search-result-image" href="${baseUrl}products/${item.slug}/${item.id}">
                                    <img src="${item.image_path}" class="h-auto">
                                </a>
                                <a class="search-result-data" href="${baseUrl}products/${item.slug}/${item.id}">
                                    <p>
                                        <small><b>${item.brand.title}</b></small>
                                        <br>
                                        ${item.title}
                                        <br>
                                        ${item.price != 0 ? item.price+'$' : '' }
                                        <br>
                                    </p>
                                </a>
                            </div>
                        </a>
                    `);
                    });
                }else{
                    $('#navbar-search-results').html('<p class="text-center">There are no results!</p>');
                }
            },
            error: function(data , errorThrown){
                if(data.status == 429){
                    $('#navbar-search-results').html('<p class="text-center text-white">Too many requests, please try again in 30 seconds or refresh the page</p>');
                }else{
                    $('#navbar-search-results').html('<p class="text-center text-white">'+data.responseText+'</p>');
                }
            }
        });
    }
    $('.search-form-element').on('submit', searchForProducts);
    $('#search-box').on('keyup', searchForProducts);
});
