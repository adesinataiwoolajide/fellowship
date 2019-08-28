@extends('layouts.app')

@section('content')

    <div class="dt-content-wrapper">

        <!-- Site Content -->
        @if(( Auth::user()->email_verified_at) == "")
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
        @else
            <div class="dt-content">
                <!-- Grid -->
                <div class="row">

                    <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h6 class="text-body text-uppercase mb-2">All Users</h6>
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">{{count($user)}}</span>

                                    <div class="d-flex align-items-center">
                                        <div class="trending-section font-weight-500 text-success mr-2">
                                            <span class="value">{{count($user)}}%</span>
                                            <i class="icon icon-pointer-up"></i>
                                        </div>
                                        <span class="f-12"></span>
                                    </div>
                                </div>

                                <div class="dt-indicator-item__info mb-2" data-fill="{{count($user)}}" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-primary"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /bard body -->

                        </div>
                        <!-- /card -->

                    </div>
                    
                    <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h6 class="text-body text-uppercase mb-2">Excos Position</h6>
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">{{count($position)}}</span>

                                    <div class="d-flex align-items-center">
                                        <div class="trending-section font-weight-500 text-success mr-2">
                                            <span class="value">{{count($position)}}%</span>
                                            <i class="icon icon-pointer-up"></i>
                                        </div>
                                        <span class="f-12"></span>
                                    </div>
                                </div>

                                <div class="dt-indicator-item__info mb-2" data-fill="{{count($position)}}" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /bard body -->

                        </div>
                        <!-- /card -->

                    </div>
                    
                    <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h6 class="text-body text-uppercase mb-2">Academic Session</h6>
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">{{count($session)}}</span>

                                    <div class="d-flex align-items-center">
                                        <div class="trending-section font-weight-500 text-success mr-2">
                                            <span class="value">{{count($session)}}%</span>
                                            <i class="icon icon-pointer-up"></i>
                                        </div>
                                        <span class="f-12"></span>
                                    </div>
                                </div>

                                <div class="dt-indicator-item__info mb-2" data-fill="{{count($session)}}" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-success"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /bard body -->

                        </div>
                        <!-- /card -->

                    </div>
                    
                    <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h6 class="text-body text-uppercase mb-2">Church Unit</h6>
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">{{count($unit)}}</span>

                                    <div class="d-flex align-items-center">
                                        <div class="trending-section font-weight-500 text-success mr-2">
                                            <span class="value">{{count($unit)}}%</span>
                                            <i class="icon icon-pointer-up"></i>
                                        </div>
                                        <span class="f-12"></span>
                                    </div>
                                </div>

                                <div class="dt-indicator-item__info mb-2" data-fill="{{count($unit)}}" data-max="100">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-secondary"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /bard body -->

                        </div>
                        <!-- /card -->

                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">

                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body px-5 py-4">
                                <h6 class="text-body text-uppercase mb-2">All Executives</h6>
                                <div class="d-flex align-items-baseline mb-4">
                                    <span class="display-4 font-weight-500 text-dark mr-2">{{count($excos)}}</span>

                                    <div class="d-flex align-items-center">
                                        <div class="trending-section font-weight-500 text-success mr-2">
                                            <span class="value">{{count($excos)}}%</span>
                                            <i class="icon icon-pointer-up"></i>
                                        </div>
                                        <span class="f-12"></span>
                                    </div>
                                </div>

                                <div class="dt-indicator-item__info mb-2" data-fill="{{count($excos)}}" data-max="1000">
                                    <div class="dt-indicator-item__bar">
                                        <div class="dt-indicator-item__fill fill-pointer bg-warning"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /bard body -->

                        </div>
                        <!-- /card -->

                    </div>
                    
                </div>
                
            </div>
        @endif
        <!-- Footer -->
        <footer class="dt-footer">
            Copyright Glorious Empire Technologies © {{date('Y')}}
        </footer>
    <!-- /footer -->
    </div>
@endsection