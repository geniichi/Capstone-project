$(document).ready(function () {
    $('#search-form').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        var formData = $(this).serialize();

        // Send an AJAX request to the server
        $.ajax({
            type: 'GET',
            url: $(this).attr('action'),
            data: formData,
            success: function (data) {
                $('#feedOthers-main-container').html(data); // Update the search results on the page
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText); // Log the error message
            }
        });
    });
});
