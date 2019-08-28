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
                                    @if (auth()->user()->hasPermissionTo('Edit Message') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('message.edit', $mess->message_id)}}">Edit Message</a></li>
                                    @endif
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
                    <!-- Card -->
                    <div class="dt-card">

                        <!-- Card Header -->
                        <div class="dt-card__header">

                            <!-- Card Heading -->
                            <div class="dt-card__heading">
                                <h3 class="dt-card__title"> Message Update Form</h3>
                            </div>
                            <!-- /card heading -->

                        </div>
                       
                        <!-- Card Body -->
                        <div class="dt-card__body">

                            <form action="{{route('message.update', $mess->message_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Message Title</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                        placeholder="Enter Message Title" required name="title" value="{{$mess->title}}">
                                        @if ($errors->has('title'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('title') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Message Preacher</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Preacher Name" required name="preacher" value="{{$mess->preacher}}">
                                        @if ($errors->has('preacher'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('preacher') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault02">Program Category</label>
                                        <select name="program_category_id" class="form-control" required>
                                            <option value="
                                                {{$mess->category->program_category_id}}"> 
                                                {{$mess->category->program_category_name}} 
                                            </option>
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
                                    
                                    <div class="col-sm-3 mb-3">
                                        <label for="validationDefault01">Audio or Video Link</label>
                                        <input type="text" class="form-control" id="validationDefault01"
                                            placeholder="Enter Message Audio or Video Link" value="{{$mess->message_link}}" name="message_link">
                                        @if ($errors->has('message_link'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('message_link') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label for="validationDefault01">Bible Verses</label>
                                        <textarea class="form-control" id="validationDefault01"
                                            placeholder="Enter Bible Verses" required name="bible_verses" style="height:60px"> {{$mess->bible_verses}} </textarea>
                                        @if ($errors->has('bible_verses'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('bible_verses') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="message_id" value="{{$mess->message_id}}">
                                    <div class="col-sm-12 mb-3">
                                        <label for="validationDefault01">Message Content</label>
                                        <textarea class="" id="summernote" name="content" required placeholder="Message Content Here">
                                               {{$mess->content}}
                                        </textarea>
                                        
                                        @if ($errors->has('content'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <div class="alert-icon contrast-alert">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <span><strong>Error!</strong> {{ $errors->first('content') }} !</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Message</button>
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

        </div>
        <!-- /site content -->

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection