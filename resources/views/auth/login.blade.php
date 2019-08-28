@extends('layouts.login')

@section('content')

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
                            <h1 class="dt-login__title">Login</h1>
                            <!-- /login title -->
                            <p class="f-16">Sign in with your details to explore the system.</p>
                        </div>
                        <!-- Brand logo -->
                        <div class="dt-login__logo">
                            <a class="dt-brand__logo-link" href="{{route('login')}}">
                                <img class="dt-brand__logo-img" src="{{asset('assets/images/mfm-logo.png')}}" alt="Drift">
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
                            @include('layouts.message')
                            <form action="{{route('admin.login')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="sr-only" for="email-1">Email address</label>
                                    <input type="email" class="form-control" id="email-1" aria-describedby="email-1"
                                        placeholder="Enter Your Email" name="email">
                                     @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label class="sr-only" for="password-1">Password</label>
                                    <input type="password" class="form-control" id="password-1" placeholder="Password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="dt-checkbox d-block mb-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
  
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase">Login</button>
                                    
                                </div>

                            </form>
                            
                        </div>
                        
                        <div class="dt-login__content-footer">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
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
