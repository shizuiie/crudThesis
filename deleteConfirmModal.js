$(document).ready(function() {
    var thesisId;

    $('a.delete').on('click', function(event) {
        event.preventDefault();
        thesisId = $(this).attr('href').split('=')[1];
        $('#deleteModal').modal('show');
    });

    $('#delete-btn').on('click', function() {
        if (thesisId !== undefined) {
            window.location.href = 'delete.php?id=' + thesisId;
        } else {
            console.error('Thesis ID is undefined');
        }
    });
    //FOR Cancel Button
    $('#deleteModal').on('click', '.btn-secondary', function() {
    $('#deleteModal').modal('hide');
    });
    //For X icon
    $('#deleteModal').on('click', '.close', function() {
    $('#deleteModal').modal('hide');
    });
});