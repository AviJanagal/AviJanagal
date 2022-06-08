  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        
        <script src="{{asset('js/jquery.min.js')}} "></script>
        <script src="{{asset('js/bootstrap.min.js')}} "></script>
        <script src="{{asset('js/timepicker.min.js')}}"></script>
        <script src="https://cdn.datatables.net/plug-ins/preview/scrollToTop/dataTables.scrollToTop.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

       
<script>

$( "#sessionForm" ).validate({
    rules: {
        module_id: {
		   required: true,
		},
        language: {
		   required: true,
		},
        level: {
		   required: true,
		},
        optradio: {
		   required: true,
		},
 
    }
});

    $('#filterform').change(function(){
        var subject = $('#subject').val();
        var Module = $('#module').val();
        var session = $('#session').val();
        var published_by = $('#published_by').val();
        $.ajax({
            url:"{{route('get_data')}}",    
            type: "POST",
            dataType : 'json',
            data: { "_token": "{{ csrf_token() }}", 'subject': subject ,'module':Module,'session':session,'published_by':published_by},
            success: function(result) {
            $('#append').html("");
                $.each(result.data, function(index, item){
                    $('#append').append('<ul> \
                        <li>'+item.id+'</li>\
                        <li>'+item.session_title+'</li>\
                        <li>'+item.session_desc+'</li>\
                        <li>'+item.session_subject+'</li>\
                        <li>'+item.language+'</li>\
                        <li><img src="'+item.session_image+'" width="50px" height="50px" alt="Image"></li>\
                        </ul>'
                    );
                });            
            }
        });
    });
</script>



      <!-- Delete modal html-->
    <div id="myModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="" id="deleteForm">
                    @csrf {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <p>Are you sure you want to delete ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End html Delete modal -->

    </body>
</html>
    

           