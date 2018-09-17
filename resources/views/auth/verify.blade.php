@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        {!!  __('Before proceeding, please check your email for a verification link.',['email'=>auth()->user()->email]) !!}
                        <a  href="{{ route('verification.resend') }}">{{ __('click here to request one') }}</a>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {!!  __('A fresh verification link has been sent to your email address, please pay attention to check spam.',['email'=>auth()->user()->email]) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
