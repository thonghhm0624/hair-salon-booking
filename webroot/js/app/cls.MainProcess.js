function clsMainProcess(){
    this.is_ajaxSaving = false;
    this.main_init = function(){
        validateObj.init();
        this.setHeader();
        this.initHomeSlider();
        this.initMenu();
        this.initProductsIsotopeFiltering();
        this.initFixProductBorder();
        this.initProductDetailSlider();
        this.initProductDetailTabs();
        this.initProductsCheckboxes();
        this.initProductsShowMore();
        this.tutorialSelectTab();
        this.bind_events();

        // this.initBannerVideo();

        // this.initGoogleMap();

    };
    var self = this;
    var header = $('.header');
    var current_group = 1;
    var menu = $('.hamburger_menu');
    var iso = null;
    var menuActive = false;
    var hamburgerClose = $('.hamburger_close');
    var fsOverlay = $('.fs_menu_overlay');
    //bind event
    this.bind_events = function() {

        $('#tutorial-video').css('height',$('.tutorial-video').width()*9/16);
        $('#about_vid').css('height',$('.about_video_container').width()*9/16);


        // $('.new-jars').css('margin-top',)
        // console.log(polises);

        $(window).on('resize', function() {
            self.initFixProductBorder();
            $('#tutorial-video').css('height',$('.tutorial-video').width()*9/16);
            $('#about_vid').css('height',$('.about_video_container').width()*9/16);
            var top = $('.polish').height();
            $('.new-jars').css('margin-top', top - $('.new-jars').height());
            self.setHeader();
            var showMore = $('#show-more-button');
            var p_w = showMore.parent().width();
            showMore.css('margin-left',(p_w/2)-(showMore.width()/2));
        });
        var product_cat = $('#product_cat');
        var shade_cat = $('#shade_cat');
        $('#show_products_cat').on('click',function (p1, p2) {

            if(!shade_cat.hasClass('d-none')){
                $('#shade_arrow').removeClass('fa-angle-down').addClass('fa-angle-right');

                shade_cat.addClass('d-none');
            }
            if(product_cat.hasClass('d-none')){
                $('#product_arrow').removeClass('fa-angle-right').addClass('fa-angle-down');
                product_cat.removeClass('d-none');
            }else{
                $('#product_arrow').removeClass('fa-angle-down').addClass('fa-angle-right');

                product_cat.addClass('d-none');

            }
        });
        $('#show_shade_cat').on('click',function (p1, p2) {

            if(!product_cat.hasClass('d-none')){
                $('#product_arrow').removeClass('fa-angle-down').addClass('fa-angle-right');

                product_cat.addClass('d-none');
            }
            if(shade_cat.hasClass('d-none')){
                $('#shade_arrow').removeClass('fa-angle-right').addClass('fa-angle-down');

                shade_cat.removeClass('d-none');
            }else{
                $('#shade_arrow').removeClass('fa-angle-down').addClass('fa-angle-right');

                shade_cat.addClass('d-none');

            }
        });
        $(document).on('scroll', function() {
            self.setHeader();
        });

    };
    this.setHeader = function () {
        if(window.innerWidth < 992)
        {
            if($(window).scrollTop() > 100)
            {
                header.css({'top':"0"});
            }
            else
            {
                header.css({'top':"0"});
            }
        }
        else
        {
            if($(window).scrollTop() > 100)
            {
                header.css({'top':"0px"});
            }
            else
            {
                header.css({'top':"0"});
            }
        }
        if(window.innerWidth > 991 && menuActive)
        {
            this.closeMenu();
        }
    };
    this.initFixProductBorder = function  () {
        if($('.product_filter').length)
        {
            var products = $('.product_filter:visible');
            var wdth = window.innerWidth;

            // reset border
            products.each(function()
            {
                $(this).css('border-right', 'solid 1px #e9e9e9');
            });

            // if window width is 991px or less

            if(wdth < 480)
            {
                for(var i = 0; i < products.length; i++)
                {
                    var product = $(products[i]);
                    product.css('border-right', 'none');
                }
            }

            else if(wdth < 576)
            {
                if(products.length < 5)
                {
                    var product = $(products[products.length - 1]);
                    product.css('border-right', 'none');
                }
                for(var i = 1; i < products.length; i+=2)
                {
                    var product = $(products[i]);
                    product.css('border-right', 'none');
                }
            }

            else if(wdth < 768)
            {
                if(products.length < 5)
                {
                    var product = $(products[products.length - 1]);
                    product.css('border-right', 'none');
                }
                for(var i = 2; i < products.length; i+=3)
                {
                    var product = $(products[i]);
                    product.css('border-right', 'none');
                }
            }

            else if(wdth < 992)
            {
                if(products.length < 5)
                {
                    var product = $(products[products.length - 1]);
                    product.css('border-right', 'none');
                }
                for(var i = 3; i < products.length; i+=4)
                {
                    var product = $(products[i]);
                    product.css('border-right', 'none');
                }
            }

            //if window width is larger than 991px
            else
            {
                if(products.length < 5)
                {
                    var product = $(products[products.length - 1]);
                    product.css('border-right', 'none');
                }
                for(var i = 4; i < products.length; i+=5)
                {
                    var product = $(products[i]);
                    product.css('border-right', 'none');
                }
            }
        }
    };
    this.initMenu = function() {
        var hamburger = $('.hamburger_container');
        var fsOverlay = $('.fs_menu_overlay');
        var hamburgerClose = $('.hamburger_close');
        if(hamburger.length)
        {
            hamburger.on('click', function()
            {
                if(!menuActive)
                {
                    self.openMenu();
                }
            });
        }

        if(fsOverlay.length)
        {
            fsOverlay.on('click', function()
            {
                if(menuActive)
                {
                    self.closeMenu();
                }
            });
        }

        if(hamburgerClose.length)
        {

            hamburgerClose.on('click', function()
            {
                if(menuActive)
                {
                    self.closeMenu();
                }
            });
        }

        if($('.menu_item').length)
        {
            var items = document.getElementsByClassName('menu_item');
            var i;

            for(i = 0; i < items.length; i++)
            {
                if(items[i].classList.contains("has-children"))
                {
                    items[i].onclick = function()
                    {
                        this.classList.toggle("active");
                        var panel = this.children[1];
                        if(panel.style.maxHeight)
                        {
                            panel.style.maxHeight = null;
                        }
                        else
                        {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    }
                }
            }
        }
    };
    this.openMenu = function () {
        var fsOverlay = $('.fs_menu_overlay');
        var menu = $('.hamburger_menu');
        menu.addClass('active');
        // menu.css('right', "0");
        fsOverlay.css('pointer-events', "auto");
        menuActive = true;
    };
    this.closeMenu = function () {
        var fsOverlay = $('.fs_menu_overlay');
        var menu = $('.hamburger_menu');
        menu.removeClass('active');
        fsOverlay.css('pointer-events', "none");
        menuActive = false;
    };
    this.initHomeSlider = function() {
        if($('#product_slider_home').length)
        {
            var slider1 = $('#product_slider_home');

            slider1.owlCarousel({
                loop:false,
                dots:true,
                nav:false,
                responsive:
                    {
                        0:{items:2},
                        480:{items:2},
                        768:{items:3},
                        991:{items:4},
                        1280:{items:5},
                        1440:{items:5}
                    }
            });
        }
    };
    this.initProductDetailSlider = function () {
        if($('#relative_product_slider').length)
        {
            var slider1 = $('#relative_product_slider');

            slider1.owlCarousel({
                loop:false,
                dots:false,
                nav:false,
                responsive:
                    {
                        0:{items:2},
                        480:{items:3},
                        768:{items:3},
                        991:{items:3},
                        1280:{items:3},
                        1440:{items:3}
                    }
            });
        }
    };
    this.initProductDetailTabs = function () {

        $('li.tab').on('click',function (p1, p2) {
            var tab = $(this);
            var tab_id = tab.data('active-tab');
            if(!tab.hasClass('active'))
            {
                tab.removeClass('active');
                tab.siblings().removeClass('active');
                tab.addClass('active');
                $('#' + tab_id).addClass('active');
                $('#' + tab_id).siblings().removeClass('active');
            }
        })
    };
    this.initProductsCheckboxes = function () {
        if($('.checkboxes li').length)
        {
            var boxes = $('.checkboxes li');
            var filter_clicked = false;
            var products_grid = $('.product-grid');
            var filter_string = '';
            var products = products_grid.find('.product-item');
            boxes.each(function()
            {

                var box = $(this);

                box.on('click', function()
                {
                    if(filter_clicked == false){
                        products.each(function () {
                            var product = $(this);
                            product.removeClass('d-none');
                        });
                        $('#show-more-button').hide();
                    }
                    filter_clicked = true;
                    if(box.hasClass('active')) {
                        box.find('i').removeClass('fa-square');
                        box.find('i').addClass('fa-square-o');
                        filter_string = filter_string.replace('.'+box.data('color')+',','');
                        filter_string = filter_string.replace(',.'+box.data('color'),'');
                        filter_string = filter_string.replace('.'+box.data('color'),'');
                        box.toggleClass('active');
                    }
                    else
                    {
                        box.find('i').removeClass('fa-square-o');
                        box.find('i').addClass('fa-square');
                        if(filter_string.length == 0){
                            filter_string += '.'+box.data('color');
                        }else{
                            filter_string += ',.'+box.data('color');

                        }
                        box.toggleClass('active');
                    }

                    products_grid.isotope({ filter: filter_string });
                    // $('.product-grid').isotope('reloadItems').isotope();

                });
            });

            if($('.show_more').length)
            {
                var checkboxes = $('.checkboxes');

                $('.show_more').on('click', function()
                {
                    checkboxes.toggleClass('active');
                    if($(this).data('show') == 0){
                        $(this).data('show',1);
                        $(this).html('<span><span>-</span>Show Less</span>');
                    }else{
                        $(this).data('show',0);
                        $(this).html('<span><span>+</span>Show More</span>');

                    }
                });
            }
        };
    };
    this.initProductsShowMore = function () {

        var showMore = $('#show-more-button');
        var p_w = showMore.parent().width();
        showMore.css('margin-left',(p_w/2)-(showMore.width()/2));
        showMore.on('click',function (e) {

            e.preventDefault();
            var parent_div = $('.product-grid');
            var more_products = parent_div.find('div[data-group="' + current_group + '"]');

            $.each(more_products,function (index,elem) {
                $(elem).removeClass('d-none');
            });
            $('.product-grid').isotope('reloadItems').isotope();
            current_group+=1;
            if(parent_div.find('div[data-group="' + current_group + '"]').length == 0){
                showMore.hide();
            }
        })
    };
    this.initProductsIsotopeFiltering = function() {
        var product_grid = $('.product-grid');
        // product_grid.isotope('destroy');
        if(product_grid.length)
        {
            product_grid.isotope({
                itemSelector: '.product-item',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                },
                layoutMode: 'fitRows'
            });
        }
    };
    this.initGoogleMap = function() {
        var myLatlng = new google.maps.LatLng(42.373122,-71.112387);
        var mapOptions =
            {
                center: myLatlng,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: true,
                scrollwheel: false,
                zoomControl: true,
                zoomControlOptions:
                    {
                        position: google.maps.ControlPosition.RIGHT_CENTER
                    },
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: true,
                styles:
                    [
                        {
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#616161"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#bdbdbd"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#eeeeee"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e5e5e5"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#9e9e9e"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dadada"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#616161"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#9e9e9e"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e5e5e5"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#eeeeee"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#c9c9c9"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#9e9e9e"
                                }
                            ]
                        }
                    ]
            }

        // Initialize a map with options
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Use an image for a marker
        var image = 'images/map_marker.png';
        var marker = new google.maps.Marker(
            {
                position: new google.maps.LatLng(42.373122,-71.112387),
                map: map,
                icon: image
            });

        // Re-center map after window resize
        google.maps.event.addDomListener(window, 'resize', function()
        {
            setTimeout(function()
            {
                google.maps.event.trigger(map, "resize");
                map.setCenter(myLatlng);
            }, 1400);
        });
    };
    this.initBannerVideo = function () {
        if($('body').hasClass('index')){
            videojs("video").ready(function(){
                var video = this;
                var myInterval = setInterval(function(){
                    // console.log(video.bufferedPercent());

                    if(video.bufferedPercent()>0.35 && video.paused()){
                        video.play();
                        clearInterval(myInterval);
                    }
                }, 50);
            });
        }

    };
    this.tutorialSelectTab = function () {
        $('#select_tutorial').niceSelect();
        $('#select_tutorial').on('change',function (p1, p2) {
            if($(this).val() == 1){
                $('#uv_free_gel').removeClass('d-none');
                $('#dip_powder').removeClass('d-none').addClass('d-none');
            }else if($(this).val() == 2){
                $('#uv_free_gel').removeClass('d-none').addClass('d-none');
                $('#dip_powder').removeClass('d-none');
            }
        })
    }
}
var mainProcess = new clsMainProcess();

$(document).ready(function(){
    mainProcess.main_init();
});
$(window).on('load',function () {
    var top = $('.polish').height();
    $('.new-jars').css('padding-top',top -  $('.new-jars').height());
})


