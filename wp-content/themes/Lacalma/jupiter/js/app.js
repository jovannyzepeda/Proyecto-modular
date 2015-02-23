

jQuery(function() {
	var form = $('#contactform');
	var formMessages = $('#message');
	$(form).submit(function(e) {
		e.preventDefault();
		var formData = $(form).serialize();
		$.ajax({
			type: 'POST',
			url: 'http://localhost/proyecto_modular/wp-content/themes/Lacalma/jupiter/contact.php',
			data: formData
		})
		.done(function(response) {
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');
			$(formMessages).show();
			$(formMessages).text(response).fadeOut(15000);
			$('#name').val('');
		        $('#email').val('');
		       $('#phone').val('');
   		       $('#comments').val('');
		})
		.fail(function(data) {
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText).fadeOut(15000);
			} else {
				$(formMessages).show();
				$(formMessages).text('Ocurrio un error, el mensaje no pudo ser enviado.').fadeOut(15000);
			}
		});

	});
});
jQuery(function() {
	var form = $('#contactforms');
	var formMessages = $('#message');
	$(form).submit(function(e) {
		e.preventDefault();
		var formData = $(form).serialize();
		$.ajax({
			type: 'POST',
			url: 'http://localhost/proyecto_modular/wp-content/themes/Lacalma/jupiter/contact.php',
			data: formData
		})
		.done(function(response) {
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');
			$(formMessages).show();
			$(formMessages).text(response).fadeOut(15000);
			$('#name').val('');
		        $('#email').val('');
		       $('#phone').val('');
   		       $('#comments').val('');
		})
		.fail(function(data) {
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText).fadeOut(15000);
			} else {
				$(formMessages).show();
				$(formMessages).text('Ocurrio un error, el mensaje no pudo ser enviado.').fadeOut(15000);
			}
		});

	});
});