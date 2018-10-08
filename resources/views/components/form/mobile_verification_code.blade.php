<div class="form-group row">
    <label for="password"
           class="col-md-3 col-form-label text-md-right">{{ __('form.mobile_verification_code') }}</label>

    <div class="col-md-5">
        <input id="mobile_verification_code"
               class="form-control {{ $errors->has('mobile_verification_code') ? ' is-invalid' : '' }}"
               name="mobile_verification_code"
               value="{{ old('mobile_verification_code') ?? '' }}"
               required
        />
        <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->has('mobile_verification_code') ? $errors->first('mobile_verification_code') : __('form.mobile_verification_code') . __('form.invalid_input') }}</strong>
        </span>
    </div>

    <div class="col-md-3">
        <button type="button"
                id="btn-mobile-verification-code"
                class="btn btn-sm btn-outline-primary">
            {{__('send')}}
        </button>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
        var $btn = $('#btn-mobile-verification-code');
        var loading = false;
        var seconds = 10;
        var $verification = $('input[name="mobile"]').first();

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
            $this.text(seconds + ' {{__('resend')}}');
          }, 1000);
        };

        $btn.click(function () {
          if (loading) {
            return;
          }
          var that = this;

          $.ajax({
            url: '{{route('support.verification')}}',
            data: {verification: $verification.val()},
            type: 'POST',
            success: function () {
              $.notify(
                {message: "{{__('sent')}}"},
                {type: 'success'}
              );
              timer($(that));
            },
            error: function (error) {
              $.notify(
                {message: error.status === 403 ? "{{__('Request too frequently')}}" : "{{__('fail')}}"},
                {type: 'danger'}
              );
            }
          });

        });
      });
    </script>
@endpush
