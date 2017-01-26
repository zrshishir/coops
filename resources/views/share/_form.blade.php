<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-serial_no-error">
        {!! Form::label("serial_no","Serial No",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("serial_no",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="serial_no-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-member_name-error">
        {!! Form::label("member_name","Member Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("member_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="member_name-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-member_id-error">
        {!! Form::label("member_id","Member Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("member_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="member_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-mobile_no-error">
        {!! Form::label("mobile_no","Mobile No",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("mobile_no",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="mobile_no-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-date-error">
        {!! Form::label("date","Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("date12",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="date-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-share_number-error">
        {!! Form::label("share_number","No of Shres",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("share_number",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="share_number-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-share_amount-error">
        {!! Form::label("share_amount","Total Share Amount",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("share_amount",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="share_amount-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('share/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script>
    $("#frm").submit(function (event) {
        event.preventDefault();
        $('.loading').show();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('member_name');
                        if (index in data.errors) {
                            $("#form-" + index + "-error").addClass("has-error");
                            $("#" + index + "-error").html(data.errors[index]);
                        }
                        else {
                            $("#form-" + index + "-error").removeClass("has-error");
                            $("#" + index + "-error").empty();
                        }
                    });
                    $('#focus').focus().select();
                } else {
                    $(".has-error").removeClass("has-error");
                    $(".help-block").empty();
                    $('.loading').hide();
                    ajaxLoad(data.url, data.content);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });
</script>