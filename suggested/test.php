<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML xmlns:fb="http://www.facebook.com/2008/fbml">
<HEAD>
<SCRIPT SRC="http://code.jquery.com/jquery-1.7.2.js"></SCRIPT>
<script>
<!--//
//Get the data using ajax
//-->

	$.ajax({
			url: "getinfo.php",
			global: false,
			type: "POST",
			data: ({id : 1}),
			dataType: "json",
			success: function(data){
				//console.log(data[0]);
				$('.InfoDiv').html(data[0]);
			}
		}
	);
</script>
</HEAD>
<BODY>
<H1><FONT FACE="verdana" COLOR="green">Welcome</FONT></H1>
<CENTER><DIV CLASS="InfoDiv"></DIV></CENTER>
</BODY>
<DIV ID="fb-root"></DIV>
<SCRIPT></SCRIPT> 
</HTML>