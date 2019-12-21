<div class="hvrbox">
    @if(isset($customer->avatar))
        <img src="{{ route('image.show', $customer->avatar->name) }}" height="200" width="200" class="rounded-circle hvrbox-layer_bottom">
    @else
        <img src="{{ asset('images/user_default.jpeg') }}" height="200" width="200" class="rounded-circle hvrbox-layer_bottom">
    @endif
    <div class="hvrbox-layer_top">
        <div class="hvrbox-text">
            <form id="form-change-avatar" action="{{ route('customer.avatar.store', $customer->id) }}" method="POST" enctype="multipart/form-data" id="selfie">
                {{ csrf_field() }}
                <input type="file" accept="image/*" class="d-none" id="avatar" name="avatar" capture="camera">
                <button id="btnAlterarAvatar" class="btn btn-outline-light">
                    <i class="far fa-fw fa-edit "></i> Alterar
                </button>
            </form>
        </div>
    </div>
</div>
<link href="{!! asset('css/avatarStyle.css') !!}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{!! asset('js/avatarComponent.js') !!}"></script>
