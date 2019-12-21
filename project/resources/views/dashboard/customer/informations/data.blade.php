<div class="card card-warning card-outline">
    <div class="card-body">
        <div class="box-body box-profile">
            @include('dashboard.customer.avatar.component')

            <h3 class="profile-username pt-2" style="border-bottom:1px solid #ffc107;">
                {{$customer->name}}
                <small>({{$customer->status}})</small>
            </h3>
            <p class="text-muted mb-0 pb-0">
                email: <b>{{ $customer->email }}</b>
            </p>
            <p class="text-muted mb-0 pb-0">
                phone: <b>{{ $customer->phone }}</b>
            </p>
            <p class="text-muted mb-0 pb-0">
                cpf: <b>{{ $customer->cpf }}</b>
            </p>
            <p class="text-muted mb-0 pb-0">
                birthday: <b>{{ $customer->birthday->format('d/m/Y') }}</b>
            </p>
            <p class="text-muted">
                customer since: <b>{{ $customer->created_at->format('d/m/Y') }}</b>
            </p>
        </div>
    </div>
</div>
