/**
 * Created by Chamath Abeysinghe on 5/5/2016.
 */
var $GP_TABLE = $('#gp_table');
var $GP_SAVE = $('#gp_save');


$('.table-add').click(function() {
    var $clone = $GP_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $GP_TABLE.find('table').append($clone);
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
    var error=false;
    $rows.each(function() {
        if(!$(this).hasClass('not-write')) {
            var $td = $(this).find('td');
            var h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach(function (header, i) {
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
                    if($td.eq(i).text().replace(/\s+/, "")!='' && isNaN($td.eq(i).text())){
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
                    if($td.eq(i).text().replace(/\s+/, "")!='' && isNaN($td.eq(i).text())){
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
                    if($td.eq(i).text().replace(/\s+/, "")!='' && isNaN($td.eq(i).text())){
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
                    if($td.eq(i).text().replace(/\s+/, "")=='' || isNaN($td.eq(i).text())){
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
    var total=$('#final-value').text();
    var date=$('#gp_date').val();
    var created_by=$('#prepare').val();
    var checked_by=$('#check').val();
    if(error){
        Materialize.toast('Gross profit not saved.', 2000, 'rounded')
    }
    else{
        $.post(url, {new_data:JSON.stringify(data) ,date:date,created_by:created_by,checked_by:checked_by,total_val:total,project_id:project_id,_token:token });
    }

});