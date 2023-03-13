// Script to handle AJAX requests and dynamic functionality
$(document).ready(function() {
    // Handle checkbox click event
    $('input[type="checkbox"]').on('click', function() {
        var todo_id = $(this).data('id');
        var is_complete = $(this).is(':checked');
        // Make AJAX request to update ToDo item status
        $.ajax({
            url: '/todos/update_status',
            type: 'POST',
            data: { id: todo_id, status: is_complete ? 1 : 0 },
            success: function(result) {
                console.log(result);
            }
        });
    });
});

