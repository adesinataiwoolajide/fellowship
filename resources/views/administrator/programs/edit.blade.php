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
                                    @if (auth()->user()->hasPermissionTo('Edit Program') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('program.edit', $prog->program_id)}}">Edit Program</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermissionTo('Add Program') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('program.create')}}">Add Program</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Program Category') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('program.restore')}}">Restore Deleted Program</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Program </li>
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
                                <h3 class="dt-card__title">Program Update Form</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            <form action="{{route('program.update', $prog->program_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">Program Name</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Program Name" value="{{$prog->program_name}}" required name="program_name">
                                        @if ($errors->has('program_name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('program_name') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">Program Category</label>
                                        <select name="program_category_id" class="form-control" required>
                                            <option value="
                                            {{$prog->category->program_category_id}}"> {{$prog->category->program_category_name}} </option>
                                            <option></option>
                                            @foreach($category as $categories)
                                                <option value="{{$categories->program_category_id}}"> 
                                                    {{$categories->program_category_name}}  
                                                </option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('program_category_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('program_category_id') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">Program Date</label>
                                        <div class="input-group date" id="date-time-picker-1"
                                             data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                   data-target="#date-time-picker-1"/ name="program_date" required value="{{$prog->program_date}}">
                                            <div class="input-group-append" data-target="#date-time-picker-1"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="icon icon-calendar"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->has('program_date'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('program_date') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">Start Time</label>
                                        <div class="input-group date" id="date-time-picker-3"
                                        data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#date-time-picker-3" required name="start_time" value="{{$prog->start_time}}">
                                            <div class="input-group-append" data-target="#date-time-picker-3"
                                                    data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="icon icon-time"></i></div>
                                            </div>
                                        </div>
                                   
                                        @if ($errors->has('start_time'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('start_time') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">End Time</label>
                                        
                                        <input type="time" class="form-control" required name="end_time" placeholder="11:30 PM" value="{{$prog->end_time}}">
                                            
                                        @if ($errors->has('end_time'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('end_time') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="validationDefault02">Ministers </label>
                                        <textarea type="text" class="form-control" id="validationDefault01" style="height:50px"
                                            placeholder="Enter Ministers Name seperated by coma" required name="ministers">{{$prog->ministers}}
                                        </textarea>
                                        @if ($errors->has('ministers'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('ministers') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="program_id" value="{{$prog->program_id}}" >
                                    
                                    <div class="col-sm-12 mb-12">
                                        <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Program </button>
                                    </div>
                                </div>

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
                            @if(count($program) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The Program List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Ministers</th>
                                                
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($program as $programs)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Program') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('program.delete', $programs->program_id)}}" 
                                                                class=""
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Program') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('program.edit', $programs->program_id)}}" 
                                                                class="" onclick="">
                                                                <i class="fa fa-pencil"></i> 
                                                            </a>
                                                        @endif  
                                                    </td>
                                                   
                                                    <td>{{$programs->program_name}}</td> 
                                                    <td>{{$programs->category->program_category_name}}</td> 
                                                    <td>{{$programs->program_date}}</td> 
                                                    <td>{{$programs->start_time}}</td> 
                                                    <td>{{$programs->end_time}}</td> 
                                                    <td>{{$programs->ministers}}</td> 
                                                    
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Ministers</th>
                                                   
                                                </tr>
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