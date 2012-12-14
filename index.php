<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment</title>
<script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/main.css"/>
</head>
<body>

	<div id="wrapper" class="myform">
		<form id="form" name="form" method="post">
			<h1>Assignment</h1>
			<p>Please enter your value range ( Task 1 )</p>
			<div class="error hide" id="error-block"></div>
			<label class="label">From</label>
			<div class="form-element">	
				<input type="text" name="from" id="from" />
			</div>
			<label class="label">To</label>
			<div class="form-element">	
				<input type="text" name="to" id="to" />
			</div>
			<button type="submit" id="generate">Generate</button>
			<div class="spacer"></div>
			<div class="result hide" id="result-block"></div>	
		</form>
	</div>

</body>
<script>

$(document).ready(function(){
	// Frorm validation
	$("#form").validate({
		rules: {
			from: {
				required: true,
				positiveNumber:true
			},
			to: {
				required: true,
				positiveNumber:true
			}
		},
		messages: {
			from: {
				required: "Please enter from value",
				positiveNumber:"Positive numbers only"
			},
			to: {
				required: "Please enter to value",
				positiveNumber:"Positive numbers only",
			}
		},
		submitHandler: function() {
			ajaxSubmit();// After validate the form submit to the ajax function
		}
	});
	// Add another method for positive integer filter
	$.validator.addMethod('positiveNumber',function (value) { 
        return Number(value) > 0;
    }, 'Enter a positive number.');
	
	
	function ajaxSubmit() {
		var from=$('#from').val();// Get 'from' input value
		var to=$('#to').val();// Get 'to' input value
		// Send ajax submit
		$.ajax({
			  url: "controller.php",
			  global: false,
			  type: "POST",
			  data: ({from : from, to : to , submit : 'logcalculate'}),
			  dataType: "json",
			  success: function(result){
				 resultAction(result);// result send to the result action function
				}
			}
		);
	}
	
	function resultAction(result) {
		if(!result.success)// Check result is success or not
		{
			$('#result-block').hide();// If result block already open, then should be hide it
			$('#error-block').html(result.error).show();
		}else
		{
			$('#error-block').hide();// If error block already open, then should be hide it
			$('#result-block').html(result.result).show();
		}
	}
});
</script>
</html>

