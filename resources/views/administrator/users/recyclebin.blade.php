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
                                    @if(auth()->user()->hasRole('Administrator'))
                                        <li class="breadcrumb-item"><a href="{{route('user.restore')}}">Restore Deleted Users</a></li>
                                    @endif
                                    <li class="breadcrumb-item"><a href="{{route('user.create')}}">Add User</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Users </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
               

            </div> 
            <!-- /grid -->


            <div class="row">

                <!-- Grid Item -->
                <div class="col-xl-12">

                    <!-- Card -->
                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">

                            @if(count($user) ==0)
                                <p align="center" style="color: red"><h3><i class="fa fa-table"></i> 
                                    The List is Empty</h3>
                                </p>
        
                            @else
                                
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($user as $users)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        <a href="{{route('user.undelete', $users->user_id)}}" class="btn btn-primary"
                                                            onclick="return(confirmToRestore());" >
                                                        <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        
                                                    </td>
                                                    <td>{{$users->name}}</td> 
                                                    <td>{{$users->email}}</td> 
                                                    <td>{{$users->role}}</td> 
                                                    <td>
                                                        @if($users->status == 1)
                                                            <p style="color:green">Active</p>
                                                        @elseif($users->status == 0)
                                                            <p style="color:yellow">Suspended</p>
                                                        @else
                                                            <p style="color:red">Inactive</p>
                                                        @endif
                                                    </td> 
                                                </tr><?php 
                                            $y++; ?>
                                            
                                        @endforeach
                                            
                                        
                                        </tbody>
                                    
                                        
                                        <tfoot>
                                            <tr>
                                                    <th>S/N</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /tables -->
                            @endif

                        </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->

                </div>
                <!-- /grid item -->

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