var $Q_TABLE = $('#q_table');
var $Q_SAVE = $('#q_save');


$('.table-add').click(function() {
    var $clone = $Q_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $Q_TABLE.find('table').append($clone);
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

$Q_SAVE.click(function() {
    var $rows = $Q_TABLE.find('tr:not(:hidden)');
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
    var quotation_date=$('#quotation_date').val();
    var quotation_amount=$('#quotation_amount').val();
    var client_name=$('#client_name').val();
    var client_address=$('#client_address').val();
    var client_email=$('#client_email').val();
    var client_tel=$('#client_tel').val();
    $.post(url, {new_data:JSON.stringify(data),client_name:client_name,quotation_date:quotation_date, client_address:client_address, client_email:client_email, client_tel:client_tel, total_val:quotation_amount,_token:token });




});