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
                                        <a href="{{route('user.profile')}}">My Profile</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('change.pasword')}}">Change Password</a>
                                    </li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Biodata Update Form </li>
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

                            <form action="{{route('profile.update', $use->user_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault01">Full Name</label>
                                        <input type="text" class="form-control form-control-rounded" id="validationDefault01"
                                            placeholder="Enter Full Name" required name="name"  value="{{$use->name}}">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('name') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">E-Mail</label>
                                        <input type="email" class="form-control" id="validationDefault02"
                                            placeholder="Enter Your E-Mail" name=""  value="{{$use->email}}"
                                                readonly>
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
                                        <label for="validationDefault02">User Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="{{$use->roles()->first()->name}}">{{$use->roles()->first()->name}} </option>
                                        </select>
                                        @if ($errors->has('role'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('role') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <input type="hidden" name="email" value="{{$use->email}}">
                                    
                                </div>
                               
                                <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Details</button>
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