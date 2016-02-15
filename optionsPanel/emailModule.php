<?php 
	global $current_user;
	get_currentuserinfo();
	if (isset($_GET["error"])){
		$error = $_GET["error"];
		//Failure
		if($error == 1){?>
			<p style="background-image:url(//img.centralcollege.info/icons/exclamation.png); background-repeat:no-repeat;  background-position:5px 5px; border:1px solid #C00; background-color:#FCC; padding:5px 5px 5px 25px; margin:10px 0px">There was a problem sending your message</p>
		<?php
		//Success
		}elseif($error == 2){?>
			<p style="background-image:url(//img.centralcollege.info/icons/accept.png); background-repeat:no-repeat; background-position:5px 5px; border:1px solid #690; background-color:#dff2bf; padding:5px 5px 5px 25px; margin:10px 0px">Message succesfully sent!</p>		
		<?php }
	}	
?>
<h4>Send the arts beat email:</h4>
<!---<p>Clicking on the "send email" button below will email Jacob this page: http://departments.central.edu/central-insider/</p>!--->
<form action="https://www.central.edu/api/wp-email/index.cfm" method="post" name="emailSendingForm">
	<input type="hidden" name="proofName" value="Arts Beat" />
    <input type="hidden" name="UUID" value="A5E3D194-A02A-C18D-AD0D7D657DDA5AFE" />
	<p><label for="issueURL">URL to send:</label>	<input type="text" name="issueURL" size="50"/></p>
    <p style="text-align:center"><input type="submit" value="Send to all media" class="button-primary" /></p>
</form>
<p>To manage Arts Beat subscribers, <a href="https://www.central.edu/admin/?app=news">use the news app in C2AP</a>.
<!---<p style="text-align: center;"><a href="http://dev.central.edu/temp/jacob.cfm" class="button-primary">Send email!</a></p>!--->

