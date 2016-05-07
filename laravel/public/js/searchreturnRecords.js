//
//$('#search-input').keydown(function(){
//    console.log("It works");
//    //$('#search-input').css("background-color", "pink");
//});


function getReturnRecord(){
    console.log('searchreturn');


        var keywords=$('#search-input').val();
       // var selected1=$('#jobNo').val();
       // var selected2=$('#itemCode').val();
     if($('#jobNo').is(':checked')) {
         var selected="jobNo";

     }else{
         var selected="itemCode";
    }

        if(keywords.length>0){
            $.ajax({
                method:'POST',
                url:url,
                data:{keyWords:keywords,_token:token,searchType:selected}
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
