
$('.destroy-user').on 'click', (event) ->
	event.preventDefault()

	button = $(this)

	bootbox.dialog
		message: 'Do you really want to delete this user?'
		title: 'Delete User'
		buttons:
			main:
				label: 'No'
				className: 'btn-default'
			success:
				label: 'Yes'
				className: 'btn-success'
				callback: ->
					button.closest('form').submit()


$('#user').validate
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
				button.val('Saving').prop('disabled', true)
			error: ->
				alertBox 'Server connection', 'Sorry, we lost the connection to the server'
			success: (response) ->
				return alertBox 'User', 'Sorry, your request cannot be submitted at this time' if response.success is false
				location.href = document.referrer
			complete: ->
				button.val(text).prop('disabled', false)
			dataType: 'JSON'
