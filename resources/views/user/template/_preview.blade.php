<div class="card mb-2">
    <div class="card-body">
        <div class="card-title pb-2" style="border-bottom:1px dashed lightgray">
            <div class="row">
                <b class="col-8">{{$template->name}}</b>
                <div class="col-4 text-right">
                    @include('user.template._operation')
                </div>
            </div>
            <small>{{$template->description}}</small>
        </div>
        <div class="card-text pt-2 pb-2 scroll-x">
            {!! template()->preview($template) !!}
        </div>
    </div>
</div>
