    <div class="col-md-24 section-heading">
        <h5>Others</h5>
    </div>
        
    <div class="col-md-12 ">
    <div class="form-group">
        <label for="other_property_details">Other Property Details
        </label>
        <input type="text" name="other[other_property_details]" id="other_property_details" value="{{ old('other.other_property_details',($assets['other']['other_property_details'] ?? null)) }}">
        </div>
    </div>


@push('js')
<script type="text/javascript">
</script>
@endpush