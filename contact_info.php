<?php
    $result="";
	if(isset($_POST['submit'])){
  	require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");
	$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
	$mail->SMTPDebug = 0; 
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="tls";
	$mail->Username="venkatesh.cognizant@gmail.com";
	$mail->Password="idontknow-1";
	$mail->setFrom("venkatesh.cognizant@gmail.com");
	$mail->addAddress("sumanshiva.s@gmail.com");
    $file_name = $_FILES['resume']['name'];
    move_uploaded_file($_FILES['resume']['tmp_name'], $file_name);
    $mail->addAttachment($file_name);
	$mail->isHTML(true);
	$mail->Subject = "New Profile Received: ".$_POST["name"];
	$content = '<h3 align="left">Candidate Information</h3>
  <table border="1" width="45%" cellpadding="5" cellspacing="5">
   <tr>
    <td width="15%"><b>Name</b></td>
    <td width="30%">'.$_POST["name"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Mobile No</b></td>
    <td width="30%">'.$_POST["mobile"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Email Address</b></td>
    <td width="30%">'.$_POST["email"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Primary Skills</b></td>
    <td width="30%">'.$_POST["primary_skill"].'</td>
   </tr>
   <tr >
    <td width="15%"><b>Secondary Skills</b></td>
    <td width="30%">'.$_POST["secondary_skill"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Experience</b></td>
    <td width="30%">'.$_POST["experience"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Current CTC</b></td>
    <td width="30%">'.$_POST["current_ctc"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Expected CTC</b></td>
    <td width="30%">'.$_POST["expected_ctc"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Notice Period</b></td>
    <td width="30%">'.$_POST["notice_period"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Current Company</b></td>
    <td width="30%">'.$_POST["company"].'</td>
   </tr>
   <tr>
    <td width="15%"><b>Current Location</b></td>
    <td width="30%">'.$_POST["location"].'</td>
   </tr>
     <tr style="height:150px">
    <td style="vertical-align:top" width="15%"><b>Additional Information</b></td>
    <td style="vertical-align:top" width="30%">'.$_POST["message"].'</td>
   </tr>
  </table>';
	$mail->MsgHTML($content);
    $mail->IsHTML(true);
	if(!$mail->Send())  
	{
		header('location: contactf.html');
	   $result = "Problem on sending mail";
       //echo "Problem on sending mail";
	}
    else {
           $result = "Mail sent";
		   //echo "Mail sent";
		   header('location: contacts.html');
           unlink($file_name); 
         }	
	}
?>