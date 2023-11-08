function transport(checkout_id, transport_id) {
    var active = $(this).hasClass('selected');
    $.ajax({
        url: '/customer/checkout/transport',
        type: 'POSt',
        data: {
            _token: $('meta[name=_token]').attr('content'),
            checkout_id : checkout_id,
            transport_id : transport_id,
            active: active,
        },
        beforeSend: function() {
			$('#loader').fadeIn();
		},
		complete: function(){
			$('#loader').fadeOut();
		},
        success(result){
            $('#factor-container').html(result);
        },
        error(result){
            //
        }
    });
}

function addon(checkout_id, addon_id) {
    var active = $(this).hasClass('selected');
    $.ajax({
        url: '/customer/checkout/addon',
        type: 'POSt',
        data: {
            _token: $('meta[name=_token]').attr('content'),
            checkout_id : checkout_id,
            addon_id : addon_id,
            active: active,
        },
        beforeSend: function() {
			$('#loader').fadeIn();
		},
		complete: function(){
			$('#loader').fadeOut();
		},
        success(result){
            factor(checkout_id);
        },
        error(result){
            factor(checkout_id);
            console.log(result);
        }
    });
}

function factor(checkout_id) {
    $.ajax({
        url: '/customer/checkout/factor',
        type: 'POST',
        data: {
            _token: $('meta[name=_token]').attr('content'),
            checkout_id : checkout_id
        },
        beforeSend: function() {
            $('#loader').fadeIn();
        },
        complete: function(){
            $('#loader').fadeOut();
        },
        success(result){
            console.log(result);
            $('#factor-container').html(result);
        },
        error(result){
            console.log(result);
        }
    });
}
