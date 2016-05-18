var timer;


//on key down start a timer and run a query to search
//after it wiill add serach result div
function down(){
    console.log('down');
    var fiterString='';
    $('input[name="fileter"]:checked').each(function() {

        fiterString+=this.value+' ';
    });
    timer=setTimeout(function(){

        var keywords=$('#search-input').val();

        if(keywords.length>0){
            $.ajax({
                method:'POST',
                url:url,
                data:{keyWords:keywords,filter:fiterString,_token:token}
            }).done(function(markup){

                $('#search-results').html(markup);
                $('#all-results').hide();
                $('#search-results').show();

            })
        }
        else{

            $('#search-results').hide();
            $('#all-results').show();
        }
    },10);
}

//clear the timer
function up(){
    clearTimeout(timer);
}