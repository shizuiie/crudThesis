
  $(document).ready(function() {
    $('th>i.fa-sort').click(function() {
      var table = $(this).closest('table');
      var rows = table.find('tbody tr').toArray();
      var sortDirection = $(this).hasClass('fa-sort-asc') ? 'desc' : 'asc';
      $(this).toggleClass('fa-sort-asc fa-sort-desc');

      if ($(this).parent().index() === 1) { // Title column
        rows.sort(function(a, b) {
          var titleA = $(a).find('td:nth-child(2)').text().toLowerCase();
          var titleB = $(b).find('td:nth-child(2)').text().toLowerCase();
          if (sortDirection === 'asc') {
            return titleA.localeCompare(titleB);
          } else if (sortDirection === 'desc') {
            return titleB.localeCompare(titleA);
          } else { // default sorting (no sorting)
            return 0;
          }
        });
      } else if ($(this).parent().index() === 4) { // Year column
        rows.sort(function(a, b) {
          var yearA = $(a).find('td:nth-child(5)').text();
          var yearB = $(b).find('td:nth-child(5)').text();
          if (sortDirection === 'asc') {
            return yearA.localeCompare(yearB);
          } else if (sortDirection === 'desc') {
            return yearB.localeCompare(yearA);
          } else { // default sorting (no sorting)
            return 0;
          }
        });
      }

      table.find('tbody').append(rows);
    });
  });

  $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            var searchValue = $(this).val().toLowerCase();
            $('#thesis-table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });