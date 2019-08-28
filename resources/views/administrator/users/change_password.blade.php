@extends('layouts.app')
    @section('content')

    <div class="dt-content-wrapper custom-scrollbar">

        <!-- Site Content -->
        <div class="dt-content">

            <div class="row">
                
                <!-- Grid Item -->
                <div class="col-12">
                    <div class="row dt-masonry">
                        <div class="col-md-12 dt-masonry__item">
                            <div class="dt-card">
                                
                                <ol class="mb-0 breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('change.pasword')}}">Change Password</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('user.profile')}}">My Profile</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Change Password Form </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="dt-card">

                        <!-- Card Header -->
                        <div class="dt-card__header">

                            <!-- Card Heading -->
                            <div class="dt-card__heading">
                                <h3 class="dt-card__title">{{$use->name}} Please Change Your Password Below</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            <form action="{{route('update.password', $use->user_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">E-Mail</label>
                                        <input type="email" class="form-control" id="validationDefault02"
                                            placeholder="Enter Your E-Mail" name=""
                                             required value="{{$use->email}}" readonly>
                                         @if ($errors->has('email'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('email') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault03">Password</label>
                                        <input type="password" class="form-control" id="validationDefault03"
                                            placeholder="Enter Your Password" required name="password">
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('password') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault04">Repeat Password</label>
                                        <input type="password" class="form-control" id="validationDefault04"
                                            placeholder="Repeat Your Password" required name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('password_confirmation') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <input type="hidden" name="email" value="{{$use->email}}">
                                    <input type="hidden" name="name" value="{{$use->name}}">
                                    <input type="hidden" name="role" value="{{$use->roles()->first()->name}}">
                                </div>
                               
                                <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Password</button>
                            </form>
                            <!-- /form -->

                        </div>
                        <!-- /card body -->

                    </div>
                    
                </div>
               

            </div> 
           
        </div>
        <!-- /site content -->

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection