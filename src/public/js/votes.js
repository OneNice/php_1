refreshVotes();
function refreshVotes() {
    $('.vote').each(function (index) {
        var data = $(this).attr('data'),
            sel_class = 'five',
            percent = data * 100 /5;
        if(data<=4) sel_class = 'four';
        if(data<=3) sel_class = 'three';
        if(data<=2) sel_class = 'two';
        if(data<=1) sel_class = 'one';

        $(this).addClass(sel_class);

        $(this).find('.vote_line').css('height', percent + '%');
        $(this).find('.vote_mark').css('bottom', percent + '%');
    });

}