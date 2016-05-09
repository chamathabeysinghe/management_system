/**
 * Created by Chamath Abeysinghe on 5/8/2016.
 */
var $ITEM_TABLE = $('#item_table');
var $ITEM_SAVE = $('#item_save');


$('.table-add').click(function() {
    $.post(url_add_single_item, {project_id:project_id,itemName:'',serialNumber:'',unitCost:0,_token:token }).done(function(markup){

        var $clone = $ITEM_TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $clone.attr('data-id',markup);

        $clone.children('.name').attr('id','name'+markup);//repeat this for
        $clone.children('.serial').attr('id','serial'+markup);//repeat this for
        $clone.children('.cost').attr('id','cost'+markup);//repeat this for
        $ITEM_TABLE.find('table').append($clone);
    });




});

$('.table-remove').click(function(event) {
    var itemID=event.target.parentNode.parentNode.dataset['id'];
    console.log(itemID);
    $.post(url_deallocate, {item_id:itemID,_token:token });
    $(this).parents('tr').detach();
});

$('.change').click(function(event) {
    event.preventDefault();
    console.log('Change');
    var itemID=event.target.parentNode.parentNode.dataset['id'];
    var itemName=document.getElementById("name"+itemID).innerHTML;
    var serialNumber=document.getElementById("serial"+itemID).innerHTML;
    var unitCost=document.getElementById("cost"+itemID).textContent;
    $.post(url_update_item, {item_id:itemID,itemName:itemName,serialNumber:serialNumber,unitCost:unitCost,_token:token });
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