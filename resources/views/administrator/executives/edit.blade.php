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
                                    @if (auth()->user()->hasPermissionTo('Add Session') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('excos.create')}}">Add Excos</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('excos.index')}}">View Excos</a></li>
                                    @endif
                                    @if(auth()->user()->hasRole('Administrator'))
                                        <li class="breadcrumb-item"><a href="{{route('user.restore')}}">Restore Deleted Excos</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Excos </li>
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
                                <h3 class="dt-card__title">Excos Update Form</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            {{-- @include('layouts.message') --}}
                            <form action="{{route('excos.update', $exco->email)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Change Passport ?</label>
                                        <input type="file" class="form-control" id="validationDefault01"
                                            name="passport">
                                        @if ($errors->has('passport'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('passport') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Surname</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Surname" required name="surname" value="{{$exco->surname}}">
                                        @if ($errors->has('surname'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('surname') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Other Names</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Other Names" required name="other_names" value="{{$exco->other_names}}">
                                        @if ($errors->has('other_names'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('other_names') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">E-Mail</label>
                                        <input type="email" class="form-control" id="validationDefault02"
                                            placeholder="Enter Your E-Mail" name="email"
                                             required value="{{$exco->email}}" readonly>
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
                                        <label for="validationDefault01">Phone Number</label>
                                        <input type="number" class="form-control" id="validationDefault01"
                                            placeholder="Enter Phone Number" required name="phone_number" value="{{$exco->phone_number}}">
                                        @if ($errors->has('phone_number'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('phone_number') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Date of Birth</label>
                                        <div class="input-group date" id=""
                                             data-target-input="">
                                            <input type="date" class="form-control
                                                   data-target="" name="dob"
                                                    required value="{{$exco->dob}}">
                                            
                                        </div>
                                        
                                        @if ($errors->has('dob'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('dob') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Faculty</label><?php 
                                        $fac = array("Agriculture", "Arts", "College of Medicine", "Education", "Law", "Pharmacy", "Science", 
                                            "Social Sciences", "Technology", "Veterinary Medicine");

                                        ?>

                                        <select name="faculty" class="form-control" required onchange="useSelectedItem(this)" id="theFac">
                                            <option value="{{$exco->faculty}} ">{{$exco->faculty}} </option>
                                            <option></option>
                                            @foreach ($fac as $facs)
                                                <option value="{{$facs}}">{{$facs}}</option>
                                            @endforeach
                                           
                                        </select>
                                        @if ($errors->has('faculty'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('faculty') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Department </label>
                                        <select name="dept" class="form-control" required id="deptName">
                                            <option value="{{$exco->dept}} "> {{$exco->dept}}  </option>
                                            <option></option>
                                            
                                        </select>
                                        @if ($errors->has('dept'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('dept') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    

                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Excos Position</label>
                                        <select name="position_id" class="form-control" required>
                                            <option value="{{$exco->position->position_id}}"> {{$exco->position->position_name}}  </option>
                                            <option></option>
                                            @foreach($position as $positions)
                                                <option value="{{$positions->position_id}}"> {{$positions->position_name}}  </option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('position_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('position_id') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Executive Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="{{$exco->category}}">{{$exco->category}}</option>
                                            <option></option><?php
                                            $category = array("Main House Executive", "MTFC Executive", "Central Executive"); ?>
                                            @foreach($category as $categories)
                                                <option value="{{$categories}}"> {{$categories}}  </option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('category') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Excos Unit</label>
                                        <select name="unit_id" class="form-control" required>
                                            <option value="{{$exco->unit->unit_id}}"> {{$exco->unit->unit_name}} </option>
                                            <option></option>
                                            @foreach($unit as $units)
                                                <option value="{{$units->unit_id}}"> {{$units->unit_name}}  </option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('unit_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('unit_id') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Academic Session</label>
                                        <select name="session_id" class="form-control" required>
                                            <option value="{{$exco->session->session_id}}"> {{$exco->session->session_name}} </option>
                                            <option></option>
                                            @foreach($session as $sessions)
                                                <option value="{{$sessions->session_id}}"> {{$sessions->session_name}}  </option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('session_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('session_id') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                               
                                <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Executive</button>
                            </form>
                            <!-- /form -->

                        </div>
                        <!-- /card body -->

                    </div>
                    
                </div>
               

            </div> 
            <!-- /grid -->



        </div>
        <!-- /site content -->

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection