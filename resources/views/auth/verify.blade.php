@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dear <?php echo Auth::user()->name. " "; ?>{{  __(' Please Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                A fresh verification link has been sent to {{Auth::user()->email}}, Please click on it to confirm your account.
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, 
                        <a href="{{ route('verification.resend') }}"><br>{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
