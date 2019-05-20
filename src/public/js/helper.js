/* Поиск */
var events = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

events.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'events',
    display: 'title',
    limit: 6,
    source: events
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
/* ////Поиск */

$('window').on("resize", resize);
resize();
function resize() {
   $('.tops').css("height", $('.tops').outerWidth()*0.33);
};
$('.tops').slick(
    {
        dots: true,
        arrows: false
    }
);

$('.success_message, .error_message').on('click', function () {
    $(this).hide(300);
});
$('window').on('load', function () {
    if($(document).height() <= $(window).height())
    {
        console.log(document.body.offsetHeight  , $(window).height());
        $('footer').addClass('fixed');
    }
});

$(document).on('scroll', function(){
    if($('html').scrollTop()>80)
    {
        $('nav .menu_fixed:not(.active)').addClass('active');
    }
    else{
        $('nav .menu_fixed').removeClass('active');
    }
});