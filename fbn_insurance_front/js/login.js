$('#login').click(function (e) {
    e.preventDefault();

    if ($('#email').val() === ''){
        $('#info_span').removeClass('hide');
        $('#info_span').addClass('error_message');
        $('#info_span').text('Email is empty');

    }else{
        $('#info_span').addClass('hide');
        $('#info_span').removeClass('error_message');
        $('#info_span').text('');
    }

    if ($('#password').val() === ''){
        $('#info_span').removeClass('hide');
        $('#info_span').addClass('error_message');
        $('#info_span').text('Password is empty');

    }else{
        $('#info_span').addClass('hide');
        $('#info_span').removeClass('error_message');
        $('#info_span').text('');
    }


    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: 'http://localhost/fbn_insurance/users/login', // the url where we want to POST
        processData: false,
        contentType: 'application/json',
        cache: false,
        data: JSON.stringify( {
            "username": $('#email').val(),
            "password": $('#password').val(),
            "api_key" : "V0VCX1NFQ1JFVF9LRVktRk9SX0lTU19DT05ORUNU" } ),
        dataType: 'json', // what type of data do we expect back from the server
    })
        // using the done promise callback
        .done(function (data, textStatus, jqXHR) {

            if (!data.status) {
                $('#info_span').removeClass('hide');
                $('#info_span').addClass('error_message');
                $('#info_span').text(data.message);
            } else {

                // console.log(data.data.token);
                localStorage.setItem('fbn_token', data.data.token);
                // setCookie('fbn', data.data.token, 1);
                location.href= 'dashboard.html';

            }
        })

        // process error information
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log data to the console so we can see
            $('#login').prop('disabled', false);
            // console.log(errorThrown);
        });

});

function setCookie(cname, cvalue, hrs) {
    var d = new Date();
    d.setTime(d.getTime() + (hrs * 60 * 60 * 1)); //hours
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {

    var cookies_code = getCookie('user_log');

    if (cookies_code === '') {
        modal_alert();
    } else {

        modal.style.display = 'none';
        $('#party_code').val(response_party_code);

    }
}