// Sağ kısımda hover spot haber slider..
var start=0;
var delay = 0;
var listSlide;
$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    delay=0;
});

$('#video ul.new-list li').hover(function () {
    clearInterval(listSlide);
    $('#video ul.new-list li').removeClass("active");
    $(this).addClass("active");
    delay = 0;
}, function () {
    slideInterval('#video');
});

$('#son_dakika ul.new-list li').hover(function () {
    clearInterval(listSlide);
    $('#son_dakika ul.new-list li').removeClass("active");
    $(this).addClass("active");
    delay = 0;
}, function () {
    slideInterval('#son_dakika');
});

$('#cok_okunanlar ul.new-list li').hover(function () {
    clearInterval(listSlide);
    $('#cok_okunanlar ul.new-list li').removeClass("active");
    $(this).addClass("active");
    delay = 0;
}, function () {
    slideInterval('#cok_okunanlar');
});

function slideInterval(id) {
    var newNumber = $(id+' ul.new-list li').length;
    listSlide = setInterval(function(){
        if (delay == newNumber) {
            delay = 0;
        }
        $(id+' ul.new-list li').removeClass("active");
        $(id+" ul.new-list li:eq("+delay+")").addClass("active");
        delay++;
    }, 3000);
}
slideInterval('#video');
slideInterval('#son_dakika');
slideInterval('#cok_okunanlar');
// -----------

$('.new-list-ct .new-list li a').hover(function () {
    $('.new-list-ct .new-list li a').removeClass("active");
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
    $('#dfp-160-kare-sag').css("right",size+"px");
    $('#dfp-pageskin-sol').css("left",size+"px");
}

$("#sticky-container").sticky({
    topSpacing: $('header nav').outerHeight(),
    bottomSpacing: $('.ads').outerHeight() + $('footer').outerHeight()
});