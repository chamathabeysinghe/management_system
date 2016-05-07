//
//$('#search-input').keydown(function(){
//    console.log("It works");
//    //$('#search-input').css("background-color", "pink");
//});


function getItem(){
    console.log('searchitem');


        var keywords=$('#search-input').val();

        if(keywords.length>0){
            $.ajax({
                method:'POST',
                url:url,
                data:{keyWords:keywords,_token:token}
            }).done(function(markup){

                $('#search_results').html(markup);
                $('#search_results').show();
               // console.log(msg);

            })
        }
        else{
            console.log("CLEAR");
            $('#search_results').hide();
            //$('#search-results').hide();
        }

}
