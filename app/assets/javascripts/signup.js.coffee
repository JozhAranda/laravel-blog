
$('#signup').validate
	rules:
		email:
			required: true
			email: true
		password:
			required: true
		first_name:
			required: true
		last_name:
			required: true
	submitHandler: (form) ->
		button = $('#btn-user')

		text = button.val()

		$(form).ajaxSubmit
			beforeSend: ->
				button.val('Creating account...').prop('disabled', true)
			error: ->
				alertBox 'Server connection', 'Sorry, we lost the connection to the server'
			success: (response) ->
				return alertBox 'Signup', 'Sorry, your request cannot be submitted at this time' if response.success is false
				location.href = response.redirect
			complete: ->
				button.val(text).prop('disabled', false)
			dataType: 'JSON'
