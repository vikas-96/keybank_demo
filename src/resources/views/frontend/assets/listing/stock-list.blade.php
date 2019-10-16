
    @if(in_array($template_id,config('list.stock_other.stock_description')))
    <div class="col-md-6">
        <span>Stock Description</span>
        <strong>{{ ($value['stock_other']['stock_description']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.stock_other.latest_value')))
    <div class="col-md-6">
        <span>Latest Value</span>
        <strong>{{ ($value['stock_other']['latest_value']) ?? null }}</strong>
    </div>
    @endif
    <div class="col-md-12">
    </div>

