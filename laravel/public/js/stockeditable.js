

var $S_TABLE = $('#s_table'); //Editabale stock table
var $S_SAVE = $('#s_save');     //save button

//add new row to the table
$('.table-add').click(function() {
    var $clone = $S_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $S_TABLE.find('table').append($clone);
    if ($clone.index() === 1) return; // Don't go above the header
    $clone.prev().before($clone.get(0));
});

//remove row from the table
$('.table-remove').click(function() {
    $(this).parents('tr').detach();
    calTotal();
});

//moving a row to the above function
$('.table-up').click(function() {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
});

//moving a row to the down function
$('.table-down').click(function() {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

//save button functionality
$S_SAVE.click(function() {
    console.log("start");
    var $rows = $S_TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase().replace(/\s/g, ''));

        console.log($(this).text().toLowerCase())
    });
    var error=false;
    // Turn all existing rows into a loopable array
    $rows.each(function() {
        if(!$(this).hasClass('not-write')){

            var $td = $(this).find('td');
            var h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach(function(header, i) {
                h[header] = $td.eq(i).text();

                //necessary validation parts for the columns
                if(i==0){
                    if( $td.eq(i).text().replace(/\s+/, "")==''){
                        error=true;
                        console.log("error");
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
                    if( $td.eq(i).text().replace(/\s+/, "")==''){
                        error=true;
                        var element=$td[1];
                        console.log('error in col 1')
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        console.log('no error in col 1')
                        var element=$td[1];
                        element.style.border='none';
                    }
                }
                if(i==2){
                    if( $td.eq(i).text().replace(/\s+/, "")==''){
                        error=true;
                        var element=$td[2];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[2];
                        element.style.border='none';
                    }
                }

                if(i==3){
                    if($td.eq(i).text().replace(/\s+/, "") =='' || isNaN($td.eq(i).text())){
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
                    if($td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
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
                    if( $td.eq(i).text().replace(/\s+/, "")==''){
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
                if(i==6){
                    if($td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
                        error=true;
                        var element=$td[6];
                        element.style.borderBottom='solid';
                        element.style.borderColor='#ff6666';
                    }
                    else{
                        var element=$td[6];
                        element.style.border='none';
                    }
                }
            });

            data.push(h);
        }
    });

    // Output the result
    var date=$('#date').val();
    var total=$('#final-value').text();
    //checking for errors
    var dealer_details=$('#dealer-list').find(":selected").attr("data-register_no");

    if(date==''){
        error=true;
        Materialize.toast('Date not selected', 2000, 'rounded')
    }
    if(dealer_details==null){
        error=true;
        Materialize.toast('Dealer not selected', 2000, 'rounded')
    }
    if(error){
        Materialize.toast('Stock not saved.', 2000, 'rounded')
    }
    else {
        $.post(url, {
            new_data: JSON.stringify(data),
            date: date,
            dealer_details: dealer_details,
            total: total,
            _token: token
        });
        Materialize.toast('Stock saved.', 2000, 'rounded')
    }




});