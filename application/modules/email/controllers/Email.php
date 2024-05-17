<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
    }
    
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        
        $mail->isSMTP();
        $mail->Host     = 'mail.attaautohaus.com';
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Username = 'l.chaiyaporn@attaautohaus.com';
        $mail->Password = 'l@C1234!#';
        $mail->SMTPSecure = 'ssl';
      /*   $mail->Port     = 465; */
        


        $mail->CharSet = 'utf-8';
        $mail->setFrom('l.chaiyaporn@attaautohaus.com', 'TEST Mail AMS Support');
        $mail->addReplyTo('l.chaiyaporn@attaautohaus.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress('it@attaautohaus.com');

        // Add cc or bcc 
        $mail->addCC('it@attaautohaus.com');
        $mail->addBCC('l.chaiyaporn@attaautohaus.com');

        // Email subject
        $mail->Subject = 'เทสระบบ mail.php send ';

        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>PreTest system phpmailer function ฟลุ๊ค เป็นผู้ทดสอบ</h1>
            <p>เทสภาษาไทย</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
        
    }


    function send_mail_to_user_status_eleave(){
        $nameuser="สภาชัย";
        $surname ="ลองกระโดน";

        $nameuser2="เอบีซี";
        $surname2 ="เอดีเอส";


        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        
        $mail->isSMTP();
        $mail->Host     = 'mail.attaautohaus.com';
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Username = 'l.chaiyaporn@attaautohaus.com';
        $mail->Password = 'l@C1234!#';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        


        $mail->CharSet = 'utf-8';
        $mail->setFrom('l.chaiyaporn@attaautohaus.com', 'TEST Mail AMS Support');
        $mail->addReplyTo('l.chaiyaporn@attaautohaus.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress('l.chaiyaporn@attaautohaus.com');

        // Add cc or bcc 
        $mail->addCC('');
        $mail->addBCC('l.chaiyaporn@attaautohaus.com');

        // Email subject
        $mail->Subject = 'เทสระบบ mail.php send ';
    $image='<img src=" base_url(); /upload/atta/ATTA.png"width="80"high="100"alt="User Avatar"class="img-thumbnail">';
    echo $image;  
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>PreTest system phpmailer function ฟลุ๊ค เป็นผู้ทดสอบ</h1>
            <p><h3>เรียน คุณ  $nameuser $surname</h3> </p>
            <p><h4>ตอนนี้สถานะการลางานของคุณได้เปลี่ยนแล้ว สถานะจากการส่งข้อมูลเป็นผู้จัดการอนุมติ อนุมัติโดย คุณ $nameuser2 $surname2 </h4></p>
            <p><h4>ยังไม่อนุญาติให้คุณ $nameuser $surname หยุดเนื่องจากต้องให้ทางผ่ายบุคคล หรือ ผู้บริหารเป็นผู้สนุมัติก่อนเท่านั้นจึงจะสามารถลางานได้ </h4></p>
            <p><h4> ขอบคุณครับ/ค่ะ</h4></p>
            <p>$image</p>
            "
            
            
            ;
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
        
    }
    
}