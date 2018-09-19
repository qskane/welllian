@php
    $method = $method ?? 'POST';
@endphp

<form novalidate
      method="{{$method}}"
      action="{{$action}}"
      @if($needsValidation ?? true) class="needs-validation" @endif
      @if($withFile ?? false) enctype="multipart/form-data" @endif
      @if($id ?? false) id="{{$id}}" @endif
>
    @if(in_array($method,['PUT','PATCH','DELETE']))
        {{method_field($method)}}
    @endif

    @csrf

    {{$slot ?? null}}

    @if($submit ?? true)
        @include('components.form.submit')
    @endif
</form>

@push('scripts')
    <script type="text/javascript">
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endpush
