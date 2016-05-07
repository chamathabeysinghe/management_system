/**
 * Created by Chamath Abeysinghe on 5/5/2016.
 */
var $GP_TABLE = $('#gp_table');
var $GP_SAVE = $('#gp_save');


$('.table-add').click(function() {
    var $clone = $GP_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $GP_TABLE.find('table').append($clone);
});

$('.table-remove').click(function() {
    $(this).parents('tr').detach();
});

$('.table-up').click(function() {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
});

$('.table-down').click(function() {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$GP_SAVE.click(function() {
    var $rows = $GP_TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase().replace(/\s/g, ''));

        console.log($(this).text().toLowerCase())
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function(header, i) {
            h[header] = $td.eq(i).text();
        });

        data.push(h);
    });

    // Output the result

    $.post(url, {new_data:JSON.stringify(data) ,project_id:project_id,_token:token });




});