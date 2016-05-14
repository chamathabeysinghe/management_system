/**
 * Created by TK on 10/05/2016.
 */

function updateReturnRecord(){
    $.ajax({
        method:'POST',
        url:url3,
        data:{_token:token, returnid:return_id, data: $('#form').serialize()},
        success:function(data){
            successHTML = '<div class="alert-success alert"><ul>';
            successHTML += '<li> Records added successfully </li>';
            successHTML += '</ul></di>';
            $( '#form-errors' ).html( successHTML );
            //console.log(data);
        },
    });
    console.log('done');

}
function saveReturnRecord(){
    console.log('addreturn');
    if($('#warrantyselect').is(':checked')) {
        var selected="warranty";

    }else{
        selected="repair";
    }
    $.ajax({
        method:'POST',
        url:url2,
        data:{_token:token, data: $('#form').serialize(), customer:$('#customer').val(),contact:$('#contact').val(),email:$('#email').val(),address:$('#address').val(),option:selected},
        success:function(data){
            successHTML = '<div class="alert-success alert"><ul>';
            successHTML += '<li> Records added successfully </li>';
            successHTML += '</ul></di>';
            $( '#form-errors' ).html( successHTML );
            //console.log(data);
        },
        error :function( jqXhr ) {
            if( jqXhr.status === 401 ) //redirect if not authenticated user.
                $( location ).prop( 'pathname', 'auth/login' );
            if( jqXhr.status === 422 ) {
                //process validation errors here.
                var errors = jqXhr.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each( errors , function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></di>';

                $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
            } else {
                /// do some thing else
            }
        }
    });
    console.log('done');

}
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
            //error :function( jqXhr ) {
            //    if( jqXhr.status === 401 ) //redirect if not authenticated user.
            //        $( location ).prop( 'pathname', 'auth/login' );
            //    if( jqXhr.status === 422 ) {
            //        //process validation errors here.
            //        var errors = jqXhr.responseJSON; //this will get the errors response data.
            //        //show them somewhere in the markup
            //        //e.g
            //        errorsHtml = '<div class="alert alert-danger"><ul>';
            //
            //        $.each( errors , function( key, value ) {
            //            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            //        });
            //        errorsHtml += '</ul></di>';
            //
            //        $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
            //    } else {
            //        /// do some thing else
            //    }
            //}
        }).done(function(markup){

            $('#search_results').html(markup);
            $('#search_results').show();
            // console.log(msg);

        })
    }
    else{
        console.log("CLEAR");
        //$('#search_results').hide();
        //$('#search-results').hide();
    }

}
