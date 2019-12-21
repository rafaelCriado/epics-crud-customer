<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', isset($customer->name) ? $customer->name :'') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cpf">CPF</label>
            @if(isset($customer->cpf))
                <input type="text" class="form-control" disabled placeholder="CPF" value="{{  $customer->cpf }}">
                <input type="hidden" id="cpf" name="cpf" value="{{  $customer->cpf }}">
            @else
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ old('cpf', '') }}">
            @endif

        </div>
  </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', isset($customer->email) ? $customer->email :'') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', isset($customer->phone) ? $customer->phone :'') }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="birthday" value="{{ old('birthday', isset($customer->birthday) ? $customer->birthday->format('Y-m-d') :'') }}">
        </div>
    </div>

</div>
