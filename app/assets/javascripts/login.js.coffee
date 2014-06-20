
$('#login').validate
	rules:
		email:
			required: true
			email: true
		password:
			required: true
	submitHandler: (form) ->
		button = $('#btn-login')

		text = button.val()

		$(form).ajaxSubmit
			beforeSend: ->
				button.val('Signing in').prop('disabled', true)
			error: ->
				alertBox 'Server connection', 'Sorry, we lost the connection to the server'
			success: (response) ->
				return alertBox 'Login', 'Sorry, your codes are incorrect, please try again' if response.success is false
				location.href = response.redirect
			complete: ->
				button.val(text).prop('disabled', false)
			dataType: 'JSON'
