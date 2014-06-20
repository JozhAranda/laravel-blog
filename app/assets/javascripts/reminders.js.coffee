
$('#remind').validate
    rules:
        email:
            required: true
            email: true
    submitHandler: (form) ->
        button = $('#btn-remind')

        text = button.val()

        $(form).ajaxSubmit
            beforeSend: ->
                button.val('Sending Recovery Email...').prop('disabled', true)
            error: ->
                alertBox 'Server connection', 'Sorry, we lost the connection to the server'
            success: (response) ->
                return alertBox 'Remind', 'Sorry, your request cannot be submitted at this time' if response.success is false
                alertBox 'Password Recovery', 'The recovery email was sent successfully please check your inbox.'
                $(form).clearForm()
            complete: ->
                button.val(text).prop('disabled', false)
            dataType: 'JSON'

$('#reset').validate
    rules:
        email:
            required: true
            email: true
        password:
            required: true
        password_confirmation:
            required: true,
            equalTo: '#password'
    submitHandler: (form) ->
        button = $('#btn-reset')

        text = button.val()

        $(form).ajaxSubmit
            beforeSend: ->
                button.val('Resetting Your Password Email...').prop('disabled', true)
            error: ->
                alertBox 'Server connection', 'Sorry, we lost the connection to the server'
            success: (response) ->
                return alertBox 'Reset', 'Sorry, your request cannot be submitted at this time' if response.success is false
                location.href = response.redirect
            complete: ->
                button.val(text).prop('disabled', false)
            dataType: 'JSON'
