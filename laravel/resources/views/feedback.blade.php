{{--This view is to take feedback from a client--}}

@extends('layouts.master')
@section('title')
    Feedback Form
    @endsection
@section('content')
    <style>
        .inquiry{
            /*border-radius: 25px;*/
            /*border: 2px solid #5361ad;*/
            /*padding: 20px;*/
            margin-bottom: 30px;
        }
        .inquiry h4{
            color: #797979;
        }
        .inquiry label{
            color: #6e6e6e;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <h3>Client feedback form</h3>

            <div class="row">
                <div class="col-md-8 col-md-offset-2" >

                    <form action="{{route('savefeedback')}}" method="post">


                        <div  class="inquiry">
                            <h4>How satisfied are you: </h4>

                            <div class="input-group" style="margin-bottom: 20px">
                                <label for="second">With yur experience of the most recent installation?</label>
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="installation">Very Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="installation">Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="installation">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="installation">Dissatisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="installation">Very Dissatisfied<br>
                                    </span>
                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label for="second">With the timeliness of installation?</label>
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="timeliness">Very Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="timeliness">Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="timeliness">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="timeliness">Dissatisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="timeliness">Very Dissatisfied<br>
                                    </span>
                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label for="second">With the quality of our installation?</label>
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="quality">Very Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="quality">Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="quality">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="quality">Dissatisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="quality">Very Dissatisfied<br>
                                    </span>
                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label for="second">that installation personnel are sufficiently knowledgeable and professional?</label>
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="personnel">Very Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="personnel">Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="personnel">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="personnel">Dissatisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="personnel">Very Dissatisfied<br>
                                    </span>
                            </div>

                            <div class="input-group" style="margin-bottom: 20px" >
                                <label for="second">With installation service overall?</label>
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="overall">Very Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="overall">Satisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="overall">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="overall">Dissatisfied<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="overall">Very Dissatisfied<br>
                                    </span>
                            </div>

                        </div>


                        <div  class="inquiry">

                            <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                            <div class="input-group">
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="understanding">Very Agree<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="understanding">Agree<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="understanding">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="understanding">Disagree<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="understanding">Strongly Disagree<br>
                                    </span>
                            </div>
                        </div>


                        <div  class="inquiry">

                            <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                            <div class="input-group">
                                    <span class="input-group-addon">

                                        <input type="radio" value="Very Satisfied" name="understanding">Very Agree<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Satisfied" name="understanding">Agree<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Neutral" name="understanding">Neutral<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Dissatisfied" name="understanding">Disagree<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Very Dissatisfied" name="understanding">Strongly Disagree<br>
                                    </span>
                            </div>
                        </div>


                        <div class="inquiry">

                            <h4>Overall, the value of DES's seervice compared with the price paid is</h4>

                            <div class="input-group">
                                    <span class="input-group-addon">

                                        <input type="radio" value="Excellent" name="value">Excellent<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="Very Good" name="value">Very Good<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Good" name="value">Good<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Fair" name="value">Fair<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="poor" name="value">Poor<br>
                                    </span>
                            </div>
                        </div>


                        <div class="inquiry">

                            <h4>Would you recommend our service?</h4>

                            <div class="input-group">
                                    <span class="input-group-addon">

                                        <input type="radio" value="Yes" name="recommendation">Yes<br>
                                    </span>
                                    <span class="input-group-addon">

                                         <input type="radio" value="No" name="recommendation">No<br>
                                    </span>
                                    <span class="input-group-addon">
                                         <input type="radio" value="Not sure" name="recommendation">Not sure<br>
                                    </span>

                            </div>
                        </div>

                        <div class="inquiry">

                            <h4>Other comments</h4>

                            <textarea cols="90" rows="5" name="comments" style="alignment: center"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary col-md-offset-">Submit</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">

                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection