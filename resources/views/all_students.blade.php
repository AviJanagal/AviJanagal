@include('layouts.header')
<div class="main-wrapper ">
        <div class="main-container">
            <div class="main-container-inner bx-bg-shadow">
                <div class="container-fluid">
<div class="cat-box shadow-d data-table-wrapper">
    <div class="table-title-main-top"><h4 class="custom-bg">All Students</h4></div>
    <div class="table-wrapper">
<div class="col-md-12">
    
       
            <table class="datatable table table-striped table-bordered myTableTh " id="users" style="width:100%"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Name</th>
                    <th> state</th>
                    <th> phone_number</th>
                    <th> View</th>
                </tr>
            </thead>
                <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}{{$user->first_name}}</td>
                        <td>{{$user->state}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
                            <a href="{{ route('view_student_detail', $user->id) }}" class="btn btn-primary btn-xs">view</i></a>
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
@include('layouts.footer')