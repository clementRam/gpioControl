//this function sends and receives the pin's status
function change_state(pin, status) {
    //this is the http request
    var request = new XMLHttpRequest();
    request.open("GET", "gpio.php?pin=" + pin + "&status=" + status);
    request.send(null);
    //receiving information
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            return ('test');
        }
        //test if fail
        else if (request.readyState == 4 && request.status == 500) {
            alert("server error");
            return ('fail');
        }
        //else
        else {
            return false;
        }
    }
}

//this function exec change_state() for selected item
function gpio_selected(_this) {
    var gpioNumber = parseInt($(_this).val());
    if ($(_this).prop('checked')) {
        var new_status = change_state(gpioNumber, 0);
        if (new_status == false) {
            console.log('Error: change_state() fail');
            return false;
        }
    } else {
        var new_status = change_state(gpioNumber, 1);
        if (new_status == false) {
            console.log('Error: change_state() fail');
            return false;
        }
    }
}

$(function () {

    $('li').click(function () {
        var element = $(this).find('input');
        gpio_selected(element);
        if (element.prop('checked')) {
            element.prop('checked', false);
        }else{
            element.prop('checked', true);
        }
    });
});	
