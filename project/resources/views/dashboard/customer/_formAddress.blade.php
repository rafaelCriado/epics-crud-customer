<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="addressZip_code">Zip Code</label>
            <input type="text" class="form-control" id="addressZip_code" name="zip_code" placeholder="zip code"
                   value="{{ old('zip_code', isset($customer->addresses[0]->zip_code) ? $customer->addresses[0]->zip_code :'') }}">
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            <label for="addressStreet">Street</label>
            <input type="text" class="form-control" id="addressStreet" name="street" placeholder="Street"
                   value="{{ old('street', isset($customer->addresses[0]->street) ? $customer->addresses[0]->street :'') }}">
        </div>
  </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="addressDistrict">District</label>
            <input type="text" class="form-control" id="addressDistrict" name="district" placeholder="district"
                   value="{{ old('district', isset($customer->addresses[0]->district) ? $customer->addresses[0]->district :'') }}">
        </div>
    </div>

    <div class="col-md-5">
    <div class="form-group">
      <label for="addressCity">City</label>
      <input type="text" class="form-control" id="addressCity" name="city" placeholder="city"
             value="{{ old('city', isset($customer->addresses[0]->city) ? $customer->addresses[0]->city :'') }}">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="state">State</label>
      <select name="state" id="state" class="form-control">
        @foreach ($states as $state)
          <option value="{{ $state->abbreviation }}"
            {{ (old("state", isset($customer->addresses[0]->state) ? $customer->addresses[0]->state :'') == $state->abbreviation ? "selected":"") }}>{{$state->abbreviation}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
