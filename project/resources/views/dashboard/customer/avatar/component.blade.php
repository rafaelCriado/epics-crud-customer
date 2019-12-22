<div class="hvrbox">
    @if(isset($customer->avatar))
        <img src="{{ route('image.show', $customer->avatar->name) }}" height="200" width="200" class="rounded-circle hvrbox-layer_bottom">
    @else
        <img src="{{ asset('images/user_default.jpeg') }}" height="200" width="200" class="rounded-circle hvrbox-layer_bottom">
    @endif
    <div class="hvrbox-layer_top">
        <div class="hvrbox-text">
            @if(isset($customer->avatar))
                <button type="button" data-toggle="modal" data-target="#modalExemplo" class="btn btn-outline-light mb-1" style="width:90px !important" >
                    <i class="far fa-fw fa-eye "></i> Show
                </button>
            @endif
            <form id="form-change-avatar" action="{{ route('customer.avatar.store', $customer->id) }}" method="POST" enctype="multipart/form-data" id="selfie">
                {{ csrf_field() }}
                <input type="file" accept="image/*" class="d-none" id="avatar" name="avatar" capture="camera">
                <button id="btnAlterarAvatar" class="btn btn-outline-light" style="width:90px !important">
                    <i class="far fa-fw fa-edit "></i> Edit
                </button>
            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header m-2 p-0">
                <h5>{{ $customer->name }}</h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($customer->avatar))
                    <img src="{{ route('image.show', $customer->avatar->name) }}" class="img img-fluid">
                @endif
            </div>
        </div>
    </div>
</div>
<link href="{!! asset('css/avatarStyle.css') !!}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{!! asset('js/avatarComponent.js') !!}"></script>
