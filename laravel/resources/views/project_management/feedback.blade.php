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

                    <form action="{{route('savefeedback',['project_id'=>$project_id])}}" method="post">

                        <div  class="inquiry">
                            <h4>How satisfied are you: </h4>

                            <div class="input-group" style="margin-bottom: 20px">
                                <label>With your experience of the most recent installation?</label>
                                <p>
                                    <input class="with-gap" name="group1"  value="1" type="radio" id="g1i1"  />
                                    <label for="g1i1">Very Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group1" value="2" type="radio" id="g1i2"  />
                                    <label for="g1i2">Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group1" value="3" type="radio" id="g1i3"  />
                                    <label for="g1i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group1" value="4" type="radio" id="g1i4"  />
                                    <label for="g1i4">Dissatisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group1" value="5" type="radio" id="g1i5"  />
                                    <label for="g1i5">Very Dissatisfied</label>
                                </p>

                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label>With the timeliness of installation?</label>
                                <p>
                                    <input class="with-gap" name="group2" value="1" type="radio" id="g2i1"  />
                                    <label for="g2i1">Very Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group2" value="2" type="radio" id="g2i2"  />
                                    <label for="g2i2">Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group2" value="3" type="radio" id="g2i3"  />
                                    <label for="g2i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group2" value="4" type="radio" id="g2i4"  />
                                    <label for="g2i4">Dissatisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group2" value="5" type="radio" id="g2i5"  />
                                    <label for="g2i5">Very Dissatisfied</label>
                                </p>
                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label>With the quality of our installation?</label>
                                <p>
                                    <input class="with-gap" name="group3" value="1" type="radio" id="g3i1"  />
                                    <label for="g3i1">Very Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group3" value="2" type="radio" id="g3i2"  />
                                    <label for="g3i2">Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group3" value="3" type="radio" id="g3i3"  />
                                    <label for="g3i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group3" value="4" type="radio" id="g3i4"  />
                                    <label for="g3i4">Dissatisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group3" value="5" type="radio" id="g3i5"  />
                                    <label for="g3i5">Very Dissatisfied</label>
                                </p>
                            </div>


                            <div class="input-group" style="margin-bottom: 20px" >
                                <label>that installation personnel are sufficiently knowledgeable and professional?</label>
                                <p>
                                    <input class="with-gap" name="group4" value="1" type="radio" id="g4i1"  />
                                    <label for="g4i1">Very Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group4" value="2" type="radio" id="g4i2"  />
                                    <label for="g4i2">Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group4" value="3" type="radio" id="g4i3"  />
                                    <label for="g4i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group4" value="4" type="radio" id="g4i4"  />
                                    <label for="g4i4">Dissatisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group4" value="5" type="radio" id="g4i5"  />
                                    <label for="g4i5">Very Dissatisfied</label>
                                </p>
                            </div>

                            <div class="input-group" style="margin-bottom: 20px" >
                                <label>With installation service overall?</label>
                                <p>
                                    <input class="with-gap" name="group5" value="1" type="radio" id="g5i1"  />
                                    <label for="g5i1">Very Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group5" value="2" type="radio" id="g5i2"  />
                                    <label for="g5i2">Satisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group5" value="3" type="radio" id="g5i3"  />
                                    <label for="g5i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group5" value="4" type="radio" id="g5i4"  />
                                    <label for="g5i4">Dissatisfied</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group5" value="5" type="radio" id="g5i5"  />
                                    <label for="g5i5">Very Dissatisfied</label>
                                </p>
                            </div>

                        </div>


                        <div  class="inquiry">

                            <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                            <div class="input-group">
                                <p>
                                    <input class="with-gap" name="group6" value="1" type="radio" id="g6i1"  />
                                    <label for="g6i1">Very Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group6" value="2" type="radio" id="g6i2"  />
                                    <label for="g6i2">Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group6" value="3" type="radio" id="g6i3"  />
                                    <label for="g6i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group6" value="4" type="radio" id="g6i4"  />
                                    <label for="g6i4">Disagree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group6" value="5" type="radio" id="g6i5"  />
                                    <label for="g6i5">Very Disagree</label>
                                </p>
                            </div>
                        </div>


                        <div  class="inquiry">

                            <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                            <div class="input-group">
                                <p>
                                    <input class="with-gap" name="group7" value="1" type="radio" id="g7i1"  />
                                    <label for="g7i1">Very Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group7" value="2" type="radio" id="g7i2"  />
                                    <label for="g7i2">Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group7" value="3" type="radio" id="g7i3"  />
                                    <label for="g7i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group7" value="4" type="radio" id="g7i4"  />
                                    <label for="g7i4">Disagree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group7" value="5" type="radio" id="g7i5"  />
                                    <label for="g7i5">Very Disagree</label>
                                </p>
                            </div>
                        </div>


                        <div class="inquiry">

                            <h4>Overall, the value of DES's seervice compared with the price paid is</h4>

                            <div class="input-group">
                                <p>
                                    <input class="with-gap" name="group8" value="1" type="radio" id="g8i1"  />
                                    <label for="g8i1">Very Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group8" value="2" type="radio" id="g8i2"  />
                                    <label for="g8i2">Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group8" value="3" type="radio" id="g8i3"  />
                                    <label for="g8i3">Neutral</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group8" value="4" type="radio" id="g8i4"  />
                                    <label for="g8i4">Disagree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group8" value="5" type="radio" id="g8i5"  />
                                    <label for="g8i5">Very Disagree</label>
                                </p>
                            </div>
                        </div>


                        <div class="inquiry">

                            <h4>Would you recommend our service?</h4>

                            <div class="input-group">
                                <p>
                                    <input class="with-gap" name="group9" value="1" type="radio" id="g9i1"  />
                                    <label for="g9i1">Very Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group9" value="2" type="radio" id="g9i2"  />
                                    <label for="g9i2">Agree</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="group9" value="3" type="radio" id="g9i3"  />
                                    <label for="g9i3">Neutral</label>
                                </p>

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