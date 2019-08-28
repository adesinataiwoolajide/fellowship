@extends('layouts.login')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Retrieve Account</h1>
                        <!-- /login title -->
                        <p class="f-16">Password Reset Form.</p>
                    </div>
                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="{{route('password.request')}}">
                            <img class="dt-brand__logo-img" src="{{asset('assets/images/mfm-logo.png')}}" alt="MFMCFUI">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">
                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">
                        <!-- Form -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- @include('layouts.message') --}}
                        <form method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
        
                            
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email-1" aria-describedby="email-1"
                                    placeholder="Enter Your Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase">Send Password Reset Link</button>
                                
                            </div>

                        </form>
                        
                    </div>
                    
                    <div class="dt-login__content-footer">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Back to login?') }}
                            </a>
                        @endif
                    </div>
                    <!-- /login content footer -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
@endsection
