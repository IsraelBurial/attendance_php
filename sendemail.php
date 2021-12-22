<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("palmerisrael14@gmail.com", "Israel Palmer");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>