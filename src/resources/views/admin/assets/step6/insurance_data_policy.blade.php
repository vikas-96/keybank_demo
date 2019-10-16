    <div class="col-md-24 section-heading">
        <h5>Insurance Data Policy</h5>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="insurer_name" class="">Name of the Insurer</label>
            <input type="text" name="insurance_data_policy[insurer_name]" id="insurer_name" value="{{old('insurance_data_policy.insurer_name',($assets['insurance_data_policy']['insurer_name'] ?? null))}}">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="policy_no" class="">Policy No.</label>
            <input type="text" name="insurance_data_policy[policy_no]" id="policy_no" value="{{old('insurance_data_policy.policy_no',($assets['insurance_data_policy']['policy_no'] ?? null))}}">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="policy_type" class="">Policy Type</label>
            <input type="text" name="insurance_data_policy[policy_type]" id="policy_type" value="{{old('insurance_data_policy.policy_type',($assets['insurance_data_policy']['policy_type'] ?? null))}}">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="sum_assured" class="">Sum Assured</label>
            <input type="number" step=".01" name="insurance_data_policy[sum_assured]" id="sum_assured" value="{{old('insurance_data_policy.sum_assured',($assets['insurance_data_policy']['sum_assured'] ?? null))}}">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="premium_amount" class="">Premium Amount</label>
            <input type="number" step=".01" name="insurance_data_policy[premium_amount]" id="premium_amount" value="{{old('insurance_data_policy.premium_amount',($assets['insurance_data_policy']['premium_amount'] ?? null))}}">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="insurance_start_date" class="">Insurance Effective From Start Date</label>
            <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                <div class="date-picker">
                <input type="text" name="insurance_data_policy[insurance_start_date]" id="" value="{{ old('insurance_data_policy.insurance_start_date',($assets['insurance_data_policy']['insurance_start_date'] ?? null)) }}" readonly>
                <div class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="insurance_end_date " class="">Insurance Effective To End Date</label>
            <div class="input-group form-group date datepicker" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                <div class="date-picker">
                <input type="text" name="insurance_data_policy[insurance_end_date]" id="" value="{{ old('insurance_data_policy.insurance_end_date',($assets['insurance_data_policy']['insurance_end_date'] ?? null)) }}" readonly>
                <div class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
@push('js')
<script>
    
</script>

@endpush