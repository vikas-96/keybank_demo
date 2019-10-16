    <div class="col-md-24 section-heading">
        <h5>Charges</h5>
    </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="monthly_maintenance_charges">Monthly maintenance charges</label>
                <input type="number" step=".01" name="charges[monthly_maintenance_charges]" id="monthly_maintenance_charges" value="{{old('charges.monthly_maintenance_charges',($assets['charges']['monthly_maintenance_charges'] ?? null))}}" class="form-control">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="security_charges">Security Charges</label>
                <input type="number" step=".01" name="charges[security_charges]" id="security_charges" value="{{old('charges.security_charges',($assets['charges']['security_charges'] ?? null))}}" class="form-control">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="other_charges">Other Charges</label>
                <input type="number" step=".01" name="charges[other_charges]" id="other_charges" value="{{old('charges.other_charges',($assets['charges']['other_charges'] ?? null))}}" class="form-control">
            </div>
        </div>
