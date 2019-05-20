$('ul li').on("click", function () {
   $('.slide').hide(200);
   $('.' +$(this).attr('data')).show(200);
    $('ul li').removeClass('active');
   $(this).toggleClass('active');

   if($(this).attr('data')=='orders'){
      $.ajax({
          url: '/order/get',
          type: 'POST',
          success: function (res) {
              res = JSON.parse(res);
              if(res != null) {
                  var str = '';

                  res.forEach(function (value) {
                      var class_add = '';
                      if(!value['status_date']) { class_add += ' disabled_by_date'; }
                      if(value['status']) { class_add += ' disabled'; }
                      str += '<div class="o_event ' + class_add + '" dataid="' + value['id'] + '">';

                      str += '<div class="success_info"></div>';
                      str += '<div class="error_info"></div>';
                      str += '<span class="o_head">' + value['title'] + '<i class="add_cat">' + value['category'] + '</i>'+ '<span class="getVote" data="'+ value['event_id'] + '" datatitle="'+ value['title'] + '">Написать отзыв</span> ' + '</span>';
                      str += '<div class="o_content">';
                      str += '<div>';
                      str += '<span class="o_date"><b>Время:</b> ' + value['date'] + '</span>';
                      str += '<span class="o_price"><b>Место:</b> ' + value['place'] + '</span>';
                      str += '<span class="o_price"><b>Цена:</b> ' + value['price'] + ' руб.</span>';
                      str += '<span class="o_price"><b>Билет заказан:</b> ' + value['time'] + '</span>';

                      if(!value['status']  && value['status_date']) {
                          str += '<span class="o_cancel"> <a data="' + value['id'] + '" class="order_cancel">отменить</a></span>';
                      }
                      str += '</div>';
                      str += '<div>';
                      str += '<span class="o_seat"><div class="o_seat"><div>' + value['seat'][0] + '</div>Ряд<div></div></div><div class="o_seat"><div>' + value['seat'].slice(1) + '</div>Место<div></div></div></div>';

                      str += '</div>';
                      str += '</div>';

                      str += '</div>';

                  });
                  if(str == '') str ='Вы ещё не заказали ни одного билета :(';
                  $('.list').html(str);
                  $('.order_cancel').on('click', order_cancel);
                  $('.getVote').on('click', getVote);
              }
          },
          error: function (res) {
              console.log(res);
          }
      })
   }

});
$('.profile_btn').on('click', function () {
    var data = $(this).attr('data');
    $.ajax({
        url: '/lk/change/' + data,
        type: 'POST',
        data: {
            name: $('.profile input[name="name"]').val(),
            login: $('.profile input[name="login"]').val(),
            email: $('.profile input[name="email"]').val(),
            phone: $('.profile input[name="phone"]').val()
        },
        success: function (res) {
            if(res == '1') {
                $('.profile .success_info').html('Успешно изменено');
                $('.profile .success_info').fadeIn(300);
                setTimeout(function () {
                    $('.profile .success_info').fadeOut(300);
                }, 7000);
            }
            else{
                $('.profile .error_info').html(res);
                $('.profile .error_info').fadeIn(300);
                setTimeout(function () {
                    $('.profile .error_info').fadeOut(300);
                }, 7000);
            }
        },
        error: function (res) {
            $('.profile .error_info').html('Связь с серверов прервана');
            $('.profile .error_info').fadeIn(300);
            setTimeout(function () {
                $('.profile .error_info').fadeOut(300);
            }, 7000);
        }
    })
});
$('.pass_btn').on('click', function () {
    var data = $(this).attr('data');
    $.ajax({
        url: '/lk/change/' + data,
        type: 'POST',
        data: {
            password: $('.changePassword input[name="password"]').val(),
            password_new: $('.changePassword input[name="password_new"]').val()
        },
        success: function (res) {
            if(res == '1') {
                console.log(res);
                $('.changePassword .success_info').html('Успешно изменено');
                $('.changePassword .success_info').fadeIn(300);
                setTimeout(function () {
                    $('.changePassword .success_info').fadeOut(300);
                }, 7000);
            }
            else{
                console.log(res);
                $('.changePassword .error_info').html(res);
                $('.changePassword .error_info').fadeIn(300);
                setTimeout(function () {
                    $('.changePassword .error_info').fadeOut(300);
                }, 7000);
            }
        },
        error: function (res) {
            console.log(res);
            $('.changePassword .error_info').html('Связь с серверов прервана');
            $('.changePassword .error_info').fadeIn(300);
            setTimeout(function () {
                $('.changePassword .error_info').fadeOut(300);
            }, 7000);
        }
    })
});
function order_cancel() {
    var data = $(this).attr('data');
    $.ajax({
        url: '/order/cancel/',
        type: 'POST',
        data: {
            id: data
        },
        success: function (res) {
            if(res == '1') {
                $('.o_event[dataid=' + data + ']').addClass('disabled');
            }
            else{
                console.log(res);
            }
        },
        error: function (res) {
            console.log(res);
        }
    })
};

$('.lk_vote_star').on('mouseenter', function () {
    $('.lk_vote_star').removeClass('hide');
    $('.lk_vote_star').slice($(this).attr('data'),5).addClass('hide');
    $('.lk_vote input').attr('datavote', $(this).attr('data'));
});


function getVote() {
    var data = $(this).attr('data'),
    title = $(this).attr('datatitle');

    $('.blur').addClass('active');
    $('.lk_vote').addClass('active');

    $('.lk_vote_name').html(title);
    $('.lk_vote input').attr('dataid', data);
};
$('.lk_vote input').on('click', function (e) {
    e.preventDefault();
    var data = $(this).attr('dataid'),
        vote = $(this).attr('datavote')
    $.ajax({
        url: '/lk/vote/',
        type: 'POST',
        data: {
            id: data,
            vote: vote,
            comment: $('.lk_vote textarea').val()
        },
        success: function (res) {
            if(res == '1') {
                $('.lk_vote .success').fadeIn(300);
                $('.lk_vote .success').html('Отзыв добавлен');
                setTimeout(function () {
                    $('.lk_vote .success').fadeOut(300);
                },2500);
            }
            else{
                $('.lk_vote .error').fadeIn(300);
                $('.lk_vote .error').html(res);
                setTimeout(function () {
                    $('.lk_vote .error').fadeOut(300);
                },2500);
            }
        },
        error: function (res) {
            $('.lk_vote .error').fadeIn(300);
            $('.lk_vote .error').html('Потеряли связь с сервером :C');
            setTimeout(function () {
                $('.lk_vote .error').fadeOut(300);
            },2500);
        }
    })
});
$('.blur').on("click", function () {
    $('.lk_vote').removeClass('active');
    $('.blur').removeClass('active');
});