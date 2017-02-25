<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';

	$referer = $_SERVER['HTTP_REFERER'];
	$correct_referer = (strpos($referer, '/contact-form/') !== false);

	if (!$correct_referer) {
		return header('Location: /contact-form/');
	}

	$MessageType = $_POST['MessageType'];
	$SubjectOther = $_POST['SubjectOther'];
	$SubjectComments = $_POST['SubjectComments'];
	$YourName = $_POST['Yourname'];
	$SubjectUserName = $_POST['SubjectUsername'];
	$UserEmail = $_POST['UserEmail'];
	$UserTel = $_POST['UserTel'];
	$ContactRequested = $_POST['ContactRequested'];

	$to = false;

	switch ($MessageType) {
		case 'Pre-surgical Assessment': $to = 'cwilliams@eosc.org'; break;
		case 'Surgery Time': $to = 'cburrow@eosc.org'; break;
		case 'Surgery Experience': $to = 'jgrollo@eosc.org'; break;
		case 'Insurance or Billing Issue': $to = 'cburrow@eosc.org'; break;
		case 'Other: Specify Other in box below:': $to = 'cburrow@eosc.org'; break;
	}

	if ($to !== false) {
		$mail_ret = mail('andrew.massengale@gmail.com', 'test', 'test', 'From:eoscforms@gmail.com');
		var_dump($mail_ret);
	}

	// return header('Location: /contact-form/?Name=' + $YourName);
/*
<!--- Process and Send mail from Contact Us Page Subject: Other ---> 
<cfelseif FindNoCase("contactus.cfm", CGI.HTTP_REFERER) AND (#Form.MessageType# eq "Other: Specify Other in box below:")>
<cfmail to="cburrow@eosc.org" from="eoscforms@gmail.com" subject="EOSC-Form:Contact Us" cc="" bcc="Eoscweb@eosc.org" server="cust49846-1.in.mailcontrol.com" type="html">
Sent at #DateFormat(now())# #TimeFormat(now(), "HH:MM:SS")# EST
	<cfinclude template="contactus.cfm">
</cfmail>
<cflocation url="confirmcontactus.cfm?Name=#Form.Name#"> 


</cfif>

</cftransaction>

</cfoutput>
*/
?>