@if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message')['class']}} fade in alert-dismissible show" role="alert" id="msgAlert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size:20px">×</span>
            </button>
            {{Session::get('message')['msg']}}
        </div>
@endif

@if($errors->any())
    <div class="alert alert-danger fade in alert-dismissible show" role="alert" id="msgAlert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        @foreach($errors->all() as $error)

                {{ $error }}<br>

        @endforeach
    </div>
@endif
