<div class="col-md-24 section-heading">
    <h5>Description</h5>
</div>
<div class="col-md-24 ">
    <div class="form-group">
        <label for="stock_description">Description of stock</label>
        <textarea name="stock_other[stock_description]"
            id="stock_description">{{old('stock_other.stock_description',($assets['stock_other']['stock_description'] ?? null))}}</textarea>
    </div>
</div>
<div class="col-md-24 section-heading">
    <h5>Valuation</h5>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="latest_value">Latest Value</label>
        <input type="number" step=".01" name="stock_other[latest_value]" id=""
            value="{{old('stock_other.latest_value',($assets['stock_other']['latest_value'] ?? null))}}">
    </div>
</div>

@include('admin.assets.step6.recorded_by')
@include('admin.assets.step6.entry_status')
