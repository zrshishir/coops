<div class="col-md-12" border="1px solid black" style="background-color: #FBFBFB">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
        
        <th>
            <a href="javascript:ajaxLoad('withdraw/list?field=member_id&sort={{Session::get("withdraw_sort")=="asc"?"desc":"asc"}}')">
                Member Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('withdraw_field')=='member_id'?(Session::get('withdraw_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('withdraw/list?field=member_name&sort={{Session::get("withdraw_sort")=="asc"?"desc":"asc"}}')">
                Member Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('withdraw_field')=='member_name'?(Session::get('withdraw_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('withdraw/list?field=withdraw_number&sort={{Session::get("withdraw_sort")=="asc"?"desc":"asc"}}')">
                Duration
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('withdraw_field')=='withdraw_number'?(Session::get('withdraw_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('withdraw/list?field=withdraw_amount&sort={{Session::get("withdraw_sort")=="asc"?"desc":"asc"}}')">
               MonthlyInstallment
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('withdraw_field')=='withdraw_amount'?(Session::get('withdraw_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('withdraw/list?field=created_at&sort={{Session::get("withdraw_sort")=="asc"?"desc":"asc"}}')">
               Created Date
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('withdraw_field')=='created_at'?(Session::get('withdraw_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
    </tr>
    </thead>
    <tbody>
 
        <tr>
            
           <div >
                <td>                
                     {!! Form::text("MemberId",null,["class"=>"form-control readonly","id"=>"MemberId", "readonly" => "true"]) !!}
                </td>
            </div>
           <div >
                <td>                
                     {!! Form::text("MemberName",null,["class"=>"form-control readonly","id"=>"MemberName", "readonly" => "true"]) !!}
                </td>
            </div>
            <div >
                <td>                
                     {!! Form::text("Duration",null,["class"=>"form-control readonly","id"=>"Duration", "readonly" => "true"]) !!}
                </td>
            </div>
            <div >
                <td>                
                     {!! Form::text("MonthlyInstallment",null,["class"=>"form-control readonly","id"=>"MonthlyInstallment", "readonly" => "true"]) !!}
                </td>
            </div>
            <div >
                <td>                
                     {!! Form::date("date",null,["class"=>"form-control readonly","id"=>"created_at", "readonly" => "true"]) !!}
                </td>
            </div>
        </tr>
   
    </tbody>
</table>
</div>
<div class="col-md-12" style="background-color: #EAEAEA">
    <div class="form-group required col-md-6" id="form-serial_no-error">
        {!! Form::label("serial_no","Voutcher No",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("serial_no",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="serial_no-error" class="help-block"></span>
        </div>
    </div>
     <div class="form-group required col-md-6" id="form-withdraw_number-error">
        {!! Form::label("withdraw_number","Withdraw Number",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6" onChange= "updatePrice()">
            {!! Form::number("withdraw_number",null,["class"=>"form-control required","id"=>"withdraw_number" ]) !!}
            <span id="withdraw_number-error" class="help-block"></span>
        </div>
    </div>
     <div class="form-group required col-md-6" id="form-member_id-error">
        {!! Form::label("member_id","Member Id",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("member_id",null,["class"=>"form-control required","id"=>"focus", "readonly" => "true"]) !!}
            <span id="member_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-date-error">
        {!! Form::label("date","Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::date("date",\Carbon\Carbon::now(),["class"=>"form-control required","id"=>"focus", "readonly" => "true"]) !!}
            <span id="date-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-withdraw_amount-error">
        {!! Form::label("withdraw_amount","Withdraw Amount",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::number("withdraw_amount",null,["class"=>"form-control required","id"=>"withdraw_amount", "readonly" => "true"]) !!}
            <span id="withdraw_amount-error" class="help-block"></span>
        </div>
    </div>  
 
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('withdraw/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>


<!--<script type="text/javascript">
i = 0;
$(document).ready(function(){
    $("#withdraw_number").keypress(function(){
        $("#withdraw_amount").text(i += 1);
    });
});
</script> -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
<script>

    $(document).ready(function()
    {
            function updatePrice()
            {
                var withdraw_number = parseFloat($("#withdraw_number").val());
                var withdraw_amount = withdraw_number * 100.00;
                // var withdraw_amount = total.toFixed(2);
                $("#withdraw_amount").val(withdraw_amount);
            }
            $(document).on("change, keyup", "#withdraw_number", updatePrice);
    });

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
                        index = $(this).attr('member_id');
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
