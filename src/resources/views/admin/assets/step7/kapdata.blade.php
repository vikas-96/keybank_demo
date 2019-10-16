        
<div class="col-md-6">
    <div class="form-group">
        <label for="marketability" class="">Marketability</label>
        <select name="kapdata[marketability]" id="marketability">
            <option></option>
            @foreach(config('assets.marketability') as $k=>$v)
            <option value="{{$k}}" {{ (old('kapdata.marketability',($assets['kapdata']['marketability'] ?? null))==$k) ? "selected":"" }}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kap_price" class="">KAP Price(LOWER)</label>
            <input type="number" name="kapdata[kap_price]" id="kap_price" value="{{old('kapdata.kap_price',($assets['kapdata']['kap_price'] ?? null))}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="kap_price_upper" class="">KAP Price(UPPER)</label>
        <input type="number" name="kapdata[kap_price_upper]" id="kap_price_upper" value="{{old('kapdata.kap_price_upper',($assets['kapdata']['kap_price_upper'] ?? null))}}">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="packaging_suggestions" class="">Packaging Suggestions</label>
        <input type="text" name="kapdata[packaging_suggestions]" id="packaging_suggestions" value="{{old('kapdata.packaging_suggestions',($assets['kapdata']['packaging_suggestions'] ?? null))}}" maxlength="150">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="other_insights" class="">KAP Insights</label>
            <input type="text" name="kapdata[other_insights]" id="other_insights" value="{{old('kapdata.other_insights',($assets['kapdata']['other_insights'] ?? null))}}" maxlength="300">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="google_rating" class="">Google Rating</label>
            <input type="number" step="0.1" min="0" pattern="^\d+(?:\.\d{1,1})?$" name="kapdata[google_rating]" id="google_rating" value="{{old('kapdata.google_rating',($assets['kapdata']['google_rating'] ?? null))}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_of_reviews" class="">Number of Reviews</label>
            <input type="number" name="kapdata[no_of_reviews]" id="no_of_reviews" value="{{old('kapdata.no_of_reviews',($assets['kapdata']['no_of_reviews'] ?? null))}}">
        </div>
    </div>

@push('js')
<script>
  $('#marketability').select2({       
            dropdownAutoWidth : true,
            allowClear : true,
            width: '100%',
            placeholder: 'Select an option',
        });
</script>
@endpush