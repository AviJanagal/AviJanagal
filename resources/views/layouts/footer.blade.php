  
<!-- footer start-->
<footer></footer>
<!-- footer end -->
<script src="{{asset('js/jquery.min.js')}} "></script>
<script src="{{asset('js/bootstrap.min.js')}} "></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> 
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 

<!-- Delete modal jQuery -->
<script>
    function deleteData(url) {
        $("#deleteForm").attr("action", url);
        $('#myModal').modal('show');
    }
</script>
<!-- Delete modal jQuery end -->
<script>
    $('input:radio[name="optradio"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'link') {
           $('#sv').addClass('d-none');
           $('#session_video').val('');
           $('#sl').removeClass('d-none');
        }
        else{
           $('#sv').removeClass('d-none');
           $('#session_link').val('');
           $('#sl').addClass('d-none');
        }
    });

</script>
<script>

$(document).ready( function () {
    $('.myTableTh').DataTable();
} );

</script>
<script>
  $(document).ready(function () {
    var i = $("input[type=radio][name=optradio]:checked").val();
    if(i == 'link'){
        $('#sv').addClass('d-none');
        $('#sl').removeClass('d-none');
    }
    else{
        $('#sv').removeClass('d-none');
        $('#sl').addClass('d-none');
    }
});
</script>
        


<!-- jQuery Validation -->
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
        subject: {
		   required: true,
		},
        link: {
		   required: true,
		},
 
    }
});
</script>

<script>
$( "#myform" ).validate({
	  rules: {
		first_name: {
		   required: true,
		},
		last_name: {
		   required: true,
		},
		address: {
		   required: true,
		},
		state: {
		   required: true,
		},
		person_type: {
		   required: true,
		},
		apartment: {
		   required: true,
		},
		city: {
		   required: true,
		},
		zip_code: {
		   required: true,
           maxlength: 6,
           minlength : 6
		},
        password : {
            required: true,
            minlength : 8
        },
        password_confirmation : {
            minlength : 8,
            equalTo : "#password"
        },
        email : {
            required: true,
            email: true,
            minlength : 8
        },
        email_confirmation : {
            minlength : 8,
            equalTo : "#email"
        },
        phone_number: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
		}
	  }
	});
</script>


<script>
$('select[name="select_module"]').change(function() {
    alert("kfdsdfds");

});

</script>


<!-- end jQuery Validation -->

<script>
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

<script>

$(document).ready(function () {
    var src = $("#mVideo").attr("src").split('?')[0];
    // alert(src.duration);
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

           