<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MFMCFUI - A fully responsive, HTML5 based admin template">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MFMCF UI</title>
    <link rel="shortcut icon" href="{{asset('assets/images/mfm-logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('design_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/gaxon-icon/styles.css')}}">
    <link rel="stylesheet" href="{{asset('design_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('design_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('design_modules/chartist/dist/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/semidark-style-1.min.css')}}">
    <link href="{{asset('design_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendors/gaxon-icon/styles.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Toast/css/Toast.min.css')}}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('design_modules/summernote/dist/summernote-bs4.css')}}" rel="stylesheet">

</head>
<div class="dt-loader-container">
    <div class="dt-loader">
      
    </div>
</div>
<body class="dt-sidebar--fixed dt-header--fixed">
    <div class="dt-root">
        <div class="dt-root__inner ">
            <!-- Header -->
            <header class="dt-header">
                <!-- Header container -->
                <div class="dt-header__container">
                    <!-- Brand -->
                    <div class="dt-brand">
                
                        <!-- Brand tool -->
                        <div class="dt-brand__tool" data-toggle="main-sidebar">
                            <div class="hamburger-inner"></div>
                        </div>
                        <!-- /brand tool -->
                        <!-- Brand logo -->
                        <span class="dt-brand__logo">
                            <a class="dt-brand__logo-link" href="">
                                <img class="dt-brand__logo-img d-none d-sm-inline-block" src="{{asset('assets/images/MFM.jpeg')}}" alt="MFMCFUI">
                                <img class="dt-brand__logo-symbol d-sm-none" src="{{asset('assets/images/MFM.jpeg')}}" alt="MFMCFUI">
                            </a>
                        </span>
                        <!-- /brand logo -->
                
                    </div>
                    <!-- /brand -->
                
                    <!-- Header toolbar-->
                    <div class="dt-header__toolbar">
                
                        <!-- Search box -->
                        <form class="search-box d-none d-lg-block">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search in app..." value="" type="search">
                                <span class="search-icon"><i class="icon icon-search icon-lg"></i></span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="" aria-haspopup="false"
                                            aria-expanded="false">Category
                                    </button>
                                   
                                </div>
                            </div>
                        </form>
                        <!-- /search box -->
                    
                        <!-- Header Menu Wrapper -->
                        <div class="dt-nav-wrapper">
                            <!-- Header Menu -->
                            <ul class="dt-nav d-lg-none">
                                <li class="dt-nav__item dt-notification-search dropdown">
                                    <!-- Dropdown Link -->
                                    <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> <i class="icon icon-search icon-fw icon-lg"></i> </a>
                                    <!-- /dropdown link -->
                                    <!-- Dropdown Option -->
                                    <div class="dropdown-menu">
                        
                                        <!-- Search Box -->
                                        <form class="search-box right-side-icon">
                                            <input class="form-control form-control-lg" type="search" placeholder="Search in app...">
                                            <button type="submit" class="search-icon"><i class="icon icon-search icon-lg"></i></button>
                                        </form>
                                        <!-- /search box -->
                        
                                    </div>
                                    <!-- /dropdown option -->
                        
                                </li>
                            </ul>
                            <!-- /header menu -->
                    
                           
                            <!-- Header Menu -->
                            <ul class="dt-nav">
                                <li class="dt-nav__item dt-notification dropdown">
                        
                                    <!-- Dropdown Link -->
                                    <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> <i class="icon icon-notification2 icon-fw dt-icon-alert"></i>
                                    </a>
                                    <!-- /dropdown link -->
                        
                                    <!-- Dropdown Option -->
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                        <!-- Dropdown Menu Header -->
                                        <div class="dropdown-menu-header">
                                            <h4 class="title">Notifications (9)</h4>
                            
                                            <div class="ml-auto action-area">
                                            <a href="javascript:void(0)">Mark All Read</a> <a class="ml-2" href="javascript:void(0)">
                                                <i class="icon icon-settings icon-lg text-light-gray"></i> </a>
                                            </div>
                                        </div>
                                        <!-- /dropdown menu header -->
                        
                                        <!-- Dropdown Menu Body -->
                                        <div class="dropdown-menu-body ps-custom-scrollbar">
                            
                                            <div class="h-auto">
                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">
                            
                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="{{asset('assets/images/user-avatar/stella-johnson.jpg')}}" alt="User">
                                                <!-- avatar -->
                            
                                                <!-- Media Body -->
                                                <span class="media-body">
                                                <span class="message">
                                                <span class="user-name">Stella Johnson</span> and <span class="user-name">Chris Harris</span>
                                                have birthdays today. Help them celebrate!
                                                </span>
                                                <span class="meta-date">8 hours ago</span>
                                            </span>
                                                <!-- /media body -->
                            
                                            </a>
                                            <!-- /media -->
                            
                                        
                                        </div>
                        
                                    </div>
                                    <!-- /dropdown menu body -->
                        
                                    <!-- Dropdown Menu Footer -->
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)" class="card-link"> See All <i class="icon icon-arrow-right icon-fw"></i>
                                        </a>
                                    </div>
                                    <!-- /dropdown menu footer -->
                                    </div>
                                    <!-- /dropdown option -->
                         
                                </li>
                    
                                <li class="dt-nav__item dt-notification dropdown">
                        
                                    <!-- Dropdown Link -->
                                    <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> <i class="icon icon-open-mail icon-fw"></i> </a>
                                    <!-- /dropdown link -->
                        
                                    <!-- Dropdown Option -->
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                    <!-- Dropdown Menu Header -->
                                    <div class="dropdown-menu-header">
                                        <h4 class="title">Messages (6)</h4>
                        
                                        <div class="ml-auto action-area">
                                        <a href="javascript:void(0)">Mark All Read</a> <a class="ml-2" href="javascript:void(0)">
                                            <i class="icon icon-settings icon-lg text-light-gray"></i></a>
                                        </div>
                                    </div>
                                    <!-- /dropdown menu header -->
                        
                                    <!-- Dropdown Menu Body -->
                                    <div class="dropdown-menu-body ps-custom-scrollbar">
                        
                                        <div class="h-auto">
                        
                                        <!-- Media -->
                                        <a href="javascript:void(0)" class="media">
                        
                                            <!-- Avatar -->
                                            <img class="dt-avatar mr-3" src="assets/images/user-avatar/mathew.jpg" alt="User">
                                            <!-- avatar -->
                        
                                            <!-- Media Body -->
                                            <span class="media-body text-truncate">
                                            <span class="user-name mb-1">Chris Mathew</span>
                                            <span class="message text-light-gray text-truncate">Okay.. I will be waiting for your...</span>
                                        </span>
                                            <!-- /media body -->
                        
                                            <span class="action-area h-100 min-w-80 text-right">
                                            <span class="meta-date mb-1">8 hours ago</span>
                                            <!-- Toggle Button -->
                                            <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                                                <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                                            </span>
                                            <!-- /toggle button -->
                                            </span> </a>
                                        <!-- /media -->
                        
                                        <!-- Media -->
                                        <a href="javascript:void(0)" class="media">
                        
                                            <!-- Avatar -->
                                            <img class="dt-avatar mr-3" src="assets/images/user-avatar/stella-johnson.jpg" alt="User">
                                            <!-- avatar -->
                        
                                            <!-- Media Body -->
                                            <span class="media-body text-truncate">
                                            <span class="user-name mb-1">Alia Joseph</span>
                                            <span class="message text-light-gray text-truncate">
                                            Alia Joseph just joined Messenger! Be the first to send a welcome message or sticker.
                                            </span>
                                        </span>
                                            <!-- /media body -->
                        
                                            <span class="action-area h-100 min-w-80 text-right">
                                            <span class="meta-date mb-1">9 hours ago</span>
                                            <!-- Toggle Button -->
                                            <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                                                <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                                            </span>
                                            <!-- /toggle button -->
                                        </span> </a>
                                        <!-- /media -->
                        
                                        <!-- Media -->
                                        <a href="javascript:void(0)" class="media">
                        
                                            <!-- Avatar -->
                                            <img class="dt-avatar mr-3" src="assets/images/user-avatar/steve-smith.jpg" alt="User">
                                            <!-- avatar -->
                        
                                            <!-- Media Body -->
                                            <span class="media-body text-truncate">
                                            <span class="user-name mb-1">Joshua Brian</span>
                                            <span class="message text-light-gray text-truncate">
                                            Alex will explain you how to keep the HTML structure and all that.
                                            </span>
                                        </span>
                                            <!-- /media body -->
                        
                                            <span class="action-area h-100 min-w-80 text-right">
                                            <span class="meta-date mb-1">12 hours ago</span>
                                            <!-- Toggle Button -->
                                            <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                                                <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                                            </span>
                                            <!-- /toggle button -->
                                        </span> </a>
                                        <!-- /media -->
                        
                                        <!-- Media -->
                                        <a href="javascript:void(0)" class="media">
                        
                                            <!-- Avatar -->
                                            <img class="dt-avatar mr-3" src="assets/images/user-avatar/domnic-brown.jpg" alt="User">
                                            <!-- avatar -->
                        
                                            <!-- Media Body -->
                                            <span class="media-body text-truncate">
                                            <span class="user-name mb-1">Domnic Brown</span>
                                            <span class="message text-light-gray text-truncate">Okay.. I will be waiting for your...</span>
                                        </span>
                                            <!-- /media body -->
                        
                                            <span class="action-area h-100 min-w-80 text-right">
                                            <span class="meta-date mb-1">yesterday</span>
                                            <!-- Toggle Button -->
                                            <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                                                <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                                            </span>
                                            <!-- /toggle button -->
                                        </span> </a>
                                        <!-- /media -->
                        
                                        </div>
                        
                                    </div>
                                    <!-- /dropdown menu body -->
                        
                                    <!-- Dropdown Menu Footer -->
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)" class="card-link"> See All <i class="icon icon-arrow-right icon-fw"></i>
                                        </a>
                                    </div>
                                    <!-- /dropdown menu footer -->
                                    </div>
                                    <!-- /dropdown option -->
                        
                                </li>
                            </ul>
                            <!-- /header menu -->
            
                           
                            <!-- Header Menu -->
                            <ul class="dt-nav">
                                <li class="dt-nav__item dropdown">
                        
                                    <!-- Dropdown Link -->
                                    <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="dt-avatar size-30" src="{{asset('assets/images/user-avatar/domnic-harris.jpg')}}" alt="Domnic Harris">
                                    <span class="dt-avatar-info d-none d-sm-block">
                                        <span class="dt-avatar-name"><?php echo Auth::user()->name?></span>
                                    </span> </a>
                                    <!-- /dropdown link -->
                        
                                    <!-- Dropdown Option -->
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dt-avatar-wrapper flex-nowrap p-6 mt-n2 bg-gradient-purple text-white rounded-top">
                                        <img class="dt-avatar" src="{{asset('assets/images/user-avatar/domnic-harris.jpg')}}" alt="<?php echo Auth::user()->name; ?>">
                                        <span class="dt-avatar-info">
                                        <span class="dt-avatar-name"><?php echo Auth::user()->email?></span>
                                        <span class="f-12"><?php echo Auth::user()->role; ?></span>
                                        </span>
                                    </div>
                                    <a class="dropdown-item" href="{{route('user.profile')}}"> 
                                        <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Profile
                                    </a>
                                    <a class="dropdown-item" href="{{route('change.pasword')}}"> 
                                        <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Change Password
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{route('admin.logout')}}"> <i class="icon icon-editors icon-fw mr-2 mr-sm-1"></i>Logout
                                    </a>
                                    </div>
                                    <!-- /dropdown option -->
                        
                                </li>
                            </ul>
                            <!-- /header menu -->
                        </div>
                        <!-- Header Menu Wrapper -->
                    
                    </div>
                    <!-- /header toolbar -->
            
                </div>
                 <!-- /header container -->
            
            </header>
            <main class="dt-main ps-custom-scrollbar">
                
                @include('layouts.sidebar')
                
                @yield('content')
                    
            </main>
            
        </div>
    </div>

    <script src="{{asset('design_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('design_modules/moment/moment.js')}}"></script>
    <script src="{{asset('design_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('design_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('design_modules/masonry-layout/dist/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('design_modules/sweetalert2/dist/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    <script src="{{asset('assets/js/customizer.js')}}"></script><!-- Custom JavaScript -->
    <script src="{{asset('design_modules/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('design_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/custom/charts/dashboard-listing.js')}}"></script>
    <script src="{{asset('design_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('design_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('assets/js/custom/data-table.js')}}"></script>
    <script src="{{asset('assets/Toast/js/Toast.min.js')}}"></script>
    <script src="{{asset('design_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('assets/js/custom/datetime-pickers.js')}}"></script>
    <script src="{{asset('js/deptfac.js')}}"></script>
    

    <script src="{{asset('design_modules/summernote/dist/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/js/custom/editor-summernote.js')}}"></script>

    <script>
        function confirmToDelete(){
            return confirm("Click Okay to Delete Details and Cancel to Stop");
        }
    </script>

    <script>
        function confirmToEdit(){
            return confirm("Click Okay to Edit and Cancel to Stop");
        }
    </script>

    <script>
        function confirmToRestore(){
            return confirm("Click Okay to Restore The Deleted Data and Cancel to Stop");
        }
    </script>
    <script>
        function confirmToSuspend(){
            return confirm("Click Okay to Suspend The User Account and Cancel to Stop");
        }
    </script>

    <script>
        function confirmToUnSuspend(){
            return confirm("Click Okay to Un Suspend The User Account and Cancel to Stop");
        }
    </script>

    
    @if(session('success'))  
        <?php $message = session('success'); ?>
        <script type="text/javascript">
            new Toast({ message: '<?php echo $message; ?>', type: 'success' });
        </script><?php 
        unset($message); ?>
        
    @endif

    @if(session('error'))  
        <?php $mess = session('error'); ?>
        <script type="text/javascript">
            new Toast({ message: '<?php echo $mess; ?>', type: 'error' });
        </script><?php 
        unset($mess); ?>
    @endif
      
</body>
</html>
        