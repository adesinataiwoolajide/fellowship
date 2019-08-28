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
                                    @if (auth()->user()->hasPermissionTo('Restore Program') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('program.restore')}}">Restore Deleted Program</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermissionTo('Add Program') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('program.create')}}">Add Program</a></li>
                                    @endif
                                    
                                    
                                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Program </li>
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
                            @if(count($program) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The List is Empty
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
                                                        @if (auth()->user()->hasPermissionTo('Restore Program') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('program.undelete', $programs->program_id)}}"
                                                                onclick="return(confirmToRestore());" class="">
                                                                <i class="fa fa-trash-o"></i> 
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