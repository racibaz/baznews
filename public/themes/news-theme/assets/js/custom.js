// TabSlider START....
var start = 0;
var delay = 0;
var listSlide;
var sTabLi = $('ul.slide-tab li');
var sTabLen = $('ul.slide-tab');
var newNumber = sTabLi.length / sTabLen.length;
//console.log(sTabLi.length +" - "+ sTabLen.length);



$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    var id = $(this).attr('href');
    $('.tab-pane .new-list').removeClass('slide-tab');
    $(id+' .new-list').addClass('slide-tab');
    delay = 0;
    sTabLi = $('ul.slide-tab li');
    sTabLen = $('ul.slide-tab').length;
    newNumber = sTabLi.length / sTabLen;
    //hoverNewList();
    //interval();
});

function interval() {
    listSlide = setInterval(function(){
        if (delay == newNumber) {delay = 0;}
        sTabLi.removeClass("active");
        $("ul.slide-tab li:eq("+delay+")").addClass("active");
        delay++;
        console.log(delay);
        console.log("newnumber = "+newNumber);
    }, 3000);
}
function hoverNewList() {
    sTabLi.hover(function () {
        clearInterval(listSlide);
        $(this).parent().parent().find('li').removeClass("active");
        $(this).addClass("active");
    }, function () {
        setTimeout(interval(),3000);
    });
}

//hoverNewList();
//interval();

//Üzerine gelince haber bilgileri resim üzerine basıyoruz.
function newsCoverList(a) {
    $(a+' .new-list li a').hover(function () {
        $(this).parent().find('.new-list li a').removeClass("active");
        $(this).addClass("active");
        var url = $(this).attr("href");
        var img = $(this).data("img");
        var title = $(this).data("title");
        var time = $(this).data("time");

        $('.left-img-ct').css("background","url("+img+")");
        $('.left-img-ct .full-link').attr("href",""+url+"");
        $('.left-img-ct .new-title').html(title);
        $('.left-img-ct .new-date .timeago').html(time);
    });
}



// ====Left Right Adverts====
var width = $(window).width();
var left =  $('#dfp-pageskin-sol').width();
var right =  $('#dfp-160-kare-sag').width();
var ct = $('#container').width();
$(window).resize(function () {
    //adsSize();
});
$(document).ready(function () {
    //adsSize();
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
// ====Left Right Adverts====

$("#sticky-container").sticky({
    topSpacing: $('header nav').outerHeight(),
    bottomSpacing: $('.ads').outerHeight() + $('footer').outerHeight()
});