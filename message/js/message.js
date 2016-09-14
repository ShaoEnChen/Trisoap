$('.choice-photo').mouseenter(function() {
    $(this).removeClass('out-top');
    $(this).addClass('in-top');
});

$('.choice-photo').mouseleave(function() {
    $(this).removeClass('in-top');
    $(this).addClass('out-top');
});

$('.choice-video').mouseenter(function() {
    $(this).removeClass('out-top');
    $(this).addClass('in-top');
});

$('.choice-video').mouseleave(function() {
    $(this).removeClass('in-top');
    $(this).addClass('out-top');
});