<?php 
    function send_mail($email,$message,$subject) {						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = 'exampel.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = "info@exampel.com";
		$mail->Password = "zdwrqd5+N+Z(";
		$mail->setFrom('info@exampel.com');
		$mail->addAddress($email);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		//$mail->MsgHTML("Message Body.");
		$mail->Send();
		return true;
	}
	if(isset($_POST['email'])){
        $subject = $_POST['msg_subject'];
            
        $message = '
                    <html>
                        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            <title>Welcome to Infocus Global Services Contact Info</title>
                        </head>
                        <body>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h1>Welcome to Infocus Global Services Contact Info</h1>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Name :- <b>'.$_POST['name'].'</b></p>
                                        <p>Email :- <b>'.$_POST['email'].'</b></p>
                                        <p>Phone :- <b>'.$_POST['phone_number'].'</b></p>
                                        <p>Contact Message :- <b>'.$_POST['message'].'</b></p>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </html>
        ';
        
        send_mail('exampel@gmail.com',$message,$subject);
        echo '<script> alert("Your information successfully send."); window.location.href="contact.html</script>"';
    }else{
        echo '<script> alert("Your information is not send. Please try again later!"); window.location.href="contact.html</script>"';
    }
?>