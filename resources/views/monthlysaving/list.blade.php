@if(Auth::guest())
@else
<h1 class="page-header">Monthly Savings
    <div class="pull-right">
        <a href="javascript:ajaxLoad('monthlysaving/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('monthlysaving_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('monthlysaving/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('monthlysaving/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=member_id&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Member Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='member_id'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=member_name&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='member_name'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=saving_amount&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Last Month Save
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='saving_amount'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=withdrawal_amount&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Withdraw
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='withdrawal_amount'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=total_amount&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Total Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='total_amount'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       <!--  <th>
            <a href="javascript:ajaxLoad('monthlysaving/list?field=saving_amount&sort={{Session::get("monthlysaving_sort")=="asc"?"desc":"asc"}}')">
                Entry Saving Amount
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('monthlysaving_field')=='saving_amount'?(Session::get('monthlysaving_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th> -->
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($monthlysavings as $key=>$monthlysaving)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$monthlysaving->member_id}}</td>
            <td>{{$monthlysaving->member_name}}</td>
            <td>{{$monthlysaving->saving_amount}}</td>
            <td align="right">{{$monthlysaving->withdrawal_amount}}</td>
            <td>{{$monthlysaving->mobile_no}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('monthlysaving/update/{{$monthlysaving->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('monthlysaving/delete/{{$monthlysaving->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$monthlysavings->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$monthlysavings->total()}} records
    </i>
</div>
@endif
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>