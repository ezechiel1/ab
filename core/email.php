<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';


 function sendEmailPRO($fromemail_, $fromname_, $_toemail, $_toname, $_replytoemail, $_replytoname, $_subject, $_body){
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        date_default_timezone_set('Etc/UTC');
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.ideashop.rw';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@ideashop.rw';                     // SMTP username
        $mail->Password   = 'rw:ideaShop@2019';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($fromemail_, $fromname_);
        // Add a recipient
        $mail->addAddress($_toemail,$_toname);

        $mail->addReplyTo($_replytoemail, $_replytoname);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_subject;
        $mail->Body    = $_body;
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()) return true;

    } catch (Exception $e) {
        return false;
    }
  }//END OF SENDEMAILPRO FUNCTION

  //Transaction MAILER SEND PRO
  function emailResponsePaymentTransaction($_CustomerInfo_, $_OrderInfo_, $_status_='SUCCESS'){
    if(!empty($_CustomerInfo_)): foreach($_CustomerInfo_ as $_customer_): endforeach; endif;
    if(!empty($_OrderInfo_)): foreach($_OrderInfo_ as $_order_): endforeach; endif;

    //send email
    $fromemail_='admin@ideashop.rw';
    $fromname_='International Ideashop [KBAN]';
    $_replytoemail='admin@ideashop.rw';
    $_replytoname='International Ideashop [KBAN]';
    $_sendToEmail=$_customer_['email'];
    $_toname=$_customer_['fname'].' '.$_customer_['lname'];
    $_subject='Payment Approved for Order Request '.$_order_['orderID'].'!';
    $_body='<div style="background: #e5ebf0; color: black; padding: 20px; font-size: 14px; font-family: serif;">
            <h1 style="color: black;"> <strong>KBAN</strong></h1>
            <h3 style="color: black;"> <span style="color: gray;"> Hello dear, </span> <strong> '.$_customer_['fname'].' !</strong></h3>
            <p style="color: black; text-align: justify;">
              Thanks for trusting   <a href="https://www.ideashop.rw/Cart">Kigali Business Angel Network International Idea Shop</a> Platform. <br>
              We have well received your payment for your: <br>
              Order request: '.$_order_['orderID'].',  <br>
              Total Amount: '.$_order_['total_paid'].' RWF, <br>
              Total Items: '.$_order_['number_items'].' <br>
              Payment Method: '.$_order_['payment_method'].'. <br>
              Order\'s Date and Time: '.$_order_['c_date'].'. <br>

              Please Login : <a href="https://www.ideashop.rw/Customer-Account">My Account.</a> <br>
              Then Download your Books here: <a href="https://www.ideashop.rw/Bought-Books">Bought Books.</a> <br>
              Best wishes, <br>
              Administrator Service <br>
              Kigali Business Angel  Network
            </p>
            <h5>Regards, for any question email:  admin@ideashop.rw !</h5>
    </div>';
    sendEmailPRO($fromemail_, $fromname_,$_sendToEmail,$_toname,$_replytoemail,$_replytoname,$_subject,$_body);
  }

  //Transaction MAILER SEND PRO
  function emailResponseErrorPaymentTransaction($_CustomerInfo_, $_OrderInfo_, $_status_='FAILED'){
    if(!empty($_CustomerInfo_)): foreach($_CustomerInfo_ as $_customer_): endforeach; endif;
    if(!empty($_OrderInfo_)): foreach($_OrderInfo_ as $_order_): endforeach; endif;

    //send email
    $fromemail_='admin@ideashop.rw';
    $fromname_='International Ideashop [KBAN]';
    $_replytoemail='admin@ideashop.rw';
    $_replytoname='International Ideashop [KBAN]';
    $_sendToEmail=$_customer_['email'];
    $_toname=$_customer_['fname'].' '.$_customer_['lname'];
    $_subject='Payment Failed for Order Request '.$_order_['orderID'].'!';
    $_body='<div style="background: #e5ebf0; color: black; padding: 20px; font-size: 14px; font-family: serif;">
            <h1 style="color: black;"> <strong>KBAN</strong></h1>
            <h3 style="color: black;"> <span style="color: gray;"> Hello dear, </span> <strong> '.$_customer_['fname'].' !</strong></h3>
            <p style="color: black; text-align: justify;">
              Thanks for trusting   <a href="https://www.ideashop.rw/Cart">Kigali Business Angel Network International Idea Shop</a> Platform. <br>
              Your Payement Process Failed for your : <br>
              Order request: '.$_order_['orderID'].',  <br>
              Total Amount: '.$_order_['total_paid'].' RWF, <br>
              Total Items: '.$_order_['number_items'].' <br>
              Payment Method: '.$_order_['payment_method'].'. <br>
              Order\'s Date and Time: '.$_order_['c_date'].'. <br>
                
              Please Login : <a href="https://www.ideashop.rw/Customer-Account">My Account.</a> <br>
              Then Download your Books here: <a href="https://www.ideashop.rw/Bought-Books">Bought Books.</a> <br>
              Best wishes, <br>
              Administrator Service <br>
              Kigali Business Angel  Network
            </p>
            <h5>Regards, for any question email:  admin@ideashop.rw !</h5>
    </div>';
    sendEmailPRO($fromemail_, $fromname_,$_sendToEmail,$_toname,$_replytoemail,$_replytoname,$_subject,$_body);
  }
 ?>
