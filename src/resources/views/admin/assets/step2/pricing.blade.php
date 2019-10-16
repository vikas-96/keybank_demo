    <div class="col-md-24 section-heading">
        @if(in_array($template_id,['T6','T7','T8','T9','T12']))
        <h5>Value based on Reckoner Rate</h5>
        @else
        <h5>Pricing</h5>
        @endif
    </div>
        @if(in_array($template_id,config('template.pricing.rental_amount')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="rental_amount">Rental Amount (In Rs. / month)
                </label>
                <input type="number" step=".01" name="pricing[rental_amount]" id="rental_amount"
                    value="{{ old('pricing.rental_amount',($assets['pricing']['rental_amount'] ?? null)) }}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.pricing.based_on_reckoner_rate')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="based_on_reckoner_rate">Value based on Reckoner Rate
                </label>
                <input type="number" step=".01" name="pricing[based_on_reckoner_rate]" id="based_on_reckoner_rate"
                    value="{{ old('pricing.based_on_reckoner_rate',($assets['pricing']['based_on_reckoner_rate'] ?? null)) }}">
            </div>
        </div>
        @endif