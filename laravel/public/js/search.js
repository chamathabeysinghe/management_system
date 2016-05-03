//
//$('#search-input').keydown(function(){
//    console.log("It works");
//    //$('#search-input').css("background-color", "pink");
//});

var timer;
function down(){
    console.log('down');
    timer=setTimeout(function(){

        var keywords=$('#search-input').val();

        if(keywords.length>0){
            $.ajax({
                method:'POST',
                url:url,
                data:{keyWords:keywords,_token:token}
            }).done(function(markup){

                $('#search-results').html(markup);
                $('#all-results').hide();
                $('#search-results').show();
               // console.log(msg);

            })
        }
        else{
            console.log("CLEAR");
            $('#search-results').hide();
            $('#all-results').show();
            //$('#search-results').hide();
        }
    },10);
}
function up(){
    clearTimeout(timer);
}