var config = @@include('../../config.json');
var options = {
        adminHeight: $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0,
        headerHeight: $('.site-header').outerHeight()
    };

$(window).on('load', function() {
    $('.icon use').each(function () {
        var $this = $(this),
            $url = $this.attr('xlink:href');

        $this.attr('xlink:href', config.path.sprites + $url);
    });
});

$(window).on('load resize', function() {
    options.adminHeight = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
    options.headerHeight = $('.site-header').outerHeight();
});

$(document).on('ready', function () {

    $('html').attr('style', 'margin-top: 0 !important;');
    $(document).on('click', '.icon-menu', function () {
        $('body').toggleClass('_event__open-menu');
        if(!$('body').hasClass('_event__open-menu')) {
            $('body').css({
                overflow: 'auto',
                paddingRight: 0
            });
        } else {
            $('body').css({
                overflow: 'hidden',
                paddingRight: scrollbarWidth()
            });
        }
    });
    $(document).on('click', '.js-smooth', function() {
        var target = $($(this).data('target'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - options.headerHeight - options.adminHeight
            }, 700);
            return false;
        }
    });
    $(document).on('click', '.js-toggle-content', function() {
        $(this).closest('.games-item').toggleClass('_shown_content');
        $(this).find('.games-item__about-text').text(function(i, text){
            return text === "About" ? "Back" : "About";
        });
    });
    $(document).mouseup(function (e){
        var el = $('.games-item');
        if (!el.is(e.target)
            && el.has(e.target).length === 0) {
            el.removeClass('_shown_content');
            $('.games-item__about-text').text('About');
        }
    });

    // Social icons
    $('.js-youtube').find('a').html('<svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg>');
    $('.js-reddit').find('a').html('<svg class="icon icon-reddit"><use xlink:href="#icon-reddit"></use></svg>');
    $('.js-discord').find('a').html('<svg class="icon icon-discord"><use xlink:href="#icon-discord"></use></svg>');
    $('.js-facebook').find('a').html('<svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg>');
    $('.js-twitter').find('a').html('<svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>');
    $('.js-instagram').find('a').html('<svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg>');

    // Subscribe
    if($('.subscribe').length) {
        $('.es_lablebox').remove();
        $('[name="es_txt_name_pg"]').attr('placeholder', 'Your Name');
        $('[name="es_txt_email_pg"]').attr('placeholder', 'Your E-mail');

        $('.es_shortcode_form').submit(function (e) {
            console.log(e);
        });
    }

    // About Page
    if($('.section--about-page').length) {
        $('.section--about-page').find('img').each(function () {
            var $this = $(this),
                $img = $this,
                $src = $img.attr('src'),
                $parent = $this.parent('p');

            $img.append('<div class="img-content" style="background-image: url('+$src+');"></div>');
            var $result = $this.find('.img-content');
            $result.insertAfter($parent);
            $parent.remove()
        });
    }

    $(document).on('click', '.js-map-toggle', function() {
        $(this).closest('.section--contact-page').toggleClass('_shown_map');
    });
});

/*
 * Functions
 */

function scrollbarWidth() {
    var documentWidth = parseInt(document.documentElement.clientWidth);
    var windowsWidth = parseInt(window.innerWidth);
    var scrollbarWidth = windowsWidth - documentWidth;
    return scrollbarWidth;
}