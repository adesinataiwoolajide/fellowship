<aside id="main-sidebar" class="dt-sidebar">
        <div class="dt-sidebar__container">
    
            <!-- Sidebar Navigation -->
            <ul class="dt-side-nav">
    
                <!-- Menu Header -->
                <li class="dt-side-nav__item dt-side-nav__header">
                    <span class="dt-side-nav__text">NAVIGATIONS</span>
                </li>
                @if(( Auth::user()->email_verified_at) == "")
                    
                    <li class="dt-side-nav__item">
                        <a href="{{ route('verification.resend') }}" class="dt-side-nav__link" title="Resend Link">
                            <i class="icon icon-mail icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Resend Link</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{ route('admin.logout') }}" class="dt-side-nav__link" title="Log Out">
                            <i class="icon icon-user icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Log Out</span>
                        </a>
                    </li>
                   
                    
                @else
                
                    <li class="dt-side-nav__item">
                        <a href="{{route('administrator.dashboard')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Dashboard</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('user.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Users</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('unit.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-sitemap fa-fw fa-lg"></i>
                            <span class="dt-side-nav__text">Units</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('position.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-cogs "></i>
                            <span class="dt-side-nav__text">  Positions</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('session.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-certificate fa-fw fa-lg"></i>
                            <span class="dt-side-nav__text">Academic Session</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('excos.index')}}" class="dt-side-nav__link" title="Layouts">
                            <i class="icon icon-user icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Excos</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('program.category.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-list icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Program Categories</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('program.create')}}" class="dt-side-nav__link" title="Layouts">
                            <i class="icon icon-layout icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Programs</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('message.index')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-mail icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Messages</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-crm icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Announcements</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-metrics icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Events</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-task-manager icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Church Needs</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-date-time-picker icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Birthdays</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-list icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Donations</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="metrics.html" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Meditation</span>
                        </a>
                    </li>
                    
                @endif
            
            
            </ul>
            <!-- /sidebar navigation -->
    
        </div>
    </aside>