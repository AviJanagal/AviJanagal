@include('layouts.header')

<main class="mt-4 ml-3">
<div class="main-wrapper">
    <div class="main-container">
        <div class="main-container-inner  bx-bg-shadow">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-own-admin">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="">All Modules</a></li> 
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
                            <p>{{Session::get('message')}} </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            @endif
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="add_banner_form">
                            <h4 class="custom-bg"><?php echo ($type == 1 ) ? "Add Module" : "Edit Module"; ?></h4>

                            @if($type == 1 )
                            <form role="form" data-toggle="validator" action="{{route('module.store')}}" method="post" enctype="multipart/form-data">
                            @else
                            <form role="form" data-toggle="validator" action="{{route('module.update',$module->id)}}" method="post" enctype="multipart/form-data">
                            @endif

                            @csrf
                            @if($type == 2)
                             {{ method_field('PUT') }}
                            @endif
                           
                            <div class="row">
                    

                                <div class="col-lg-6">
                                   
                                        
                                     
                                    <div class="form-group f-g-o">
                                    <label for="usr">Module Title</label>
                                        <input type="text" class="form-control" name="title" data-error="This field is required." value="<?php echo ($type == 2 ) ? $module->module_title : ''; ?>"  placeholder="Module title" <?php if($type == 1 ){ echo "required"; }?>  >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               <div class="col-lg-6 col-xl-6 col-md-6">
                                    <div class="form-group f-g-o">
                                        <label for="usr">Module Image</label>
                                        <input type="file" class="form-control" placeholder="" name="image" value=""  <?php if($type == 1 ){ echo "required"; } ?>>
                                        @if ($errors->has('video'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('video') }}</strong>
                                            </span>
                                        @endif
                                        @if($type == 2)
                                        <img src="{{$module->module_image}}" style="width:40px;height:40px">
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12 col-md-12">
                                        <label for="usr">Module Description</label>
                                         <textarea class="form-control" rows="4" name="desc" <?php if($type == 1 ){ echo "required"; }?>id="desc" placeholder="Type a Module Description..." spellcheck="false" required><?php echo ($type == 2 ) ? $module->module_description : ''; ?></textarea>
                                        <div class="help-block with-errors"></div>
                                </div>

                                
          
                                
                                    </div>
                                </div>
                                <div class="catgory-btn-save">
                                    <div class="form-group"><button class="btn-style btn-color" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                        <div class="">
                            <div class="cat-box shadow-d data-table-wrapper">
                                <div class="table-title-main-top"><h4 class="custom-bg">All Modules</h4></div>
                                <div class="table-wrapper">
                                  <table class="datatable table table-striped table-bordered myTableTh" id="users" style="width:100%"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Module title</th>
                                            <th>Module Description</th>
                                            <th>Module Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($all_module as $module)
                                        <tr>
                                            <td>{{$module->id}}</td>
                                            <td>{{$module->module_title}}</td>
                                            <td>{{$module->module_description}}</td>
                                            <td>
                                                <a href="{{$module->module_image}}"><img style="width:40px;height:40px;" id="blah" target="_blank" src="{{$module->module_image}}" />
                                            </td>
                                            <td>
                                                <a href="{{ route('module.edit', $module->id) }}" class="btn btn-primary btn-xs"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a onClick = "deleteData('{{route('del_module',$module->id)}}');" class="btn btn-danger mb-0 btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <a href="{{ route('view_related_sessions', $module->id) }}"class="btn btn-primary btn-xs">View </a>
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
</div>
</main>


@include('layouts.footer')