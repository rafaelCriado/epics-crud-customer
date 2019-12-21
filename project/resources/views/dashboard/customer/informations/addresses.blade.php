@foreach ($customer->addresses as $address)
    <div class="card card-warning card-outline">
        <div class="card-body">
            <div class="box-body box-profile">
                <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">
                    Address {{ ucfirst($address->type) }}
                </h3>
                <p class="text-muted mb-0 pb-0">
                    <b>{{ $address->street }} - {{ $address->district }}</b>
                </p>

                <p class="text-muted mb-0 pb-0">
                    <b>{{ $address->city }} - {{ $address->state }}</b>
                </p>

                <p class="text-muted mb-0 pb-0">
                    <b>{{ $address->zip_code }}</b>
                </p>
            </div>
        </div>
    </div>
@endforeach
