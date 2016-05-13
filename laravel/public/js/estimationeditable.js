var $EST_TABLE = $('#est_table');
var $EST_SAVE = $('#est_save');


$('.table-add').click(function() {
    var $clone = $EST_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $EST_TABLE.find('table').append($clone);
    if ($clone.index() === 1) return; // Don't go above the header
    $clone.prev().before($clone.get(0));
});

$('.table-remove').click(function() {
    $(this).parents('tr').detach();
    calTotal();
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

$EST_SAVE.click(function() {
    var $rows = $EST_TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase().replace(/\s/g, ''));

        console.log($(this).text().toLowerCase())
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        if(!$(this).hasClass('not-write')){

            var $td = $(this).find('td');
            var h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach(function(header, i) {
                h[header] = $td.eq(i).text();
            });

            data.push(h);
        }
    });

    // Output the result
    var estimation_date=$('#estimation_date').val();
    var estimation_amount=$('#estimation_amount').val();
    var client_name=$('#client_name').val();
    var client_address=$('#client_address').val();
    var client_email=$('#client_email').val();
    var client_tel=$('#client_tel').val();
    $.post(url, {new_data:JSON.stringify(data),client_name:client_name,estimation_date:estimation_date, client_address:client_address, client_email:client_email, client_tel:client_tel, total_val:estimation_amount,_token:token });




});