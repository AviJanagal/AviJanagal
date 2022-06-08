@extends('layouts.header')
@extends('layouts.sidebar')
<main class="mt-4 ml-3">
<div class="main-wrapper">
    <div class="main-container">
        <div class="main-container-inner">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-own-admin">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="">All Sessions</a></li> 
                        </ol>
                    </div>
                </div>
            </div>
            <div class="main-page-container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            @if(Session::get('alert'))
                            <div class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
                                <p>{{Session::get('message')}}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            @endif
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="add_banner_form">
                                <h4 class="custom-bg"><?php echo ($type == 1 ) ? "Add Sessions" : "Edit Sessions"; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($type == 1 )
                    <form role="form" data-toggle="validator" action="{{route('session.store')}}" method="post" enctype="multipart/form-data">
            @else
                    <form role="form" data-toggle="validator" action="{{route('session.update',$session->id)}}" method="post" enctype="multipart/form-data">
            @endif
                        @csrf
                        @if($type == 2)
                             {{ method_field('PUT') }}
                            @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Session Title</label>
                                    <input type="text" class="form-control" value="<?php echo ($type == 2 ) ? $session->session_title : ''; ?>"name="title"  <?php if($type == 1 ){ echo "required"; }?> placeholder="Module title">
                                
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="state">Module ID</label>
                                    <select class="form-control" id="myselect" class="event" name="module_id">
                                        <option value="">Select</option>
                                        @foreach ($module as $data)
                                        @if($type ==2)
                                        <option value="{{$data->id}}"{{$data->id == $session->module_id ? 'selected':''}}>{{$data->module_title}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->module_title}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <label for="usr">Session Description</label>
                                 <textarea class="form-control" rows="4" name="desc"  id="desc"  <?php if($type == 1 ){ echo "required"; }?> placeholder="Type a Session Description..." spellcheck="false" ><?php echo ($type == 2 ) ? $session->session_desc : ''; ?></textarea>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Subject</label>
                                    <input type="text" class="form-control" value="<?php echo ($type == 2 ) ? $session->session_subject : ''; ?>" name="subject" placeholder="Session Subject">
                                    
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Language</label>
                                    <input type="text" value="<?php echo ($type == 2 ) ? $session->language : ''; ?>" class="form-control"  <?php if($type == 1 ){ echo "required"; }?> name="language"  placeholder="">
                                    
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="state">Level</label>
                                    <select class="form-control" id="myselect" class="event" name="level">
                                        <option value="">Select</option>
                                        @foreach ($level as $data)
                                        @if($type ==2)
                                        <option value="{{$data->id}}"{{$data->id == $session->level ? 'selected':''}}>{{$data->type}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->type}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Duration</label>
                                    <input type="number" value="<?php echo ($type == 2 ) ? $session->duration : ''; ?>" class="form-control"  <?php if($type == 1 ){ echo "required"; }?> name="duration"  placeholder="eg:30">
                            
                                </div>
                            </div>
                            
                            <label class="radio-inline ml-4"> <input type="radio" name="optradio" value="video" id="video" checked />video </label>
                           
                            <label class="radio-inline ml-4"> <input type="radio" name="optradio" value="link" id="link" />link </label>
                           
                           
                           
                            <div class="col-lg-12 col-xl-12 col-md-12" id="sv">
                                <div class="form-group f-g-o">
                                    <label for="usr">video</label>
                                    <input type="file" class="form-control" name="video" placeholder="Session video">
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12 d-none" id="sl">
                                <div class="form-group f-g-o">
                                    <label for="usr">link</label>
                                    <input type="url" class="form-control" name="link"  placeholder="Session link / YouTube">
                                
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <label for="usr">Session Image</label>
                                <input type="file" class="form-control" placeholder="" <?php if($type == 1 ){ echo "required"; }?> name="image" value="<?php echo ($type == 2 ) ? $session->session_image : ''; ?>"> 
                                    @if($type == 2)
                                        <img src="{{$session->session_image}}" style="width:40px;height:40px">
                                    @endif
                            </div>

                            @if($type == 1 )
                            <label class="radio-inline ml-4"> <input type="radio" name="status" value="active" id="active" checked />Active </label>
                             @else
                            <label class="radio-inline ml-4"> <input type="radio" name="status" value="active" id="active" {{$session->status == "active" ? "checked" : ""}} />Active </label>
                            @endif
                            @if($type == 1 )
                            <label class="radio-inline ml-4"> <input type="radio" name="status" value="deactive" id="deactive" />Deactive </label>
                            @else
                            <label class="radio-inline ml-4"> <input type="radio" name="status" value="deactive" id="deactive" {{$session->status == "deactive" ? "checked" : ""}}/>Deactive </label>
                            @endif
                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Session Order Number</label>
                                    <input type="number" class="form-control" value="<?php echo ($type == 2 ) ? $session->position : ''; ?>" name="order" <?php if($type == 1 ){ echo "required"; }?> placeholder="Sesson Order">
                                    
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="form-group f-g-o">
                                    <label for="usr">Published By</label>
                                    <input type="text" value="<?php echo ($type == 2 ) ? $session->published_by : ''; ?>" class="form-control" <?php if($type == 1 ){ echo "required"; }?> name="publish"  placeholder="Published By">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            <div class="form-group">
                                <button class="btn-style btn-color" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="cat-box shadow-d data-table-wrapper">
                                <div class="table-title-main-top"><h3 class="table-title-main">All Modules</h3></div>
                                <div class="table-wrapper">
                                  <table class="datatable table table-striped table-bordered" id="users" style="width:100%"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Subject</th>
                                            <th> Language</th>
                                            <th> Level</th>
                                            <th> Duration</th>
                                            <th> Media</th>
                                            <th> Status</th>
                                            <th>Position</th>
                                            <th>PublishedBy</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($all_session as $session)
                                        <tr>
                                            <td>{{$session->id}}</td>
                                            <td>{{$session->session_title}}</td>
                                            <td>{{$session->session_desc}}</td>
                                            <td>{{$session->session_subject}}</td>
                                            <td>{{$session->language}}</td>
                                            <td>{{$session->level}}</td>
                                            <td>{{$session->duration}}</td>
                                            @if($media_type = 'video')
                                            <td>
                                            <iframe width="80px" height="60px" src="{{$session->media}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            @else
                                            <td>{{$session->media}}</td>
                                            @endif
                                            <td>{{$session->status}}</td>
                                            <td>{{$session->position}}</td>
                                            <td>{{$session->published_by}}</td>
                                            <td>
                                                <a href="{{$session->image}}"><img style="width:40px;height:40px;" id="blah" target="_blank" src="{{$session->session_image}}" />
                                            </td>
                                            <td>
                                                <a href="{{ route('session.edit', $session->id) }}" class="btn btn-primary btn-xs"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a onClick = "deleteData('{{route('session.destroy',$session->id)}}');" class="btn btn-danger mb-0 btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
                                            </td>
                                            
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
        </div>
    </div>
</div>
</main>

@extends('layouts.footer')