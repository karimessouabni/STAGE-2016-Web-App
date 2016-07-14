var soon = '#000';
(function($) {
    var cache = [];
    $.preLoadImages = function() {
        var args_len = arguments.length;
        for (var i = args_len; i--;) {
            var cacheImage = document.createElement('img');
            cacheImage.src = arguments[i];
            cache.push(cacheImage);
        }
    }
})(jQuery)
$(document).ready(function() {
    $("header").fadeIn(3000);
    $("header ul").fadeIn(1500);

   
});
function hoverMe(rubrique, color) {

    $("body").animate({'backgroundColor': color}, {duration: 1500, queue: false});
    $('#'+rubrique+'').css({display: "block"});
    $('#'+rubrique+'').animate({opacity: "1"}, {duration: 1500, queue: false});
    $('#projects li a').css({color: "#FFFFFF"}); }
function outMe(rubrique) {
    $("body").animate({'backgroundColor': soon}, {duration: 1500, queue: false});
    $('#'+rubrique+'').css({display: "none"});
    $('#'+rubrique+'').animate({opacity: "0"}, {duration: 1500, queue: false});
    $('#projects li a').css({color: "#FFFFFF"});
}

    