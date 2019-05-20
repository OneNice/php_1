

$(document).ready(function() {
    $('form.login').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            login: {
                validators: {
                    notEmpty: {},
                    stringLength: {
                        min: 4,
                        max: 30,
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {},
                    stringLength: {
                        min: 2,
                        max: 30,
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {},
                    emailAddress: {}
                }
            },
            password: {
                validators: {
                    notEmpty: {},
                    stringLength: {
                        min: 6,
                        max: 30,
                    }
                }
            },
            phone: {
                validators: {
                    regexp: {
                        regexp: /^[+][0-9]{3}-[0-9]{2}\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/,
                        message: 'Заполните телефон в правильном формате +375-XX XXX-XX-XX'
                    }
                }
            }
        }
    });
    $('.rasp').css('height', $(window).outerHeight() - $('header').outerHeight() - $('nav').outerHeight() - $('footer').outerHeight());
});

