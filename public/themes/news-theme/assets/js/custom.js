(function($){
    'use strict';

    /*--------------------------------------------------------
     Home Page Right News Slider
     * --------------------------------------------------------*/
    tabHoverSlider('#video');
    tabHoverSlider('#son_dakika');
    tabHoverSlider('#cok_okunanlar');
    function tabHoverSlider(id) {
        var slideInt = null;
        var delay = 0;
        var $this = $('.nw-sm-img .tab-content '+id+' .new-list');

        $this.find('li').each(function (index) {
            $(this).attr('data-index',index);
        });

        start();

        function start() {
            slideInt = setInterval(function () {
                if (delay == $this.find('li').length) {delay = 0;}
                $this.find('li').each(function (index) {
                    if(delay == index){
                        $this.find('li').removeClass("active");
                        $(this).addClass("active");
                    }
                });
                delay++;
            },3000);
        }

        $this.find('li').hover(function () {
            clearInterval(slideInt);
            delay = $(this).data('index');
            $this.find('li').removeClass('active');
            $(this).addClass('active');
        },function () {
            start();
        });
    }

    /*--------------------------------------------------------
     Home Page Category Hover Mews List
     * --------------------------------------------------------*/
    function newsCoverList() {

        $('.img-new-list .new-list-ct .new-list li:first-child').find('a').addClass('active');

        $('.img-new-list').each(function (index) {
            if(index == 0){
                var $this = $(this);
                $(this).find('li:first-child a').addClass("active");
                var url = $(this).find('li:first-child a').attr("href");
                var img = $(this).find('li:first-child a').data("img");
                var title = $(this).find('li:first-child a').data("title");
                var time = $(this).find('li:first-child a').data("time");

                $this.find('.left-img-ct').css("background","url("+img+")");
                $this.find('.left-img-ct').css("background-size","cover");
                $this.find('.left-img-ct').css("background-repeat","no-repeat");
                $this.find('.left-img-ct .full-link').attr("href",""+url+"");
                $this.find('.left-img-ct .new-title').html(title);
                $this.find('.left-img-ct .new-date .timeago').html(time);
            }
        });
        $('.img-new-list .new-list li a').hover(function () {
            var $this = $(this).parent().parent().parent();
            $this.find('.new-list li a').removeClass("active");
            $(this).addClass("active");
            var url = $(this).attr("href");
            var img = $(this).data("img");
            var title = $(this).data("title");
            var time = $(this).data("time");

            $this.find('.left-img-ct').css("background","url("+img+")");
            $this.find('.left-img-ct .full-link').attr("href",""+url+"");
            $this.find('.left-img-ct').css("background-size","cover");
            $this.find('.left-img-ct').css("background-repeat","no-repeat");
            $this.find('.left-img-ct .new-title').html(title);
            $this.find('.left-img-ct .new-date .timeago').html(time);
        });
    }

    newsCoverList();


    /*--------------------------------------------------------
     Left Right Advert
     * --------------------------------------------------------*/
    var width = $(window).width();
    var left =  $('#dfp-pageskin-sol').width();
    var right =  $('#dfp-160-kare-sag').width();
    var ct = $('#container').width();
    $(window).resize(function () {
        adsSize();
    });
    $(document).ready(function () {
        adsSize();
    });
    function adsSize() {
        ct = $('#container').width();
        width = $(window).width();
        var sum = ct + left + right;
        console.log("Cont: "+ct+" Sağ Kutu: "+right+" Sol Kutu: "+left);
        var size = 0;
        if(width < sum){
            size = (width - sum) / 2;
        }else if(width > sum){
            size = (width - sum) / 2;
        }
        console.log("Size: "+size);
        $('#dfp-160-kare-sag').css("right",size+"px").show();
        $('#dfp-pageskin-sol').css("left",size+"px").show();
    }

    $("#sticky-container").sticky({
        topSpacing: $('header nav').outerHeight(),
        bottomSpacing: $('.ads').outerHeight() + $('footer').outerHeight()
    });


    /*--------------------------------------------------------
     Center Carousel Horizontal News Slider
     * --------------------------------------------------------*/
    if($('.books-slider').length > 0){
        $('.books-slider').bxSlider({
            slideWidth: 180,
            minSlides: 2,
            maxSlides: 5,
            slideMargin: 0,
            auto:true,
            pager:false,
            touchEnabled:true,
            oneToOneTouch:true,
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>'
        });
    }

})(jQuery);

