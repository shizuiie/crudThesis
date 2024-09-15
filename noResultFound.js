$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#search-input').on('keyup', function(){
        var searchTerm = $(this).val().toLowerCase();
        var rowCount = 0;
        $('#thesis-table tbody tr').each(function(){
            var rowText = $(this).text().toLowerCase();
            if(rowText.indexOf(searchTerm) >= 0){
                $(this).show();
                rowCount++;
            } else {
                $(this).hide();
            }
        });
        if(rowCount == 0){
            $('#no-results').text("No result found").show();
        } else {
            $('#no-results').hide();
        }
    });
});