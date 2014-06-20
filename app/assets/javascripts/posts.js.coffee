
$('#post').validate
	rules:
		title:
			required: true
		content:
			required: true
	submitHandler: (form) ->
		button = $('#btn-post')

		text = button.val()

		$(form).ajaxSubmit
			beforeSend: ->
				button.val('Creating post...').prop('disabled', true)
			error: ->
				alertBox 'Server connection', 'Sorry, we lost the connection to the server'
			success: (response) ->
				return alertBox 'Post', 'Sorry, your request cannot be submitted at this time' if response.success is false
				location.href = document.referrer
			complete: ->
				button.val(text).prop('disabled', false)
			dataType: 'JSON'
