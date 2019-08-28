@extends('layouts.app')
    @section('content')

    <div class="dt-content-wrapper custom-scrollbar">

        <div class="dt-content">

           
            <div class="row dt-masonry"  style="margin-top:-25px">
                <div class="col-md-12 dt-masonry__item">
                    <div class="dt-card">
                        
                        <ol class="mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                            @if (auth()->user()->hasPermissionTo('View Excos') OR 
                                (Gate::allows('Administrator', auth()->user())))
                                <li class="breadcrumb-item"><a href="{{route('excos.details', $excos->email)}}">View Excos</a></li>
                                
                            @endif
                            @if (auth()->user()->hasPermissionTo('Edit Excos') OR 
                                (Gate::allows('Administrator', auth()->user())))
                                <li class="breadcrumb-item"><a href="{{route('excos.edit', $excos->email)}}">edit Excos</a></li>
                                
                            @endif
                            @if (auth()->user()->hasPermissionTo('Add Excos') OR 
                                (Gate::allows('Administrator', auth()->user())))
                                <li class="breadcrumb-item"><a href="{{route('excos.index')}}">View Excos</a></li>
                                <li class="breadcrumb-item"><a href="{{route('excos.create')}}">Add Excos</a></li>
                            @endif
                            @if(auth()->user()->hasRole('Administrator'))
                                <li class="breadcrumb-item"><a href="{{route('user.restore')}}">Restore Deleted Excos</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">List of Saved Excos </li>
                        </ol>
                        
                    </div>
                </div>
            </div>
               
            <!-- Profile -->
            <div class="profile" style="margin-top:20px">

                <!-- Profile Banner -->
                <div class="profile__banner">

                    <!-- Profile Banner Top -->
                    <div class="profile__banner-detail">
                        <!-- Avatar Wrapper -->
                        <div class="dt-avatar-wrapper">
                            <!-- Avatar -->
                            <img class="dt-avatar dt-avatar__shadow size-90 mr-sm-4"
                                 src="{{asset('excos-passport/'.$excos->passport)}}" alt="{{$excos->surnamne}}}">
                            <!-- /avatar -->

                            <!-- Info -->
                            <div class="dt-avatar-info">
                                <span class="dt-avatar-name display-4 mb-2 font-weight-light">{{$excos->surname. " ". $excos->other_names}}</span>
                                <span class="f-16">{{$excos->position->position_name}}, {{$excos->unit->unit_name}}</span>
                            </div>
                            <!-- /info -->
                        </div>
                        <!-- /avatar wrapper -->

                        <div class="ml-sm-auto">
                            <!-- List -->
                            <ul class="dt-list dt-list-bordered dt-list-col-4">
                                <!-- List Item -->
                                <li class="dt-list__item text-center">
                                    <span class="h4 font-weight-500 mb-0 text-white">2k+</span>
                                    <span class="d-block f-12">Followers</span>
                                </li>
                                <!-- /list item -->
                                <!-- List Item -->
                                <li class="dt-list__item text-center">
                                    <span class="h4 font-weight-500 mb-0 text-white">847</span>
                                    <span class="d-block f-12">Following</span>
                                </li>
                                <!-- /list item -->
                                <!-- List Item -->
                                <li class="dt-list__item text-center">
                                    <span class="h4 font-weight-500 mb-0 text-white">324</span>
                                    <span class="d-block f-12">Friends</span>
                                </li>
                                <!-- /list item -->
                            </ul>
                            <!-- /list -->
                        </div>
                    </div>
                   

                </div>
                <!-- /profile banner -->

                <!-- Profile Content -->
                <div class="profile-content">

                    <!-- Grid -->
                    <div class="row">
                         <!-- Grid Item -->
                         <div class="col-xl-8 order-xl-1">

                            <!-- Card -->
                            <div class="card">

                                <!-- Card Header -->
                                <div class="card-header card-nav bg-transparent border-bottom d-sm-flex justify-content-sm-between">
                                    <h3 class="mb-2 mb-sm-n5">About</h3>

                                    <ul class="card-header-links nav nav-underline" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab-pane1"
                                               role="tab"
                                               aria-controls="tab-pane1"
                                               aria-selected="true">Overview</a>
                                        </li>
                                        
                                    </ul>

                                </div>
                                <!-- /card header -->

                                <!-- Card Body -->
                                <div class="card-body pb-2">

                                    <!-- Tab Content-->
                                    <div class="tab-content mt-5">

                                        <!-- Tab panel -->
                                        <div id="tab-pane1" class="tab-pane active">

                                            <!-- List -->
                                            <ul class="dt-list dt-list-col-4">
                                                <!-- List Item -->
                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="icon icon-company icon-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Served in</span>
                                                            <p class="h5 mb-0">{{$excos->unit->unit_name}}.</p>
                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                                <!-- /list item -->

                                                <!-- List Item -->
                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="icon icon-birthday-new icon-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Birthday</span>
                                                            <p class="h5 mb-0">{{$excos->dob}}</p><?php 
                                                            $today = date("m-d");
                                                            $cut = explode("-", $excos->dob);
                                                            $month = $cut[1];
                                                            $day = $cut[2];
                                                            if($today == $month."-".$day){ ?>
                                                                <p class="h5 mb-0">Happy Birthday</p>
                                                                <?php
                                                            }
                                                             ?>


                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                                <!-- /list item -->

                                                <!-- List Item -->
                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="icon icon-graduation icon-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Department</span>
                                                            <p class="h5 mb-0">{{$excos->dept}}</p>
                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                                <!-- /list item -->

                                                <!-- List Item -->
                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="icon icon-home icon-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Faculty</span>
                                                            <p class="h5 mb-0">{{$excos->faculty}}</p>
                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                                <!-- /list item -->

                                                <!-- List Item -->
                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="fa fa-certificate fa-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Academic Excos</span>
                                                            <p class="h5 mb-0">{{$excos->session->sessions_name}}</p>

                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                                <!-- /list item -->

                                                <li class="dt-list__item">
                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="fa fa-sitemap fa-4x mr-5 align-self-center text-blue"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">exco Category</span>
                                                            <p class="h5 mb-0">{{$excos->category}}</p>

                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </li>
                                            </ul>
                                            <!-- /list -->

                                        </div>
                                        
                                    </div>
                                    <!-- /tab content-->

                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->

                           

                        </div>
                        <!-- /grid item -->
                        <!-- Grid Item -->
                        <div class="col-xl-4 order-xl-2">


                            <!-- Grid -->
                            <div class="row">

                                

                                <!-- Grid Item -->
                                <div class="col-xl-12 col-md-6 col-12 order-xl-1">

                                    <!-- Card -->
                                    <div class="dt-card dt-card__full-height">

                                        <!-- Card Header -->
                                        <div class="dt-card__header pt-6">

                                            <!-- Card Heading -->
                                            <div class="dt-card__heading">
                                                <h3 class="dt-card__title">Contact</h3>
                                            </div>
                                            <!-- /card heading -->

                                        </div>
                                        <!-- /card header -->

                                        <!-- Card Body -->
                                        <div class="dt-card__body">
                                            <!-- Media -->
                                            <div class="media mb-5">

                                                <i class="icon icon-mail icon-xl mr-5"></i>

                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Mail</span>
                                                    <a href="text-blue">{{$excos->email}}</a>
                                                </div>
                                                <!-- /media body -->

                                            </div>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <div class="media mb-5">

                                                <i class="icon icon-link icon-xl mr-5"></i>

                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Web Page</span>
                                                    <a href="text-blue">example.com</a>
                                                </div>
                                                <!-- /media body -->

                                            </div>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <div class="media">

                                                <i class="icon icon-phone-o icon-xl mr-5"></i>

                                                <!-- Media Body -->
                                                <div class="media-body">
                                                    <span class="d-block text-light-gray f-12 mb-1">Phone</span>
                                                    <span class="h5">{{$excos->phone_number}}</span>
                                                </div>
                                                <!-- /media body -->

                                            </div>
                                            <!-- /media -->
                                        </div>
                                        <!-- /card body -->

                                    </div>
                                    <!-- /card -->

                                </div>
                                <!-- /grid item -->

                            </div>
                            <!-- /grid -->

                        </div>
                        <!-- /grid item -->

                       

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /profile content -->

            </div>
            <!-- /profile -->

        </div>

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection