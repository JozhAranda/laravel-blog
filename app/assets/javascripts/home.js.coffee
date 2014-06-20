
# returns to the previous page

$('#referer').on 'click', ->
    location.href = document.referrer

# bootbox alert dialog

window.alertBox = (header, content) ->
    
    bootbox.dialog
        title: header
        message: content
        buttons: 
            main:
                className: 'btn-primary btn-sm'
                label: 'OK'

# bootbox confirm box

window.confirmBox = (header, content, callback) ->
    
    bootbox.dialog
        title: header
        message: content
        buttons:
            main:
                className: 'btn-default btn-sm'
                label: 'CANCEL'
            success:
                className: 'btn-primary btn-sm'
                label: 'OK'
                callback: callback

# deletes a record from the database

window.destroyRecord = (anchor) ->
    $.ajax
        url: anchor.attr('href')
        type: 'POST'
        beforeSend: ->
            anchor.prop('disabled', true)
        error: ->
            alertBox 'Server connection', 'Sorry, we lost the connection to the server'
        success: (response) ->
            return alertBox 'Request result', 'Sorry, your request cannot be submitted at this time' if response.success is false
            location.reload()
        complete: ->
            anchor.prop('disabled', false)
        dataType: 'JSON'
