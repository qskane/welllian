<div class="form-group row">
    <label for="password"
           class="col-md-4 col-form-label text-md-right">{{ __('form.telephone_verification_code') }}</label>

    <div class="col-md-2">
        <input id="telephone_verification_code"
               class="form-control {{ $errors->has('telephone_verification_code') ? ' is-invalid' : '' }}"
               name="telephone_verification_code"
               required
        />
    </div>


    <div class="col-md-4">
        <button id="telephone-verification-code" type="button" class="btn btn-raised">{{__('send')}}</button>
    </div>

    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->has('telephone_verification_code') ? $errors->first('telephone_verification_code') : __('form.telephone_verification_code') . __('form.invalid_input') }}</strong>
    </span>
</div>

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            var $btn = $('#telephone-verification-code');
            var loading = false;
            var seconds = 3;

            var timer = function ($this) {
                $this.attr('disabled', true);
                $this.text(seconds + ' {{__('resend')}}');
                var x = setInterval(function () {
                    if (seconds === 1) {
                        clearInterval(x);
                        $this.attr('disabled', false);
                        $this.text('{{__('resend')}}');
                        seconds = 3;
                        return;
                    }
                    seconds--;
                    $this.text(seconds + ' {{__('resend')}}')
                }, 1000)
            };

            $btn.click(function () {
                if (loading) {
                    return;
                }

                $.ajax({
                    url: '{{route('support.telephone_verification_code')}}',
                    type: 'GET',
                    success: function () {
                        $.notify(
                            {message: "{}"},
                            {type: 'success'}
                        );
                    },
                    error: function (error) {
                        $.notify(
                            {message: error.status === 403 ? "{{__('Request too frequently')}}" : "{{__('failed')}}"},
                            {type: 'danger'}
                        );
                    }
                });


                timer($(this))
            })
        })
    </script>

@endpush
