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
    var error=false;
    $rows.each(function() {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function(header, i) {
            h[header] = $td.eq(i).text();
            if(i==0){
                if( $td.eq(i).text().replace(/\s+/, "")==''){
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
                if($td.eq(i).text().replace(/\s+/, "")==''){
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
            if(i==2){
                if($td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
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
        });

        data.push(h);
    });

    // Output the result

    var date=$('#date').val();
    var title=$('#title').val();
    var incharge=$('#incharge').val();
    var client=$('#client').val();
    var duration1=$('#duration').val();
    var duration=parseInt($('#duration').val());

    if(title==''){
        $('#title').addClass('invalid');
        error=true;
    }
    else{
        $('#title').removeClass('invalid');
    }
    if(incharge==''){
        $('#incharge').addClass('invalid');
        error=true;
    }
    else{
        $('#incharge').removeClass('invalid');
    }
    if(client==''){
        $('#client').addClass('invalid');
        error=true;
    }
    else{
        $('#client').removeClass('invalid');
    }

    if(!isValidDate(date)){
        console.log('not valid');
        $('#date').addClass('invalid');
        error=true;
    }
    else{
        $('#date').removeClass('invalid');
    }

    if(duration<=0){
        $('#duration').addClass('invalid');
        error=true;
    }
    else{
        $('#duration').removeClass('invalid');
    }


    if(error){
        Materialize.toast('Not Saved', 2000, 'rounded')
        event.preventDefault();
    }

    if(error){
        console.log('error occured')
        event.preventDefault();
    }
    else{

        $.post(url_allocation, {new_data:JSON.stringify(data) ,project_id:project_id,_token:token });
    }

});