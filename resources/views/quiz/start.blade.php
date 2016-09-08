@extends('layouts.quiz')

@section('content')


        <!--Middle Content-->
<?php if(!empty($question)){?>

<style>
    .quesrion-detil .feld-chex {
        margin-bottom: 15px;
    }
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel main-div" style="width: 100%; margin-left: 0;">

        <?php $conter = 1;?>


        @include('messages.flash')
        @if (count($errors) > 0)
                <!--  <div class="alert alert-danger">
                                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                              <ul>
                                                  @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                                                  @endforeach
                </ul>
            </div> -->

        @endif
        @if(session('message'))
            {{session('message')}}
        @endif

        <div class="clearfix"></div>

        <div class="x_content">


            <div class="quesrion-detil">
                <div class=" clearfix">
                    <input type="hidden" name="question" id="question_id" value="<?=$question->id?>">
                    <input type="hidden" name="student_id" id="student_id" value="<?=$student_id?>">
                    <input type="hidden" name="quiz_id" id="quiz_id" value="<?=$question->quiz_id?>">
                    <input type="hidden" name="result_id" id="result_id" value="<?=$result->id?>">


                    <h1 style="    text-align: center; margin-bottom: 15px;" id="ques_title"><?=$question->title?></h1>


                </div>


                <div class="feld-chex">
                    <div class="squaredFour" id="option_1_select">
                        <input type="radio" name="question" value="1" class="question_index">


                    </div>
                    <div class="option_title">
                        <span id="option_a"><?=$question->option_a?></span>
                    </div>
                </div>
                <div class="feld-chex">
                    <div class="squaredFour" id="option_2_select">
                        <input type="radio" name="question" value="2" class="question_index">
                    </div>
                    <div class="option_title">
                        <span id="option_b"><?=$question->option_b?></span>
                    </div>
                </div>
                <div class="feld-chex">
                    <div class="squaredFour" id="option_3_select">
                        <input type="radio" name="question" value="3" class="question_index">
                    </div>
                    <div class="option_title">
                        <span id="option_c"><?=$question->option_c?></span>
                    </div>
                </div>
                <div class="feld-chex">
                    <div class="squaredFour" id="option_4_select">
                        <input type="radio" name="question" value="4" class="question_index">
                    </div>
                    <div class="option_title">
                        <span id="option_d"><?=$question->option_d?></span>
                    </div>
                </div>

                <div id="error_message">
                </div>
            </div>

            <button type="button" style="margin-bottom: 40px;margin-top: 35px;width: 100%;"
                    class="exam-next btn btn-success" id="next_button">Next
            </button>


        </div>

        {!! Form::close() !!}
    </div>
</div>
</div>


<script>
    $("#next_button").click(function () {

        var question_option = $('input:radio[name=question]:checked').val();

        if (question_option) {
            $("#error_message").html("");

            var result_id = $('#result_id').val();
            var student_id = $('#student_id').val();
            var question_id = $('#question_id').val();
            var quiz_id = $('#quiz_id').val();

            var submitUrl = '<?php echo url('quiz_submit')?>';

            $.ajax({
                type: "GET",
                data: {
                    option: question_option,
                    student_id: student_id,
                    question_id: question_id,
                    quiz_id: quiz_id,
                    result_id: result_id
                },
                url: submitUrl,

                success: function (data) {

                    var response = jQuery.parseJSON(data);
                    if (typeof response.quiz_completed == 'undefined' || !response.quiz_completed) {

                        var ques_id = response.id;

                        var question_title = response.title;
                        var option_a = response.option_a;
                        var option_b = response.option_b;
                        var option_c = response.option_c;
                        var option_d = response.option_d;

                        $("#ques_title").html('');

                        $("#ques_title").append(question_title);
                        $("#option_1_select").html('');
                        $("#option_1_select").append("<input type='radio' name='question' value='1' class='question_index'>");

                        $("#option_a").html('');
                        $("#option_a").append(option_a);

                        $("#option_2_select").html('');
                        $("#option_2_select").append("<input type='radio' name='question' value='2' class='question_index'>");

                        $("#option_b").html('');
                        $("#option_b").append(option_b);

                        $("#option_3_select").html('');
                        $("#option_3_select").append("<input type='radio' name='question' value='3' class='question_index'>");
                        $("#option_c").html('');
                        $("#option_c").append(option_c);

                        $("#option_4_select").html('');
                        $("#option_4_select").append("<input type='radio' name='question' value='4' class='question_index'>");
                        $("#option_d").html('');
                        $("#option_d").append(option_d);

                        $("#question_id").val(ques_id);
                    } else if( response.quiz_completed == 1){
                        $(".main-div").html("<b>Quiz Completed, and your score is "+response.score+"/"+response.total_que+"</b>");
                    } else {
                        var redirectUrl = '<?php echo url('quiz')?>';
                        window.location = redirectUrl;
                    }
                }
            });
        } else {
            $("#error_message").html("<p style='color: red'>Please select any one option</p>");
        }
    });

</script>


<?php }else{ ?>
<b>This quiz has no question yet</b>
<?php }?>
@endsection
