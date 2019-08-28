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
                                        <li class="breadcrumb-item"><a href="{{route('excos.restore')}}">Restore Deleted Excos</a></li>
                                    @endif
                                    <li class="breadcrumb-item"><a href="{{route('excos.index')}}">View Excos</a></li>
                                    @if (auth()->user()->hasPermissionTo('Add Excos') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        
                                        <li class="breadcrumb-item"><a href="{{route('excos.create')}}">Add Excos</a></li>
                                    @endif
                                   
                                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Excos </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>

                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">
                            @if(count($excos) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The Excos List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Passport </th>
                                                <th>Full Name </th>
                                                <th>Phone Number </th>
                                                <th>Position </th>
                                                <th>Unit </th>
                                                <th>Dept </th>
                                               
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($excos as $exco)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Restore Excos') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('excos.undelete', $exco->exco_id)}}"
                                                                onclick="return(confirmToRestore());" class="">
                                                                <i class="fa fa-trash-o"></i>Restore
                                                            </a> 
                                                        @endif
                                                    </td>
                                                    <td><img class="dt-avatar dt-avatar__shadow size-30 mr-sm-4"
                                                        src="{{asset('excos-passport/'.$exco->passport)}}"
                                                         alt="{{$exco->surnamne}}}" align="center"></td> 
                                                    <td>{{$exco->surname. " ". $exco->other_names}}</td> 
                                                    <td>{{$exco->phone_number}}</td>
                                                    <td>{{$exco->position->position_name}}</td>
                                                    <td>{{$exco->unit->unit_name}}</td>
                                                    <td>{{$exco->dept}}</td>
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Passport </th>
                                                    <th>Full Name </th>
                                                    <th>Phone Number </th>
                                                    <th>Position </th>
                                                    <th>Unit </th>
                                                    <th>Dept </th>
                                                   
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