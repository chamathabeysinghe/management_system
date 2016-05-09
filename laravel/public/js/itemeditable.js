/**
 * Created by Chamath Abeysinghe on 5/8/2016.
 */
var $ITEM_TABLE = $('#item_table');
var $ITEM_SAVE = $('#item_save');


$('.table-add').click(function() {
    var $clone = $ITEM_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $ITEM_TABLE.find('table').append($clone);
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

$ITEM_SAVE.click(function() {
    var $rows = $ITEM_TABLE.find('tr:not(:hidden)');
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

    console.log(project_id);
    console.log('done');
    $.post(url_allocation, {new_data:JSON.stringify(data) ,project_id:project_id,_token:token });
});