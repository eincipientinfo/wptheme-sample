jQuery(document).ready(function ($) {
    $(function () {
        $('#searchlink i').on('click', function (e) {
            $('#searchlink').toggleClass('open');
            if ($('#searchlink').hasClass('open')) {
                $('#searchlink').find('.fa-custom').removeClass('fa-search').addClass('fa-times');
            } else {
                $('#searchlink').find('.fa-custom').removeClass('fa-times').addClass('fa-search');
            }
        });
    });

    var s = $('input'),
            f = $('form.formsearch'),
            a = $('.after'),
            m = $('h4');

    s.focus(function () {
        if (f.hasClass('open'))
            return;
        f.addClass('in');
        setTimeout(function () {
            f.addClass('open');
            f.removeClass('in');
        }, 1300);
    });

    a.on('click', function (e) {
        e.preventDefault();
        if (!f.hasClass('open'))
            return;
        s.val('');
        f.addClass('close');
        f.removeClass('open');
        setTimeout(function () {
            f.removeClass('close');
        }, 1300);
    })

    f.submit(function (e) {
        e.preventDefault();
        m.html('Thanks, high five!').addClass('show');
        f.addClass('explode');
        setTimeout(function () {
            s.val('');
            f.removeClass('explode');
            m.removeClass('show');
        }, 3000);
    })
    /*-----------File-upload------------*/
    $("form").on("change", ".file-upload-field", function () {
        $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/, ''));
        if ($(this).parent(".file-upload-wrapper").attr("data-text") == '') {
            $(this).parent(".file-upload-wrapper").attr("data-text", 'ADD LINK');
        }
    });
    /*----------Form-effect------------*/
    $('input').on('blur', function () {

        var $this = $(this);

        if ($this.val() !== "") {

            $this.addClass('not-empty');
            $(this).next().addClass("hello");

        } else {

            $this.removeClass('not-empty');
            $(this).next().removeClass("hello");

        }

    });
    /*-----Sticky Menu--------*/
    $(window).scroll(function () {
        // alert($(window).scrollTop(60));
        if (!$('.wrapper').hasClass('fixed')) {
            if ($(window).scrollTop() > 60) {

                $('.wrapper').addClass('fixed');
            }
        } else {
            if ($(window).scrollTop() == 0) {
                $('.wrapper').removeClass('fixed');

            }
        }
    });
    /*---Filtering------*/
    function getHashFilter() {
        var matches = location.hash.match(/filter=([^&]+)/i);
        var hashFilter = matches && matches[1];
        return hashFilter && decodeURIComponent(hashFilter);
    }
    $(function () {
        // filter functions
        var $grid = $('#grid-container');
        // init Isotope

        // bind filter button click

        var isIsotopeInit = false;

        function onHashchange() {
            var hashFilter = getHashFilter();
            if (!hashFilter && isIsotopeInit) {
                return;
            }
            isIsotopeInit = true;
            // filter isotope
            $grid.isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                // use filterFns
                filter: hashFilter
            });

            var $filterButtonGroup = $('.filters-button-group');
            $filterButtonGroup.on('click', 'button', function () {
                var filterAttr = $(this).attr('data-filter');
                // set filter in hash
                location.hash = 'filter=' + encodeURIComponent(filterAttr);
            });

            // set selected class on button
            if (hashFilter) {
                $filterButtonGroup.find('.is-checked').removeClass('is-checked');
                $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
            }
        }

        $(window).on('hashchange', onHashchange);

        // trigger event handler to init Isotope
        onHashchange();
    });

// debounce so filtering doesn't happen every millisecond
    function debounce(fn, threshold) {
        var timeout;
        return function debounced() {
            if (timeout) {
                clearTimeout(timeout);
            }
            function delayed() {
                fn();
                timeout = null;
            }
            timeout = setTimeout(delayed, threshold || 100);
        }
    }

    $(window).bind("load", function () {
        $('#all').click();
    });

    if ($(window).width() < 992) {
        $('.home-header li.menu-item-has-children').addClass('hide-mob-menu');

        $('.home-header li.menu-item-has-children').click(function () {
            if ($(this).hasClass('hide-mob-menu')) {
                $(this).addClass('show-mob-menu');
                $(this).removeClass('hide-mob-menu');
            } else {
                $(this).addClass('hide-mob-menu');
                $(this).removeClass('show-mob-menu');
            }
            $(this).parent('ul').siblings('ul.navbar-nav').children('li.menu-item-has-children').removeClass('show-mob-menu');
            $(this).siblings('li.menu-item-has-children').removeClass('show-mob-menu');
            $(this).parent('ul').siblings('ul.navbar-nav').children('li.menu-item-has-children').addClass('hide-mob-menu');
            $(this).siblings('li.menu-item-has-children').addClass('hide-mob-menu');
        });

        $('.inner-header li.menu-item-has-children').addClass('hide-mob-menu');

        $('.inner-header li.menu-item-has-children').click(function () {
            if ($(this).hasClass('hide-mob-menu')) {
                $(this).addClass('show-mob-menu');
                $(this).removeClass('hide-mob-menu');
            } else {
                $(this).addClass('hide-mob-menu');
                $(this).removeClass('show-mob-menu');
            }
            $(this).siblings('li.menu-item-has-children').removeClass('show-mob-menu');
            $(this).siblings('li.menu-item-has-children').addClass('hide-mob-menu');
        });
    }
});