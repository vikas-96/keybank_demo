    <div class="col-md-24 section-heading">
        <h5>Other Dues</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="society_dues" class="">Society Dues</label>
        <input type="number" name="other_dues[society_dues]" id="society_dues" value="{{old('other_dues.society_dues',($assets['other_dues']['society_dues'] ?? null))}}">
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="electricity_dues" class="">Electricity Dues</label>
        <input type="number" name="other_dues[electricity_dues]" id="electricity_dues" value="{{old('other_dues.electricity_dues',($assets['other_dues']['electricity_dues'] ?? null))}}">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="water_dues" class="">Water Dues</label>
        <input type="number" name="other_dues[water_dues]" id="water_dues" value="{{old('other_dues.water_dues',($assets['other_dues']['water_dues'] ?? null))}}">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="property_tax_dues" class="">Propery Tax Dues</label>
        <input type="number" name="other_dues[property_tax_dues]" id="property_tax_dues" value="{{old('other_dues.property_tax_dues',($assets['other_dues']['property_tax_dues'] ?? null))}}">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="other_dues_nature" class="">Other Dues - Nature</label>
        <input type="text" name="other_dues[other_dues_nature]" id="other_dues_nature" value="{{old('other_dues.other_dues_nature',($assets['other_dues']['other_dues_nature'] ?? null))}}">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="other_dues_amount" class="">Other Dues Amount</label>
        <input type="number" name="other_dues[other_dues_amount]" id="other_dues_amount" value="{{old('other_dues.other_dues_amount',($assets['other_dues']['other_dues_amount'] ?? null))}}">
    </div>
</div>
@push('js')
<script>

</script>

@endpush