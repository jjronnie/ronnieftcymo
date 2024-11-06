// public/js/ajaxFormSubmit.js
$(document).ready(function() {
    // Attach AJAX form submission to all forms
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize(); // Get all form data

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Show success message
                    showNotification('success', response.success);
                } else if (response.error) {
                    // Show error message
                    showNotification('error', response.error);
                }
            },
            error: function(xhr) {
                // Handle error
                var errorMsg = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An error occurred';
                showNotification('error', errorMsg);
            }
        });
    });

    // Function to show notifications (success or error)
    function showNotification(type, message) {
        var notification = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            message + 
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>');

        $('body').prepend(notification); // Display notification at the top of the page
        setTimeout(function() {
            notification.alert('close');
        }, 5000); // Close the notification after 5 seconds
    }
});


