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


    });

    // Turn all existing rows into a loopable array
    var error=false;
    $rows.each(function() {
        if(!$(this).hasClass('not-write')){

            var $td = $(this).find('td');
            var h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach(function(header, i) {
                h[header] = $td.eq(i).text();

                if(i==0){
                    if( $td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
                        error=true;
                        var element=$td[0];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[0];
                        element.style.border='none';
                    }
                }

                if(i==1){
                    if( $td.eq(i).text().replace(/\s+/, "")=='' ){
                        error=true;
                        var element=$td[1];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[1];
                        element.style.border='none';
                    }
                }

                if(i==3){
                    if( $td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
                        error=true;
                        var element=$td[3];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[3];
                        element.style.border='none';
                    }
                }

                if(i==4){
                    if( $td.eq(i).text().replace(/\s+/, "")=='' ){
                        error=true;
                        var element=$td[4];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[4];
                        element.style.border='none';
                    }
                }

                if(i==5){
                    if( $td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
                        error=true;
                        var element=$td[5];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[5];
                        element.style.border='none';
                    }
                }



            });

            data.push(h);
        }
    });

    // Output the result
    var quotation_date=$('#quotation_date').val();
    var quotation_amount=$('#quotation_amount').text();
    console.log(quotation_amount);
    var client_name=$('#client_name').val();
    var client_address=$('#client_address').val();
    var client_email=$('#client_email').val();
    var client_tel=$('#client_tel').val();
    if(error){
        Materialize.toast('Quotation Not Saved', 2000, 'rounded red')
    }
    else {
        Materialize.toast('Quotation Saved Successfully', 2000, 'rounded blue')
        $.post(url, {
            new_data: JSON.stringify(data),
            client_name: client_name,
            quotation_date: quotation_date,
            client_address: client_address,
            client_email: client_email,
            client_tel: client_tel,
            quotation_amount: quotation_amount,
            _token: token
        });
    }



});