$("#slider-range").slider({
    range: true,
    min: 1,
    max: 50,
    step: 1,
    values: range_values,
    change: rangeChange,
    slide: function( event, ui ) {
        $( "#min-price").html(ui.values[ 0 ]);

        $( "#max-price").html(ui.values[ 1 ]);
    }
});
filter_category.forEach(function (val, index) {
    $('.filt_cat_item[dataid='+ val + ']').addClass('active');
});
$('.filt_cat_item').on('click', function () {
    $(this).toggleClass('active');
    if(filter_category.indexOf($(this).attr('dataid')) == -1)
    {
        filter_category.push($(this).attr('dataid'));
    }
    else{
        filter_category.splice(filter_category.indexOf($(this).attr('dataid')), 1);
    }
    $('.list').addClass('load');
    $.ajax({
        url: '/filter/save',
        data: {
            categories: filter_category,
            price_range: 'save',
            price_free: 'save',
        },
        type: 'POST',
        success: function (res) {
            $('.list').html(res);
            refreshVotes();
            $('.list').removeClass('load');
        },
        error: function (res) {
            $(this).removeClass('active');
            console.log(res);
            $('.list').removeClass('load');
        }
    });
});
$('.price_free').on('click', function () {
    $('.list').addClass('load');
        $.ajax({
            url: '/filter/save',
            data: {
                price_free: $(this).is(':checked'),
                categories: 'save',
                price_range: 'save',
            },
            type: 'POST',
            success: function (res) {
                $('.list').html(res);
                refreshVotes();
                $('.list').removeClass('load');
            },
            error: function (res) {
                $(this).prop('checked' , false);
                console.log(res);
                $('.list').removeClass('load');
            }
        });
});
function rangeChange() {
    var min = $('#slider-range').slider("values")[0];
    var max = $('#slider-range').slider("values")[1];
    var range = [min, max];

    $('.list').addClass('load');
    $.ajax({
        url: '/filter/save',
        data: {
            price_free: 'save',
            categories: 'save',
            price_range: range,
        },
        type: 'POST',
        success: function (res) {
            $('.list').html(res);
            refreshVotes();
            $('.list').removeClass('load');
        },
        error: function (res) {
            console.log(res);
            $('.list').removeClass('load');
        }
    });

}
$('.filter_clear').on('click', function () {
    filter_category = [];
    range_values = [1,50];
    $('#slider-range').slider("values", [1,50]);
    $('#max-price').html('50');
    $('#min-price').html('1');
    $('.price_free').prop('checked' , false);
    $('.filt_cat_item').removeClass('active');

    $('.list').addClass('load');
    $.ajax({
        url: '/filter/clear',
        type: 'POST',
        success: function (res) {
            $('.list').html(res);
            refreshVotes();
            $('.list').removeClass('load');
        },
        error: function (res) {
            console.log(res);
            $('.list').removeClass('load');
        }
    });
});