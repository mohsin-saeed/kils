
<script>
$(document).ready(function() {
	var options = {
                beforeSubmit:  showRequest,
		success:       showResponse,
		dataType: 'json'
        };
 	$('body').delegate('#image','change', function(){
 		$('#upload').ajaxForm(options).submit();
 	});
});
function showRequest(formData, jqForm, options) {
	$("#validation-errors").hide().empty();
	$("#output").css('display','none');
    return true;
}
function showResponse(response, statusText, xhr, $form)  {
	if(response.success == false)
	{
		var arr = response.errors;
		$.each(arr, function(index, value)
		{
			if (value.length != 0)
			{
				$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
			}
		});
		$("#validation-errors").show();
	} else {
		 $("#output").html("<img src='"+response.file+"' />");
		 $("#output").css('display','block');
	}
}
</script>


<html>
<head>
<title>Ajax Image Upload Using PHP and jQuery</title>
<link rel="stylesheet" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<div class="row">
	<div class="span8">
		<!-- Post Title -->
		<div class="row">
			<div class="span8">
				<h4>Ajax Image Upload and Preview With Laravel</h4>
			</div>
		</div>
		<!-- Post Footer -->
		<div class="row">
			<div class="span3">
				<div id="validation-errors"></div>
				<form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ url('upload/image') }}" autocomplete="off">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="file" name="image" id="image" />
				</form>

			</div>
			<div class="span5">
				<div id="output" style="display:none">
				</div>
			</div>
		</div>
	</div>
</div>






{{--
<div class="main">
<h1>Ajax Image Upload</h1><br/>
<hr>
<form id="uploadimage"  method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="previewing" src="noimage.png" /></div>
<hr id="line">
<div id="selectImage">
<label>Select Your Image</label><br/>
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
</form>
</div>
<h4 id='loading' >loading..</h4>
<div id="message"></div>
--}}
</body>
</html>


<script>
<?php $encrypter = app('Illuminate\Encryption\Encrypter');
              $encrypted_token = $encrypter->encrypt(csrf_token());
?>
var $_token = $('#token').val();
$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: '<?php echo url();?>/saveState', // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: {a:new FormData(this)}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
 headers: { 'X-XSRF-TOKEN' : $_token },
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{

}
});
}));

// Function to preview image after validation
$(function() {
$("#file").change(function() {
var file = this.files[0];
var imagefile = file.type;
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);

});
});
});
</script>--}}
