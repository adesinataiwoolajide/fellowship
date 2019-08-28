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
                                    <li class="breadcrumb-item"> <a href="{{route('user.edit', $use->user_id)}}">Edit User</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('user.create')}}">Add User</a></li>
                                    @if(auth()->user()->hasRole('Administrator'))
                                        <li class="breadcrumb-item"><a href="{{route('user.restore')}}">Restore Deleted Users</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Users </li>
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
                                <h3 class="dt-card__title">User Update Form</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            <form action="{{route('user.update', $use->user_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-sm-3 mb-3">
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
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">E-Mail</label>
                                        <input type="email" class="form-control" id="validationDefault02"
                                            placeholder="Enter Your E-Mail" name="email"  value="{{$use->email}}"
                                             required>
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
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">User Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="{{$use->role}} ">{{$use->role}} </option>
                                            <option></option>
                                            @foreach($user_roles as $list_roles)
                                                <option value="{{$list_roles->name}}"> {{$list_roles->name}}  </option> 
                                            @endforeach
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
                               
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault03">Password</label>
                                        <input type="password" class="form-control" id="validationDefault03"
                                            placeholder="Enter Your Password" name="password">
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
                                    
                                    
                                </div>
                                
                                
                                <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The User</button>
                            </form>
                            <!-- /form -->

                        </div>
                        <!-- /card body -->

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
                                <h3>
                                    <p align="center" style="color: red"><i class="fa fa-table"></i> 
                                        The List is Empty
                                    </p>
                                </h3>
        
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
                                                        <a href="{{route('user.delete', $users->user_id)}}" class="btn btn-danger"
                                                            onclick="return(confirmToDelete());" >
                                                        <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        <a href="{{route('user.edit', $users->user_id)}}" class="btn btn-success" onclick="">
                                                            <i class="fa fa-pencil"></i> 
                                                        </a>  
                                                        <a href="{{route('user.suspend', $users->user_id)}}" class="btn btn-primary" onclick="return(confirmToSuspend());">
                                                            <i class="fa fa-ban"></i> 
                                                        </a>  
                                                        <a href="{{route('user.unsuspend', $users->user_id)}}" class="btn btn-info" onclick="return(confirmToUnSuspend());">
                                                            <i class="fa fa-bell"></i> 
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