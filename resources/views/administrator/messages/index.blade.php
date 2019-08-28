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
                                    <li class="breadcrumb-item"><a href="{{route('message.index')}}">View Message</a></li>
                                    
                                    @if (auth()->user()->hasPermissionTo('Add Message') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('message.create')}}">Add Message</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Message') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('message.restore')}}">Restore Deleted Messages</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Messages </li>
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
                            @if(count($message) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The Message List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Title</th>
                                                <th>Preacher</th>
                                                <th>Verses</th>
                                                <th>Content</th>
                                                <th>Category</th>
                                                <th>Link</th>
                                               
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($message as $messages)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Message') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('message.delete', $messages->message_id)}}" 
                                                                class=""
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Message') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('message.edit', $messages->message_id)}}" 
                                                                class="" onclick="">
                                                                <i class="fa fa-pencil"></i> 
                                                            </a>
                                                        @endif 
                                                        <a href="{{route('message.delete', $messages->message_id)}}" 
                                                                class="" >
                                                            <i class="fa fa-list"></i></a> 
                                                    </td>
                                                   
                                                    <td>{{$messages->title}}</td> 
                                                    <td>{{$messages->preacher}}</td> 
                                                    <td><?php echo substr($messages->bible_verses, 0,10) ?></td> 
                                                    <td><?php echo substr($messages->title,0,20) ?></td> 
                                                    <td>{{$messages->category->program_category_name}}</td> 
                                                    <td>{{$messages->message_link}}</td> 
                                                    
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Title</th>
                                                    <th>Preacher</th>
                                                    <th>Verses</th>
                                                    <th>Content</th>
                                                    <th>Category</th>
                                                    
                                                    <th>Link</th>
                                                   
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