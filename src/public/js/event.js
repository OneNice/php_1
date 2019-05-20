$('.goOrd').on('click', function () {
   $('.popUp').toggleClass('active', true);
   $('.blur').toggleClass('active', true);

   if(some_places) {
       if (seats_and_times[$('.place_select').val()] !== undefined) {
           if (seats_and_times[$('.place_select').val()][$('.time_select').val()] !== undefined) {
               $.each(seats_and_times[$('.place_select').val()][$('.time_select').val()], function (index, value) {
                   $('.seat[fullseat=' + value + ']').addClass('booked');
               });
           }
       }
   }
   else{
       //console.log(1);
       $.each(seats_and_times, function (index, value) {
           $('.seat[fullseat=' + value + ']').addClass('booked');
       });
   }
});
$('.blur').on("click", function () {
    $('.popUp').removeClass('active');
    $('.blur').removeClass('active');
});
$('.seat').attr("fullseat", function () {
    return $(this).attr('data_row').concat($(this).attr('seat'));
});


//Если существует несколько мест проведения и времени
var time_sel = false, some_places = false;
updatePlaces();
function updatePlaces() {
    if ($('.place_select').length > 0) {
        some_places = true;
        $.each(places_and_times, function (index, value) {
            $('.place_select')
                .append($("<option></option>")
                    .attr("value", places_and_times[index][1])
                    .text(index));
            if (!time_sel) $.each(value[0], function (index2, value2) {
                $('.time_select')
                    .append($("<option></option>")
                        .attr("value", value2)
                        .text(value2));
                time_sel = true;
            });
        });
        $('.place_select').on('change', function () {
            var selected_place = $(this).find(":selected").text();  //Название места из списка
            $('.time_select').html('');
            $.each(places_and_times[selected_place][0], function (index, value) {  //Получаем время из этого места
                $('.time_select')
                    .append($("<option></option>")
                        .attr("value", value)
                        .text(value));
                time_sel = true;
            });
            $('.seat').removeClass('booked');
            if (seats_and_times[$('.place_select').val()] !== undefined) {
                if (seats_and_times[$('.place_select').val()][$('.time_select').val()] !== undefined) {
                    $.each(seats_and_times[$('.place_select').val()][$('.time_select').val()], function (index, value) {
                        $('.seat[fullseat=' + value + ']').addClass('booked');
                    });
                }
            }
        });
        $('.time_select').on('change', function () {        //Изменение времени мероприятия
            $('.seat').removeClass('booked');
            if (seats_and_times[$('.place_select').val()] !== undefined) {
                if (seats_and_times[$('.place_select').val()][$('.time_select').val()] !== undefined) {
                    $.each(seats_and_times[$('.place_select').val()][$('.time_select').val()], function (index, value) {
                        $('.seat[fullseat=' + value + ']').addClass('booked');
                    });
                }
            }
        });
    }
}


$('.seat').on('mouseenter', function () {
    $(this).find('.seat_info .info_row').html($(this).attr('data_row'));
    $(this).find('.seat_info .info_seat').html($(this).attr('seat'));
});
$('.seat').on('click', function () {
    if(userGlobal != 'false') {
        var id = $('.main_item').attr('data'),
            title = $('.main_item h1').html(),
            row = $(this).attr('data_row'),
            seat = $(this).attr('seat'),
            fullseat = $(this).attr('fullseat'),
            price = $('.main_item .price').attr('data');
        uCheck(id, title, row, seat, fullseat, price);

        //console.log($(this).attr('fullseat'), $('.main_item').attr('data'));
    }
    else {
        window.location.href = '/user/signup';
    }
});
function uCheck(id, title, row, seat, fullseat, price) {
    $('.orderBtns').show();
    $('div.success').hide();
    $('.check').toggleClass('active');
    $('.checkGo').attr('date_id', id);
    $('.checkGo').attr('fullseat', fullseat);

    $('.check h2').html(title);
    $('.check .a_row b').html(row);
    $('.check .a_seat b').html(seat);
    $('.check .a_price b').html(price);

    $('.check .a_place b').html(
        some_places ? $('.place_select').find(":selected").text() : $('span.place').html()
    );
    $('.check .a_date b').html(
        some_places ? $('.time_select').val() : $('span.date').html()
    );

}
$('.checkCansel').on('click', function () {
    $('.check').removeClass('active');
});
$('.checkGo').on('click', function () {
    $.ajax({
         url: '/order/add',
         data: {
             id: $(this).attr('date_id'),
             seat: $(this).attr('fullseat'),
             date: some_places ? $('.time_select').val() : null,
             place_id: some_places ? $('.place_select').val() : null
         },
         type: 'POST',
         success: function (res) {
             $('.seat[fullseat=' + $('.checkGo').attr('fullseat') + ']').addClass('booked');
             $('.orderBtns').hide();
             $('div.success').show();
             $('span.success').removeClass('error').html('Заказ сделан');
             console.log(res);
         },
         error: function (res) {
             $('.orderBtns').hide();
             $('div.success').show();
             $('span.success').addClass('error').html('Ошибка, попробуйте позже :C');
             console.log(res);
         }
    })
});