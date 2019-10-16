<div class="col-md-24 section-heading">
    <h5>Valuation Details</h5>
</div>
<div class="input-group form-group date past_date col-md-6" data-provide="datepicker" data-date-format="dd/mm/yyyy">
    <div class="form-group">
        <label for="latest_valuation_report_date_1" class="required">Date of Latest Valuation Report - 1 </label>
        <div class="date-picker">
            <input type="text" class="form-control" name="valuation[latest_valuation_report_date_1]" required="true"
                id="latest_valuation_report_date_1"
                value="{{old('valuation.latest_valuation_report_date_1',($assets['valuation']['latest_valuation_report_date_1'] ?? null))}}">
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
<div class="input-group form-group date past_date col-md-6" data-provide="datepicker" data-date-format="dd/mm/yyyy">
    <div class="form-group">
        <label for="latest_valuation_report_date_2">Date of Latest Valuation Report - 2</label>
        <div class="date-picker">
            <input type="text" class="form-control" name="valuation[latest_valuation_report_date_2]" id="latest_valuation_report_date_2"
                value="{{old('valuation.latest_valuation_report_date_2',($assets['valuation']['latest_valuation_report_date_2'] ?? null))}}">
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="fair_market_value_1" class="required">Fair Market Value - Latest - 1 </label>
        <input type="number" step=".01" name="valuation[fair_market_value_1]" required="true" id="fair_market_value_1"
            value="{{old('valuation.fair_market_value_1',($assets['valuation']['fair_market_value_1'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="fair_market_value_2">Fair Market Value - Latest - 2</label>
        <input type="number" step=".01" name="valuation[fair_market_value_2]" id="fair_market_value_2"
            value="{{old('valuation.fair_market_value_2',($assets['valuation']['fair_market_value_2'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="realizable_value_sanction_date" class="">Realizable Value - Sanction Date</label>
        <input type="text" class="form-control" name="valuation[realizable_value_sanction_date]"
            id="realizable_value_sanction_date"
            value="{{old('valuation.realizable_value_sanction_date',($assets['valuation']['realizable_value_sanction_date'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="realizable_value_sanction_date" class="">Realizable Value - Recall Date</label>
        <input type="text" class="form-control" name="valuation[realizable_value_recall_date]"
            id="realizable_value_recall_date"
            value="{{old('valuation.realizable_value_recall_date',($assets['valuation']['realizable_value_recall_date'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="realizable_value_1" class="">Realizable Value - Latest - 1 </label>
        <input type="number" step=".01" name="valuation[realizable_value_1]" id="realizable_value_1"
            value="{{old('valuation.realizable_value_1',($assets['valuation']['realizable_value_1'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="realizable_value_2" class="">Realizable Value - Latest - 2 </label>
        <input type="number" step=".01" name="valuation[realizable_value_2]" id="realizable_value_2"
            value="{{old('valuation.realizable_value_2',($assets['valuation']['realizable_value_2'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="forced_sale_value_1" class="">Forced Sale Value - Latest - 1</label>
        <input type="number" step=".01" class="form-control" name="valuation[forced_sale_value_1]"
            id="realizable_value_sanction_date"
            value="{{old('valuation.forced_sale_value_1',($assets['valuation']['forced_sale_value_1'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="forced_sale_value_2">Forced Sale Value - Latest - 2</label>
        <input type="number" step=".01" class="form-control" name="valuation[forced_sale_value_2]" id="forced_sale_value_2"
            value="{{old('valuation.forced_sale_value_2',($assets['valuation']['forced_sale_value_2'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="rental_rate_area">Rental Rate in the Area</label>
        <input type="text" class="form-control" name="valuation[rental_rate_area]" id="rental_rate_area"
            value="{{old('valuation.rental_rate_area',($assets['valuation']['rental_rate_area'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="insurance_value">Insurance Value</label>
        <input type="text" class="form-control" name="valuation[insurance_value]" id="insurance_value"
            value="{{old('valuation.insurance_value',($assets['valuation']['insurance_value'] ?? null))}}">
    </div>
</div>



@push('js')
<script type="text/javascript">

</script>
@endpush