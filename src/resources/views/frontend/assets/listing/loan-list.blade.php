@if(isset($value["loan"]["borrower_name"]))
<div class="col-md-6">
    <span>Borrower Name</span>
    <strong>{{$value["loan"]["borrower_name"]}}</strong>
</div>
@endif
@if(isset($value["loan"]["npa_date"]))
<div class="col-md-6">
    <span>NPA Date</span>
    <strong>{{$value["loan"]["npa_date"]}}</strong>
</div>
@endif