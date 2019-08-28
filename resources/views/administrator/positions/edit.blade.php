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
                                    @if (auth()->user()->hasPermissionTo('Edit Position') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('position.edit', $posi->position_id)}}">Edit Position</a></li>
                                    @endif
                                
                                    @if (auth()->user()->hasPermissionTo('Add Position') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('position.create')}}">Add Position</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Position') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('position.restore')}}">Restore Deleted Positions</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Excos Positions </li>
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
                                <h3 class="dt-card__title">Excos Position Update Form</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            <form action="{{route('position.update', $posi->position_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-sm-8 mb-3">
                                        
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Position Name" value="{{$posi->position_name}}" required name="position_name">
                                        @if ($errors->has('position_name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('position_name') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="position_id" value="{{$posi->position_id}}">
                                    <div class="col-sm-4 mb-3">
                                        <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Position</button>
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
                            @if(count($position) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The Position List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Position Name</th>
                                               
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($position as $positions)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Position') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('position.delete', $positions->position_id)}}" 
                                                                class="btn btn-danger"
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Position') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('position.edit', $positions->position_id)}}" 
                                                                class="btn btn-success" onclick="">
                                                                <i class="fa fa-pencil"></i> 
                                                            </a>
                                                        @endif  
                                                    </td>
                                                   
                                                    <td>{{$positions->position_name}}</td> 
                                                    
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Position Name</th>
                                                   
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