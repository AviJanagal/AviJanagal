@include('layouts.header')

<main class="mt-4 ml-3">
<div class="main-wrapper ">
        <div class="main-container">
            <div class="main-container-inner">
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <ol class="breadcrumb breadcrumb-own-admin">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Related Session</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="main-page-container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12">
                                @if (Session::get('alert'))
                                    <div class="alert alert-{{ Session::get('alert') }} alert-dismissible" role="alert">
                                        <p>{{ Session::get('message') }} </p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-12 col-xl-12 col-md-12">
                                <div class="cat-box shadow-d data-table-wrapper">
                                    <div class="table-title-main-top"><h4 class="custom-bg">Module Related Sessions</h4></div>
                                    <div class="table-wrapper">
                                        <table id="example" class="datatable table table-striped table-bordered myTableTh"
                                            style="width:100%">
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
                                                @foreach ($related_sessions as $session)
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
                                                            <a href="{{ route('session.index')}}" class="btn btn-primary btn-xs"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
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
        </div>
    </div>
</main>

@include('layouts.footer')